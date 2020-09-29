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
                                    <h4 class="card-title">View Product </h4>
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
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                      <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">First name</label>
                                        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                                        <div class="valid-feedback">
                                          Looks good!
                                        </div>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Last name</label>
                                        <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                                        <div class="valid-feedback">
                                          Looks good!
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">City</label>
                                        <input type="text" class="form-control" id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                          Please provide a valid city.
                                        </div>
                                      </div>
                                      <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">State</label>
                                        <select class="custom-select" id="validationCustom04" required>
                                          <option selected disabled value="">Choose...</option>
                                          <option>...</option>
                                        </select>
                                        <div class="invalid-feedback">
                                          Please select a valid state.
                                        </div>
                                      </div>
                                      <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Zip</label>
                                        <input type="text" class="form-control" id="validationCustom05" required>
                                        <div class="invalid-feedback">
                                          Please provide a valid zip.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                          Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                          You must agree before submitting.
                                        </div>
                                      </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                  </form>

                                  

                                </div>
                        
                           
                              <div class="col-md-6"></div> 
                                <label><?= $row['title'] ?></label>
                            </div>


                            <?php } ?>
                                





                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
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