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
                                    <h4 class="card-title">View Product </h4>
                                </div>
                                <div class="col-md-2">
                                        <a class="btn btn-primary" href="index.php"> Back</a>
                                    </div> 
                            </div>
                               
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>title</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>city</th>
                                    <th>no_of_days</th>
                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $id = $_GET['id'];
                                     $sql = "SELECT * FROM addproduct WHERE id = $id";
                                    $result = mysqli_query($conn, $sql); 
                              
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['image'] ?></td>
                                    <td><?= $row['city'] ?></td>
                                    <td><?= $row['no_of_days'] ?></td>
                                  
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                            </table>
                            
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