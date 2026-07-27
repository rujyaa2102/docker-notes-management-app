<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../config/db.php";

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT COUNT(*) AS total_notes FROM notes WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

$totalNotes = $data['total_notes'] ?? 0;

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2>Welcome, <?= htmlspecialchars($_SESSION['fullname']); ?> 👋</h2>

            <p>Total Notes: <strong><?= $totalNotes; ?></strong></p>

            <hr>

            <a href="../notes/create_note.php" class="btn btn-success">Create Note</a>

            <a href="../notes/view_notes.php" class="btn btn-primary">View Notes</a>

            <a href="../auth/logout.php" class="btn btn-danger">Logout</a>

        </div>

    </div>

</div>

</body>

</html>