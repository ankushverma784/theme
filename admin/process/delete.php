<?php
include("../dbconnection.php");
if($_GET['type']=='product')
{
   $id=$_GET['id'];
   
   $sql = "DELETE FROM addproduct WHERE id = $id";

if(mysqli_query($conn, $sql)){
    $_SESSION['responseStatus'] = 'success';
    $_SESSION['responseMessage'] = 'Records were deleted successfully.';
    header('location:/theme/admin/product/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}
?>