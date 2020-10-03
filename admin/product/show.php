<?php
include_once('../dbconnection.php'); 
require_once('../process/session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>lARAVEL</title>
    <!-- plugins:css -->
  
    <?php include('../partial/css.php')?>
    <!-- endinject -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
  
      <?php include('../partial/navbar.php')?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   
        <?php include('../partial/sidebar.php')?>
         <div class="main-panel">
          <div class="content-wrapper">
     
          <!-- Page Title Header Ends-->
              <div class="row">

                 <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2 style="text-align: center;">View Product </h2>
                                </div>
                                <div class="col-md-2">
                                        <a class="btn btn-primary" href="index.php"> Back</a>
                                </div> 
                            </div>
                               
                            <div class="row" >
                            <?php 
                                  $id = $_GET['id'];
                                     $sql = "SELECT * FROM addproduct WHERE id = $id";
                                    $result = mysqli_query($conn, $sql); 
                              
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <div class=col-md-12>
                                      <p>
                                        <strong>Title:</strong>
                                        <?= $row['title'] ?>
                                      </p>
                                      <p>
                                        <strong>Price:</strong>
                                        <?= $row['price'] ?>
                                      </p>
                              
                                      <p>
                                        <strong>Description:</strong>
                                        <?= $row['description'] ?>
                                      </p>
                              
                                      <p>
                                        <strong>Image:</strong>
                                        <a target="_blank" href="/theme/web/images/<?=$row['image']?>"><?= $row['image']?></a>       
                                      </p> 
                              
                                      <p>
                                        <strong>City:</strong>
                                        <?= $row['city'] ?>
                                   
                                      </p>
                              
                                      <p>
                                        <strong>No Of Days:</strong>
                                        <?= $row['no_of_days'] ?>
                                      </p>
                                      <p>
                                        <strong>No of Booking:</strong>
                                        <?= $row['no_of_booking'] ?>
                                      </p>

                            <?php } ?>
                        </div>
                    </div>
                    </div>
              </div>
        <!-- content-wrapper ends -->
            </div>
          </div>
        </div>  
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- endinject -->
    <!-- inject:js -->
    <?php include('../partial/js.php'); ?>

    <!-- endinject -->
  </body>
</html>