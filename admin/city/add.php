<?php
include_once('../dbconnection.php'); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>lARAVEL</title>
    <!-- plugins:css -->
    <?php include('../partial/css.php'); ?>
    <!-- endinject -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include('../partial/navbar.php'); ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include('../partial/sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
     
          <!-- Page Title Header Ends-->
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">

                                    <h4 class="card-title"><h2>Create New City</h2></h4>
                                    <!-- <p class="card-description"> Basic form elements </p> -->
                                </div>
                                <div class="col-md-2">
                                        <a class="btn btn-primary" href="index.php"> Back</a>
                                    </div> 
                            </div>
                                                                          
                            <form  class="forms-sample" action="./addcity.php" method="POST">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="exampleInputName1">City Name</label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>
                                   

                                
                                
                                    <button type="submit" class="btn btn-success mr-2" name="adcity">Submit</button>
                                   
                                </form>
                            </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
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