<?php

$host = "mysql";
$dbname = "notesdb";
$username = "notesuser";
$password = "notes123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Set UTF-8 character encoding
$conn->set_charset("utf8mb4");