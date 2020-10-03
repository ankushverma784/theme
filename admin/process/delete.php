<?php
  include("../dbconnection.php");
  require_once('./session.php');
  if($_GET['type']=='product')

  {
     $id=$_GET['id'];
     
     $sql = "DELETE FROM addproduct WHERE id = $id";
  
  if(mysqli_query($conn, $sql)){
    $_SESSION['responseError'] = false;
    $_SESSION['responseMessage'] = 'Product Delete Successfully';
       header('Location:/theme/admin/product/index.php');
       exit;
   } else {
    $_SESSION['responseError'] = true;
    $_SESSION['responseMessage'] = 'Unable to add product';
    header('Location:/theme/admin/product/index.php');
    exit;
       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }


//       $_SESSION['responseError'] = true;
//       $_SESSION['responseStatus'] = 'success';
//       $_SESSION['responseMessage'] = 'Records were deleted successfully.';
//       header('location:/theme/admin/product/index.php');
//   } else{
//       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//   }
  
  }
  
  ?>
