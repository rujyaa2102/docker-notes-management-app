<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../config/db.php";

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: view_notes.php");
    exit();
}

$id = (int) $_GET['id'];

// Delete only the logged-in user's note
$stmt = $conn->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);

if ($stmt->execute()) {

    $stmt->close();

    header("Location: view_notes.php");
    exit();

} else {

    $stmt->close();

    die("Failed to delete note.");

}
?>