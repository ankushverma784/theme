<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


include("../dbconnection.php");


if(isset($_POST['addpro']))
	{
	//$id=$_POST['id'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$city=$_POST['city'];
		$image=$_POST['image'];
		$no_of_days=$_POST['no_of_days'];

		$sql ="insert into addproduct ( title, description, price, city, image, no_of_days) VALUES('$title', '$description','$price', '$city', '$image', '$no_of_days')";
			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	}
	// for update 
if(isset($_POST['update']))
	{
	
		$id=$_POST['id'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$city=$_POST['city'];
		$image=$_POST['image'];
		$no_of_days=$_POST['no_of_days'];
  
		$sql ="UPDATE addproduct SET title='$title',description='$description',price='$price',city='$city',no_of_days='$no_of_days' WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		echo "Record Updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}
?>
