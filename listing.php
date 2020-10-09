<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   session_start();
	include_once('./admin/dbconnection.php'); 
	include('./process/filtershort.php');


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('./partials/css.php'); ?>
  </head>
  <body>
    <div class="wrapper">
            
		<?php include('./partials/header.php'); ?>
            <!-- Page Content  -->
  
      <div class="hero-wrap js-fullheight" style="background-image: url('./web/images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels</h1>
          </div>
        </div>
      </div>
    </div>
    
  

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
		<div class="col-lg-3 sidebar">
    
                            <div class="sidebar-wrap bg-light ftco-animate">
                                <h3 class="heading mb-4">Find City</h3>
                                <form action="" method='post' id="findCityForm">
                                    <div class="fields">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select class="form-control" name='city' required>
                                                <option value="">Select City</option>
                                                <?php 
                                                $sql = "SELECT * FROM place";
                                                $result = mysqli_query($conn, $sql); 
                                                while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                              
                                                <option value="<?= $row['id'] ?>"><?= $row['city'] ?></option>
                                                <?php }?>
                                               </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="checkin_date" class="form-control" placeholder="Date from" name="checkin_date" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="checkout_date" class="form-control" placeholder="Date to" name="checkout_date" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="range-slider">
                                                <span class="frmspan" >
                                                    <input type="number" id="minPriceVal" value="0" min="0" max="10000" name="minPriceVal" />  -
                                         
                                                 </span>
                                              
                                                    <input value="100" min="0" max="10000" step="500" type="range" id="minPrice"/>
                                                    <input value="10000" min="0" max="10000" step="500" type="range" id="maxPrice"/>
                    
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                        </div> -->
                                    </div>
                                    <input text-align="center" type="submit" name="filterData" class="btn btn-primary py-3 px-5">
                                </form>
                                
                            </div>
                        </div>
  
          <div class="col-lg-9">
          	<div class="row">
                 <?php 

                      // while($row = mysqli_fetch_assoc($resultData)){
                      //   echo $row['city']."\r\n";
                      // }
                      // if($resultData == null){
                        
                      // }


                    // $result = mysqli_query($conn, $sql); 
                    // while($row = mysqli_fetch_assoc($result)){
                      if ($resultData!=null){
                      while($row = mysqli_fetch_assoc($resultData)){
                      // }
                      // if($resultData == null){
                      //   echo "Data Not Available";  
                      // }

                  ?>

          		<div class="col-md-4 ftco-animate">
		    				<div class="destination">
                  <a href="#" class="img img-2 d-flex justify-content-center align-items-center" 
                                style="background-image: url('./web/images/<?= $row['image'] ?>'); "> 
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
                        <h3><a href="hotel-single.html">Hotel, Italy <?= $row['title'] ?></a></h3>
                        <!-- <a href="hoteldetails.php?id=<#?php echo $row['id']?>"></a></h3> -->
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
                        <span class="price per-price">$<?= $row['price'] ?><br><small>/night<?= $row['no_of_days'] ?></small></span>
                      
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<hr>
		    						<p class="bottom-area d-flex">
                      <span><i class="icon-map-o"></i> Miami, Fl<?= $row['city'] ?></span> 
                   
		    							<span class="ml-auto"><a href="#">Book Now</a></span>
		    						</p>
		    					</div>
                </div>
              </div>
              </div>  
              <?php }} else{
                echo "no data Found";
                }?>
          	<div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
            
                        <ul class="pagination"> 
                        <?php 
                        $total_pages = 0;
                
                        $prev = (int)$pageno-1;
                        $next = (int)$pageno+1;
                       
                          ?>  

                        <?php if($prev>0):?>
		                      <li><a href="listing.php?page=<?=$prev?>">&lt;</a></li>
                                              
                          
                        <?php endif; ?>
					          	<li>
                            <?php   
                              if ($paginationQuery != null){
                                
                                $paginationRows = mysqli_query($conn, $paginationQuery);   
                                
                                
                              $total_records = mysqli_num_rows($paginationRows)>0;

                                  // echo $total_records;

                               
                              if($total_records>0){
                                $rows = mysqli_fetch_assoc($paginationRows);
                                $total_records = $rows['dataCount'];
                 
                              }
                              // Number of pages required. 
                               $total_pages = ceil($total_records / $limit);  
                            

                              $pagLink = "";                         
                              
                              
                              for ($i=1; $i<=$total_pages; $i++) 
                              
                              {
                            
                                
                                if ($i==$pageno) {
                                  
                                  $pagLink .= "<li class='active'><a href='listing.php?page="
                                  .$i."'>".$i."</a></li>"; 
                                  
                                }             
                                else  { 
                                  $pagLink .= "<li><a href='listing.php?page=".$i."'> 
                                  ".$i."</a></li>";   
                                } 
                                
                                
                              }            
                            }
                                echo $pagLink;   
                            ?> 
                          </li>
                          <?php if($next<=$total_pages):?>
                        
                     

                        <li><a href='listing.php?page=<?=$next?>' >&gt;</a></li>
                      
                          <?php endif; ?>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->



        <?php include('./partials/footer.php'); ?>
    </div>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
    </div>
	 <?php include('./partials/js.php'); ?>
	 
   <script>
        var minPriceVal=0;
        var maxPriceVal=10000;
      
            $('#minPrice').change(function(){
                
                minPriceVal = $(this).val(); 
                $('#minPriceVal').val(minPriceVal); 
                checkRange();
            });


            $('#maxPrice').change(function(){
                maxPriceVal = $(this).val();
                $('#maxPriceVal').val(maxPriceVal);
                checkRange();
            });

           function checkRange(){
            if(minPriceVal>=maxPriceVal){
                $('#minPriceVal').val(0);
                $('#minPrice').val(0);
                alert('Min Price cannot be greater than Max price');
            }
            if(maxPriceVal<=minPriceVal){
                $('#maxPriceVal').val(10000);
                $('#maxPrice').val(10000);
                alert('Max Price cannot be less than Min price');
            }
           }
        

      
    </script>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>

      $("#findCityForm").validate({});
 </script>
  </body>
</html>