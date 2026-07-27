<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $user = $_SESSION["user_id"];

    $stmt = $conn->prepare("INSERT INTO notes (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user, $title, $description);

    if ($stmt->execute()) {

        $message = "Note created successfully!";

        // Clear form values
        $title = "";
        $description = "";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Note</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">

            <h3>➕ Create Note</h3>

        </div>

        <div class="card-body">

            <?php if (!empty($message)) : ?>

                <div class="alert alert-success">
                    <?= htmlspecialchars($message); ?>
                </div>

            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        value="<?= htmlspecialchars($title ?? ""); ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea
                        class="form-control"
                        rows="5"
                        name="description"><?= htmlspecialchars($description ?? ""); ?></textarea>

                </div>

                <button class="btn btn-primary">
                    💾 Save Note
                </button>

                <a href="../dashboard/index.php" class="btn btn-secondary">
                    🏠 Dashboard
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>