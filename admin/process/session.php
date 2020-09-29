<?php
session_start();

if (!isset($_SESSION['id'])) {
  //if unauthenticated redirect to login page
  header('location:/theme/admin/login.php');
} 

?>