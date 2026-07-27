<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../config/db.php";

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>📝 My Notes</h2>

        <div>

            <a href="create_note.php" class="btn btn-success">
                ➕ Create Note
            </a>

            <a href="../dashboard/dashboard.php" class="btn btn-secondary">
                🏠 Dashboard
            </a>

        </div>

    </div>

    <?php if ($result->num_rows > 0): ?>

        <div class="table-responsive">

            <table class="table table-bordered table-hover shadow align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th width="180">Actions</th>
                    </tr>

                </thead>

                <tbody>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>

                        <td><?= $row['id']; ?></td>

                        <td><?= htmlspecialchars($row['title']); ?></td>

                        <td><?= htmlspecialchars($row['description']); ?></td>

                        <td><?= $row['created_at']; ?></td>

                        <td>

                            <a href="edit_note.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>

                            <a href="delete_note.php?id=<?= $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this note?');">
                                🗑️ Delete
                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <div class="alert alert-info text-center">

            <h5>No Notes Found</h5>

            <p>Create your first note to get started.</p>

            <a href="create_note.php" class="btn btn-success">
                ➕ Create Note
            </a>

        </div>

    <?php endif; ?>

</div>

<?php
$stmt->close();
?>

</body>

</html>