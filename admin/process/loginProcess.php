<?php
session_start();
include("../dbconnection.php");

if(isset($_POST['register_acc']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confirmPassword=$_POST['confirmPassword'];
	if($password!=$confirmPassword){
		header('Location:/theme/admin/signup.php');
		exit;
	}

	$sql=mysqli_query($conn,"select email from login where email='$email'");
	$row=mysqli_num_rows($sql);

	if($row>0)
	{
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	}
	else
	{
		$msg=mysqli_query($conn,"insert into login (name,email,password) values('$name','$email','$password')");
		if($msg)
		{
			echo "<script>alert('Register successfully');</script>";
		}
	}
}

// Code for login 
if(isset($_POST['login_acc']))
{
	$password=$_POST['password'];
	$password=$password;
	$email=$_POST['email'];

	$ret= mysqli_query($conn,"SELECT * FROM login WHERE email='$email' and password='$password'");
	$num=mysqli_fetch_array($ret);

	if($num>0)
	{
		$extra="localhost/theme/admin/index.php";
		$_SESSION['login']=$_POST['email'];
		$_SESSION['id']=$num['id'];
		
		$host=$_SERVER['localhost'];
		
		header("location:http://$host$uri/$extra");
		exit();
	}
	else
	{
		echo "<script>alert('Invalid username or password');</script>";
		$extra="index1.php";
		$host  = $_SERVER['HTTP_HOST'];
		// $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		
		exit();
	}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
	$femail=$_POST['email'];

	$row1=mysqli_query($con,"select email,password from login where email='$email'");
	$row2=mysqli_fetch_array($row1);
	if($row2>0)
		{
		$email = $row2['email'];
		$subject = "Information about your password";
		$password=$row2['password'];
		$message = "Your password is ".$password;
		mail($email, $subject, $message, "From: $email");
		echo  "<script>alert('Your Password has been sent Successfully');</script>";
	}
	else
	{
		echo "<script>alert('Email not register with us');</script>";	
	}
}

?>