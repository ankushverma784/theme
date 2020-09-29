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
                                    <h4 class="card-title">Product Table</h4>
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
                                          <form action="" method="POST">
                                             <button class="btn btn-primary editProduct" data-city="<?=$row['city']?>" data-id="<?=$row['id']?>">Edit</button>
                                             <a href="./addcity.php?id=<?= $row['id'] ?>&type=city" class="btn btn-danger" name ="delete" >Delete</a>
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
                                                <form  class="forms-sample" action="./addcity.php" method="POST">
                                                   <!-- @csrf -->
                                                   <div class="form-group">
                                                      <label for="exampleInputName1">City Name</label>
                                                      <input type="text" class="form-control" name="city" id="modalCityInput"  >
                                                   </div>
                                                </form>
                                             </div>
                                             <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                <button type="button" class="btn btn-success" value="submit" id="editModalBtn">Save changes</button>
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
         
          $('#editModalBtn').click(function(f){
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
                             $('#editProductModal .forms-sample').append('<h6 class="text-danger">'+data.message+'</h6>')
                           }
                           else{
                             $('#editProductModal').modal('hide');
                             alert(data.message);
                             setTimeout(function(){
                               window.location.reload();
                             },2000);
                           }
                       }
                     });
                 
          })
      </script> 
   </body>
</html>