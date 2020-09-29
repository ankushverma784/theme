<?php
require_once('../process/session.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


include("../dbconnection.php");


if(isset($_POST['adcity']))
	{
	//$id=$_POST['id'];
		$city=$_POST['city'];
		$sql ="insert into place (city) VALUES('$city')";
			if (mysqli_query($conn, $sql)) {
				echo "New City Added successfully";
				header('Location:/theme/admin/city/index.php');
				exit;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	}
	// for update 
if(isset($_POST['update']))
	{
		$id=$_POST['id'];
		$city=$_POST['city'];
		$sql ="UPDATE place SET city='$city' WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array('error'=>false,'message'=>'record updated successfully'));
	} else {
		echo json_encode(array('error'=>true,'message'=>'unable to update record'));
	}
	}


	if(@$_GET['type']=='city')
		{
		$id=$_GET['id'];
		$sql = "DELETE FROM place WHERE id = $id";
		if(mysqli_query($conn, $sql)){
			$_SESSION['responseStatus'] = 'success';
			$_SESSION['responseMessage'] = 'Records were deleted successfully.';
			header('location:/theme/admin/city/index.php');
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}

	}



?>
