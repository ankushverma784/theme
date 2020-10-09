<?php
include_once('./admin/dbconnection.php'); 
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

        <div id="content">
            
            <div class="hero-wrap js-fullheight" style="background-image: url('./web/images/bg_5.jpg');">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Hotel</a></span> <span>Hotel Single</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels Details</h1>
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
                                <form action="./listing.php" method='post'id="findCityForm">
                                    <div class="fields">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select class="form-control" name='city' required>
                                                <option value=null>Select City</option>
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
                                            <input type="text" id="checkout_date" class="form-control" placeholder="Date to" name='checkout_date' autocomplete="off"required >
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
                                    <input text-align="center" type="submit" name="filterData" class="btn btn-primary py-3 px-5" >
                                </form>
                                 
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <?php 
                            $id = $_GET['id'];
                                $sql = "SELECT * FROM addproduct WHERE id = $id";
                                $result = mysqli_query($conn, $sql); 
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="row">
                                <div class="col-md-12 ftco-animate">
                                    <div class="single-slider owl-carousel">
                                        <div class="item">
                                            <div class="hotel-img" style="background-image: url('./web/images/<?= $row['image'] ?>');"></div>
                                        </div>
                                </div>
                                <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                                   
                                    <h2> <?= $row['title'] ?></h2>
                                    <p class="rate mb-5">
                                        <span class="loc"><a href="#"><i class="icon-calendar"> <?= $row['no_of_days'] ?></i> </a></span>
                                        <span class="loc"><a href="#"><i class="icon">Rs. <?= $row['price'] ?></i> </a></span>
                                        <span class="star">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            8 Rating</span>
                                        </p>
                                        <p><?= $row['description'] ?> </p>
                                        <div class="d-md-flex mt-5 mb-5">
                                            
                                        </div>
                                        
        
                                        <?php } ?>
                                </div>
                                
                                <!-- button for booking & inquiry -->
                                <div class="pd-3" style="margin-bottom: 50px;">
                                    <a class="btn btn-primary" href="#enquiry">Get Enquiry</a>
                                    <button class="btn btn-primary ml-4">Book Now</button>
                                </div>
                                <!-- related Packages -->
                                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                    <h4 class="mb-4">Related Packages</h4>
                                    <div class="row">
                                    <?php   
                                        $sql = "SELECT * FROM addproduct";
                                        $result = mysqli_query($conn, $sql); 
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <div class="col-sm col-md-6 col-lg ftco-animate">
                                            <div class="destination" >
                                                <!-- <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('./web/images/destination-1.jpg');">  -->
                                            <a href="hoteldetails.php?id=<?php echo $row['id']?>" class="img img-2 d-flex justify-content-center align-items-center" 
                                                    style="background-image: url('./web/images/<?= $row['image'] ?>'); "> 
                                                    <div class="icon d-flex justify-content-center align-items-center">
                                                        <span class="icon-search2"></span>
                                                    </div>
                                                </a>
                                                <div class="text p-3">
                                                    <div class="d-flex">
                                                        <div class="one">
                                                            <h3><a href="hoteldetails.php?id=<?php echo $row['id']?>"><?= $row['title'] ?></a></h3>
                                                        
                                                        </div>
                                                        <div class="two">
                                                            <span class="price"><?= $row['price'] ?></span>
                                                        </div>
                                                    </div>
                                                    <p><?= $row['description'] ?></p>
                                                    <p class="days"><span><?= $row['no_of_days'] ?></span></p>
                                                    <hr>
                                                    <p class="bottom-area d-flex">
                                                        <span><i class="icon-map-o"></i>&nbsp;<?= $row['city'] ?></span> &nbsp;
                                                    <span class="ml-auto"><a href="hoteldetails.php?id=<?php echo $row['id']?>">Discover</a></span>
                            
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                
                                    </div>

                                </div>
                                <section id="enquiry">
                                    <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4" >
                                        <h4 class="mb-5">Check Availability &amp; Booking</h4>
                                        <form action="./admin/enquiry/query.php" method='post' id="inquiryForm" >  
                                            <div class="fields">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="Date from" name="date_from" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="Date to" name="date_to" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="no_of_people" name="no_of_people" required >
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <input type="submit" class="btn btn-primary py-3" name="addEnquiry" onclick="responsebtn()">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section> 
            <div>

                <?php include('./partials/footer.php'); ?>
            </div>
        </div>
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
      $("#inquiryForm").validate({});

      function responsebtn() {
        alert("Your Query have Submited");
    }

    </script>
 
   
  </body>
</html>