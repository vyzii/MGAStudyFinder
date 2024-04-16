<?php
include_once 'dbh.inc.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql_select = "SELECT * FROM student_info WHERE email='$email'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_hashed_password = $row['password'];

    if (password_verify($password, $stored_hashed_password)) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;

        header("Location: ../upload.php");
        exit();
    } else {
        header("Location: ../index.php?error=invalid_credentials");
        exit();
    }
} else {
    header("Location: ../index.php?error=invalid_credentials");
    exit();
}

$conn->close();
?>
