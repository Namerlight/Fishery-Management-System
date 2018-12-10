<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
} else {
    echo "Successfully Connected";
}

?>

