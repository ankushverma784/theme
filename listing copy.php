<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
	include_once('./admin/dbconnection.php'); 
	include_once('./process/filtershort.php');

	while($row = mysqli_fetch_assoc($resultData)){
		echo $row['city']."\r\n";
	}
	if($resultData == null){
		
	}
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
                                <form action="./admin/enquiry/query.php" method='post'>
                                    <div class="fields">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select class="form-control" name='city'>
                                                <option >Select City</option>
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
                                            <input type="text" id="checkin_date" class="form-control" placeholder="Date from" name="checkin_date">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="checkout_date" class="form-control" placeholder="Date to" name=checkout_date>
                                        </div>
                                        <div class="form-group">
                                            <div class="range-slider">
                                                <span class="frmspan" >
                                                    <input type="number" id="minPriceVal" value="0" min="0" max="10000" name="minPriceVal" />  -
                                                    <input type="number" id="maxPriceVal" value="10000" min="0" max="10000" name="maxPriceVal"/>	

                                                    
                                                 </span>
                                              
                                                    <input value="100" min="0" max="10000" step="500" type="range" id="minPrice"/>
                                                    <input value="10000" min="0" max="10000" step="500" type="range" id="maxPrice"/>
                    
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                        </div> -->
                                    </div>
                                </form>
                                <a href="./listing.php"> <input text-align="center" type="submit"  class="btn btn-primary py-3 px-5" onclick="filterData()"></a>
                            </div>
                        </div>
  
          <div class="col-lg-9">
          	<div class="row">
                 <?php 

                      $limit = 1;  // Number of entries to show in a page. 
                      // Look for a GET variable page if not found default is 1.      
                      if (isset($_GET["page"])) {  
                        $pageno  = $_GET["page"];  
                      }  
                      else {  
                        $pageno=1;  
                      };   

                      $start_from = ($pageno-1) * $limit;   

                      $sql = "SELECT * FROM addproduct LIMIT $start_from, $limit";   

                    $result = mysqli_query($conn, $sql); 
                    while($row = mysqli_fetch_assoc($result)){
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
              <?php }?>
                  
              
          	</div>
          	<div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
            
                        <ul class="pagination"> 
                          
		                <li><a href="#">&lt;</a></li>
						<li>
                            <?php   
                              $sql = "SELECT COUNT(*) FROM addproduct";   
                              $result = mysqli_query($conn, $sql);   
                              $row = mysqli_fetch_row($result);   
                              $total_records = $row[0];   
                                
                              // Number of pages required. 
                              $total_pages = ceil($total_records / $limit);   
                              $pagLink = "";                         
                              for ($i=1; $i<=$total_pages; $i++) { 
                                if ($i==$pageno) { 
                                    $pagLink .= "<li class='active'><a href='listing.php?page="
                                                                      .$i."'>".$i."</a></li>"; 
                                }             
                                else  { 
                                    $pagLink .= "<li><a href='listing.php?page=".$i."'> 
                                                                      ".$i."</a></li>";   
                                } 
                              };   
                              echo $pagLink;   
                            ?> </li>
                 
		                <!-- <li class="active"><span>1</span></li> -->
		                <!-- <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li> -->
		                <li><a href="#">&gt;</a></li>
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
	 
	 <!-- <script>
		function filterElements() {
			var select = document.getElementById("select");
			var filter = select.value;
			var list = document.getElementById("listElements");
			var elements = list.getElementsByTagName("li");
			var valueElement;
			for (var i = 0; i < elements.length; i++) {
				valueElement = elements[i].value;
				console.log("filter : "+filter+" ; value : "+valueElement+" ; equal : "+(valueElement===filter));
				if (valueElement === filter)
					elements[i].style.display = "";
				else elements[i].style.display = "none";
			}
		}
	 </script> -->
 
  </body>
</html>