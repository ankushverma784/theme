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
                        
                                            
                                            <button class="btn btn-outline-success btnconfirm" id="confirm" name="confirm" >Confirm</button>
                                  
                                            <button class="btn btn-outline-danger" id="reject">Reject</button>
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
         var val = null;
         var id = null;
                
          $('.btnconfirm').click(function(f){
           f.preventDefault(); // avoid to execute the actual submit of the form.
                 status = $('#confirm').val();
                 $.ajax({
                       url:'./query.php',
                       type: "POST",
                       data:{id:id,status:status,update:1}, // serializes the form's elements.
                       success: function(data)
                       { 
                           data = JSON.parse(data);
                           if(data.error){
                              Swal.fire({
                                 icon: 'error',
                                 title: 'Oops...',
                                 text: data.message,
                                 footer: '<a href>Why do I have this issue?</a>'
                                 });
                           }
                           else{
                          //  $('.btnconfirm').modal('hide');
                           Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: data.message,
                              showConfirmButton: false,
                              timer: 2000
                           });

                           setTimeout(function(){
                              window.location.reload();
                           },2000);
                           }
                       }
                     
                     });
                 
          });
      </script> 
    
   
    <!-- endinject -->
  </body>
</html>