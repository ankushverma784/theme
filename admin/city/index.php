<?php
require_once('../../admin/process/session.php'); 
require_once('../../admin/dbconnection.php');
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
      <!--  -->
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
                                    <h4 class="card-title"><h2 style="text-align: center;"> City Table</h2></h4>
                                 </div>
                                 <div class="col-md-2">
                                    <a class="btn btn-success" href="add.php"> Add City</a>
                                 </div>
                              </div>
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>CityName</th>
                                       <th width="280px">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $sql = "SELECT * FROM place";
                                       $result = mysqli_query($conn, $sql); 
                                       $i=0;
                                       while($row = mysqli_fetch_assoc($result)){
                                       ?>
                                    <tr>
                                       <td><?= ++$i ?></td>
                                       <td><?= $row['city'] ?></td>
                                       <td>
                                          <form method="POST">
                                             <button class="btn btn-primary editProduct" data-city="<?=$row['city']?>" data-id="<?=$row['id']?>">Edit</button>
                                             <a href="./addcity.php?id=<?= $row['id'] ?>&type=city" class="btn btn-danger" name ="delete" id="delete" >Delete</a>
                                          </form>
                                       </td>
                                    </tr>
                                    <!-- MODEL POPUP -->
                                    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered " role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit City Name</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body ">
                                                <form  class="forms-sample" method="POST">
                                                   <!-- @csrf -->
                                                   <div class="form-group">
                                                      <label for="exampleInputName1">City Name</label>
                                                      <input type="text" class="form-control" name="city" id="modalCityInput"  >
                                                   </div>
                                                </form>
                                             </div>
                                             <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                <button class="btn btn-success" name ="update" value="submit" id="cityEditModalBtn">Save changes</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
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
      <script>
         var val = null;
         var id = null;
          $('.editProduct').click(function(e){
             e.preventDefault();
             val = $(this).data('city');
             id = $(this).data('id');
             $('#modalCityInput').val(val);
             $('#editProductModal').modal('show');
          });
         
          $('#cityEditModalBtn').click(function(f){
           f.preventDefault(); // avoid to execute the actual submit of the form.
                 city = $('#modalCityInput').val();
                 $.ajax({
                       url:'./addcity.php',
                       type: "POST",
                       data:{id:id,city:city,update:1}, // serializes the form's elements.
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
                           $('#editProductModal').modal('hide');
                           }
                           else{
                           $('#editProductModal').modal('hide');
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
                       },
                       error:function(error){
                          console.log('error ',error);
                        Swal.fire({
                                 icon: 'error',
                                 title: 'Oops...',
                                 text: 'Something went wrong!',
                                 footer: '<a href>Why do I have this issue?</a>'
                                 })
                           $('#editProductModal').modal('hide');
                       }
                     });
                 
          });
      </script> 
      <!-- for recored insert or delete -->
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
   </body>
</html>  