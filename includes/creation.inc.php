<?php
include_once 'dbh.inc.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    redirectWithError("Passwords do not match.");
}

$sql_check_email = "SELECT email FROM student_info WHERE email = '$email'";
$result_check_email = $conn->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    redirectWithError("Email already exists.");
}

$sql_check_username = "SELECT username FROM student_info WHERE username = '$username'";
$result_check_username = $conn->query($sql_check_username);

if ($result_check_username->num_rows > 0) {
    redirectWithError("Username already exists.");
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql_insert = "INSERT INTO student_info (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

if ($conn->query($sql_insert) === TRUE) {
    redirectWithMessage("Account created successfully! Please log in.");
} else {
    redirectWithError("Error: " . $conn->error);
}

$conn->close();

function redirectWithError($errorMessage) {
    header("Location: ../signup.php?error=" . urlencode($errorMessage));
    exit();
}

function redirectWithMessage($successMessage) {
    header("Location: ../index.php?success=" . urlencode($successMessage));
    exit();
}
?>
