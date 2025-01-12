<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fullname = $_POST['fullname'];
$studentid = $_POST['studentid'];
$gender = $_POST['gender'];
$department = $_POST['department'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];


$sql = "INSERT INTO students (fullname, studentid, gender, department, dob, email, contact, address)
        VALUES ('$fullname', '$studentid', '$gender', '$department', '$dob', '$email', '$contact', '$address')";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
