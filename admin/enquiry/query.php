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
          $sql ="insert into enquiry (name,email,date_from,date_to,no_of_people,status)VALUES('$name','$email','$date_from','$date_to','$no_of_people','$status')";
   			if (mysqli_query($conn, $sql)) {
				$_SESSION['responseError'] = false;
				$_SESSION['responseMessage'] = 'Enquiry Submitted ';
   				header('Location:/theme/index.php');
   				exit;
   			} else {
				$_SESSION['responseError'] = true;
				$_SESSION['responseMessage'] = 'Error On Submitting Enquiry';
				header('Location:/theme/hoteldetails.php');
				exit;
   			}
     }
    
     
    if($_POST['action']==1)
   	{
   		$id=$_POST['id'];
		
		// $sql ="UPDATE enquiry SET status = '$status' WHERE id = $id";
		$sql ="UPDATE enquiry SET status = 'confirm' WHERE id = $id";
		// $sql ="UPDATE enquiry SET `status` = `1` WHERE enquiry.id = $id";	
   
   	if (mysqli_query($conn, $sql)) {
		   
		echo json_encode(array('error'=>false,'message'=>'Status updated successfully'));
	   } else {
		echo json_encode(array('error'=>true,'message'=>'Error while updating Status '));
	   }
	}

	if($_POST['action']==2)
	{
		$id=$_POST['id'];
	 
	 // $sql ="UPDATE enquiry SET status = '$status' WHERE id = $id";
	 $sql ="UPDATE enquiry SET status = 'reject' WHERE id = $id";
	 // $sql ="UPDATE enquiry SET `status` = `1` WHERE enquiry.id = $id";	

	if (mysqli_query($conn, $sql)) {
		
	 echo json_encode(array('error'=>false,'message'=>'Status updated successfully'));
	} else {
	 echo json_encode(array('error'=>true,'message'=>'Error while updating Status '));
	}
 }
   
	 ?>

	