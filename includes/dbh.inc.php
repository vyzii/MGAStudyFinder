<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "finaldb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}