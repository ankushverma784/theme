

<?php
$servername = "localhost";
$username = "admin";
$password = "Admin@123";
$databse = "tourweb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databse);

// Check connection
if (mysqli_connect_error()) {
  die("Connection failed: " . mysqli_connect_error());
}
// else{
//   echo "connected";
// }
?> 