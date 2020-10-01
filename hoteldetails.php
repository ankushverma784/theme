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
                                <form action="#">
                                    <div class="fields">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Destination, City">
                                </div>
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Keyword search">
                                    <option value="">Select Location</option>
                                    <option value="">San Francisco USA</option>
                                    <option value="">Berlin Germany</option>
                                    <option value="">Lodon United Kingdom</option>
                                    <option value="">Paris Italy</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                </div>
                                <div class="form-group">
                                    <div class="range-slider">
                                        <span>
                                                        <input type="number" value="25000" min="0" max="120000"/>	-
                                                        <input type="number" value="50000" min="0" max="120000"/>
                                                    </span>
                                                    <input value="1000" min="0" max="120000" step="500" type="range"/>
                                                    <input value="50000" min="0" max="120000" step="500" type="range"/>
                                                    </svg>
                                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                </div>
                                </div>
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
                                    <span><?= $row['price'] ?></span>
                                    <h2> <?= $row['title'] ?></h2>
                                    <p class="rate mb-5">
                                        <span class="loc"><a href="#"><i class="icon-map"><?= $row['city'] ?></i> </a></span>
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
                                            <ul><?= $row['no_of_days'] ?>
                                                <!-- {{-- <li>The Big Oxmox advised her not to do so</li>
                                                <li>When she reached the first hills of the Italic Mountains</li>
                                                <li>She had a last view back on the skyline of her hometown </li>
                                                <li>Bookmarksgrove, the headline of Alphabet </li> --}} -->
                                            </ul>
                                            <ul class="ml-md-5">
                                                <li>Question ran over her cheek, then she continued</li>
                                                <li>Pityful a rethoric question ran</li>
                                                <li>Mountains, she had a last view back on the skyline</li>
                                                <li>Headline of Alphabet Village and the subline</li>
                                            </ul>
                                        </div>
                                        
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                                        <?php } ?>
                                </div>
                                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                    <h4 class="mb-4">Take A Tour</h4>
                                    <div class="block-16">
                                    <figure>
                                    <img src="./web/images/hotel-6.jpg" alt="Image placeholder" class="img-fluid">
                                    <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span class="icon-play"></span></a>
                                    </figure>
                                </div>
                                <!-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                    <h4 class="mb-4">Related Packages</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="destination">
                                                    <a href="hotel-single.html" class="img img-2" style="background-image: url('./web/images/room-4.jpg');"></a>
                                                    <div class="text p-3">
                                                        <div class="d-flex">
                                                            <div class="one">
                                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                                                <span class="price per-price">$40<br><small>/night</small></span>
                                                            </div>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                                        <hr>
                                                        <p class="bottom-area d-flex">
                                                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="destination">
                                                    <a href="hotel-single.html" class="img img-2" style="background-image: url(./web/images/room-5.jpg);"></a>
                                                    <div class="text p-3">
                                                        <div class="d-flex">
                                                            <div class="one">
                                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                                                <span class="price per-price">$40<br><small>/night</small></span>
                                                            </div>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                                        <hr>
                                                        <p class="bottom-area d-flex">
                                                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="destination">
                                                    <a href="hotel-single.html" class="img img-2" style="background-image: url(./web/images/room-6.jpg);"></a>
                                                    <div class="text p-3">
                                                        <div class="d-flex">
                                                            <div class="one">
                                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                                                <span class="price per-price">$40<br><small>/night</small></span>
                                                            </div>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                                        <hr>
                                                        <p class="bottom-area d-flex">
                                                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div> -->
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
                                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                    <h4 class="mb-5">Check Availability &amp; Booking</h4>
                                    <div class="fields">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <div class="select-wrap one-third">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control" placeholder="Guest">
                                                <option value="0">Guest</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <div class="select-wrap one-third">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control" placeholder="Children">
                                                <option value="0">Children</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <input type="submit" value="Check Availability" class="btn btn-primary py-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
  </body>
</html>