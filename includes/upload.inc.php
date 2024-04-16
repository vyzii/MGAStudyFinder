<?php
include_once 'dbh.inc.php';

session_start();
$email = $_SESSION['email'];

$sql_student_id = "SELECT StudentID FROM student_info WHERE email='$email'";
$result_student_id = $conn->query($sql_student_id);

if ($result_student_id->num_rows > 0) {
    $row = $result_student_id->fetch_assoc();
    $student_id = $row["StudentID"];
} else {
    echo "Error: Unable to retrieve StudentID.";
    exit();
}

$url = $_POST['url'];
$description = $_POST['description'];
$department = $_POST['department'];
$subject = $_POST['subject'];
$date_added = date("Y-m-d");

if (!preg_match('/^https?:\/\//i', $url)) {
    $url = 'https://' . $url;
}

$sql_insert = "INSERT INTO website_info (URL, StudentID, Description, Department, Subject, DateAdded) VALUES ('$url', '$student_id', '$description', '$department', '$subject', '$date_added')";

if ($conn->query($sql_insert) === TRUE) {
    $conn->close();
    header("Location: ../upload.php?success=true");
    exit();
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>
