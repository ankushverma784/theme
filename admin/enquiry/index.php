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
                                <div class="col-md-12">
                                    <h4 class="card-title"><h2 style="text-align: center;">Enquiry Table</h2></h4>
                                </div>
                           
                            </div>
                               
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>No Of People</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>                
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT * FROM enquiry";
                                    $result = mysqli_query($conn, $sql); 
                                    $i=0;
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['date_from'] ?></td>
                                    <td><?= $row['date_to'] ?></td>
                                    <td><?= $row['no_of_people'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td>
                                        <form action="" method="POST">
                        
                                            
                                            <button class="btn btn-outline-success   setStatusBtn" id="confirm"  data-id="<?= $row['id'] ?>" data-type="confirm">Confirm</button>
                                  
                                            <button class="btn btn-outline-danger setStatusBtn" id="reject" name ="reject" data-id="<?= $row['id'] ?>" data-type="reject">Reject</button>
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
    
          $('.setStatusBtn').click(function(f){
         
                //  status = $('#confirm').val();
                var id = $(this).data('id');
                var type = $(this).data('type')=='confirm'?1:2;
                
                 $.ajax({
                       url:'./query.php',
                       type: "POST",
                       data:{id:id,action:type},
                       beforeSend:function(){
                          console.log('before ajax');
                       },
                       success: function(data)
                       { 
                        data = JSON.parse(data);
                        console.log('ajax ends');
                        console.log(data);
                         
                           if(data.error){
                              Swal.fire({
                                 icon: 'error',
                                 title: 'Oops...',
                                 text: data.message,
                                 });
                           }
                           else{
                           Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: data.message,
                              showConfirmButton: false,
                              timer: 2000
                           });
                           f.preventDefault(); // avoid to execute the actual submit of the form.

                           setTimeout(function(){
                              window.location.reload();
                           },5000);
                           }
                       },
                       error:function(error){
                         console.log('error while handling request ',error);
                       }
                     
                     });
                    
                 
          });
    </script> 
        <?php if(isset($_SESSION['responseError']) and isset($_SESSION['responseMessage'])): ?>
         <?php if($_SESSION['responseError']):?>
            <script>
                  Swal.fire(
                     'Error while processing',
                     '<?= $_SESSION['responseMessage'] ?>',   
                     'error'
                  );
            </script>
         <?php else: ?>
            <script>
                  Swal.fire(
                     '<?= $_SESSION['responseMessage'] ?>',
                     '',   
                     'success'
                  );
            </script>
         <?php endif; ?>
      <?php 
         unset($_SESSION['responseError']);
         unset($_SESSION['responseMessage']);
         endif; 
      ?>
   
    <!-- endinject -->
  </body>
</html>