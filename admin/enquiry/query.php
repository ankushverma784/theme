<?php
   require_once('../process/session.php');
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include("../dbconnection.php");
   if(isset($_POST['addEnquiry']))
   	{
        $name=$_POST['name'];
        $email=$_POST['email'];
        $date_from=$_POST['date_from'];
        $date_to=$_POST['date_to'];
       
        $no_of_people=$_POST['no_of_people'];
        $status=$_POST['status'];
          $sql ="insert into enquiry ( name, email, date_from, date_to, no_of_people, status ) VALUES('$name', '$email','$date_from', '$date_to', '$no_of_people', '$status')";
   			if (mysqli_query($conn, $sql)) {
				$_SESSION['responseError'] = false;
				$_SESSION['responseMessage'] = 'Enquiry Submitted ';
   				header('Location:/theme/hoteldetails.php');
   				exit;
   			} else {
				$_SESSION['responseError'] = true;
				$_SESSION['responseMessage'] = 'Error On Submitting Enquiry';
				header('Location:/theme/index.php');
				exit;
   			}
	   }
	   
	   
  