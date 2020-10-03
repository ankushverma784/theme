<?php
//    session_start();
   require_once('../process/session.php');
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   
   
   
   include("../dbconnection.php");
   
   
   if(isset($_POST['adcity']))
   	{
   	//$id=$_POST['id'];
   		$city=$_POST['city'];
   		$sql ="insert into place (city) VALUES('$city')";
   			if (mysqli_query($conn, $sql)) {
				$_SESSION['responseError'] = false;
				$_SESSION['responseMessage'] = 'City added successfully';
   				header('Location:/theme/admin/city/index.php');
   				exit;
   			} else {
				$_SESSION['responseError'] = true;
				$_SESSION['responseMessage'] = 'Unable to add city';
				header('Location:/theme/admin/city/index.php');
				exit;
   			}
	   }
	   
	   
   	// for update 
   if(isset($_POST['update']))
   	{
   		$id=$_POST['id'];
   		$city=$_POST['city'];
   		$sql ="UPDATE place SET city='$city' WHERE id = $id";
   
   	if (mysqli_query($conn, $sql)) {
		echo json_encode(array('error'=>false,'message'=>'City updated successfully'));
	   } else {
		echo json_encode(array('error'=>true,'message'=>'Error while updating city .Error '.mysqli_error($conn)));
	   }
	}







	// 	   echo json_encode(array('error'=>false,'message'=>'record updated successfully'));
	// 	   header('Location:/theme/admin/city/index.php');
   	// 			exit;
   	// } else {
   	// 	echo json_encode(array('error'=>true,'message'=>'unable to update record'));
   	// }
   	// }
   
   
   	if(@$_GET['type']=='city')
   		{
   		$id=$_GET['id'];
   		$sql = "DELETE FROM place WHERE id = $id";
   		if(mysqli_query($conn, $sql)){
			$_SESSION['responseError'] = false;
			$_SESSION['responseMessage'] = 'City deleted successfully';
			   header('Location:/theme/admin/city/index.php');
			   exit;
   			// $_SESSION['responseStatus'] = 'success';
   			// $_SESSION['responseMessage'] = 'Records were deleted successfully.';
   			// header('location:/theme/admin/city/index.php');
   		} else{
			$_SESSION['responseError'] = true;
			$_SESSION['responseMessage'] = 'Unable to delete city';
			header('Location:/theme/admin/city/index.php');
			exit;

   			// echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   		}
   
   	}
   
   
   
   ?>