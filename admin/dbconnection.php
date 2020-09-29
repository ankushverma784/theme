<?php
$servername = "localhost";
$username = "root";
$password = "";
$databse = "sample";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databse);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?> 