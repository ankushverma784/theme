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
                                    <h4 class="card-title">Product Table</h4>
                                </div>
                                <div class="col-md-2">
                                        <a class="btn btn-success" href="create.php"> Add Product</a>
                                </div>
                            </div>
                               
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>title</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>city</th>
                                    <th>no_of_days</th>
                                    <th width="280px">Action</th>                
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT * FROM addproduct";
                                    $result = mysqli_query($conn, $sql); 
                                    $i=0;
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['image'] ?></td>
                                    <td><?= $row['city'] ?></td>
                                    <td><?= $row['no_of_days'] ?></td>
                                    <td>
                                        <form action="" method="POST">
                        
                                            <a class="btn btn-info" href="show.php?id=<?php echo $row['id']?>">Show</a>
                                            <a class="btn btn-primary" href="edit.php?id=<?php echo $row['id']?>">Edit</a>
                                  
                                            <a href="../process/delete.php?id=<?= $row['id'] ?>&type=product" class="btn btn-danger" name ="delete" >Delete</a>
                                        </form>
                                    </td>
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
    <?php include('../partial/js.php'); ?>
    <!-- endinject -->
    <!-- inject:js -->
    
    <script>
      <?php if(isset($_SESSION['responseStatus']) and isset($_SESSION['responseMessage'])):?>
        alert('<?=$_SESSION['responseMessage']?>');
      <?php 
        unset($_SESSION['responseStatus']); 
        unset($_SESSION['responseMessage']);
        endif;  
      ?>

      <?php if(isset($_GET['error']) and isset($_GET['message'])):?>
        alert('<?=$_SESSION['responseMessage']?>');
      <?php 
        unset($_SESSION['responseStatus']); 
        unset($_SESSION['responseMessage']);
        endif;  
      ?>
    </script>
    <!-- endinject -->
  </body>
</html>