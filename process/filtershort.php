<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   $resultData = null;
   $paginationQuery = null;
   $limit = 1;
   $pageno =0;
   $next = 0;
   $prev = 0;
 if(isset($_POST['filterData']))
   	{   
        //session clear if value


        if(isset($_SESSION['city'])) unset($_SESSION['city']); 
        if(isset($_SESSION['checkin_date'])) unset($_SESSION['checkin_date']);
        if(isset($_SESSION['checkout_date'])) unset($_SESSION['checkout_date']);
        if(isset($_SESSION['minPriceVal'])) unset($_SESSION['minPriceVal']);
        if(isset($_SESSION['maxPriceVal'])) unset($_SESSION['maxPriceVal']);
        // session_destroy();
        // session_start();
		$city=$_POST['city'];
        $checkin_date=$_POST['checkin_date'];
        $checkout_date=$_POST['checkout_date'];
        $minPrice=$_POST['minPriceVal'];
        $maxPrice=$_POST['maxPriceVal'];

        //session set
        $_SESSION['city'] = $city;
        $_SESSION['checkin_date'] = $checkin_date;
        $_SESSION['checkout_date'] = $checkout_date;
        $_SESSION['minPriceVal'] = $minPrice;
        $_SESSION['maxPriceVal'] = $maxPrice;


        if($checkin_date == "" or $checkout_date==""){
            $days = 0;
        }else{
            $days = getDateDiff($checkin_date,$checkout_date);
            $days = $days->d;
        }
        
        $query = getFilterQuery($city,$days,$minPrice,$maxPrice);
       
        // echo "$query";
        // exit;
		if ($res=mysqli_query($conn, $query)) {
            $resultData = $res;
        }     

    }


    function getDateDiff($checkIn,$checkOut){
        //get difference between two
        
        $date1=date_create($checkIn);
        $date2=date_create($checkOut);
        $diff=date_diff($date1,$date2);
   
        return $diff;

    }

    function getFilterQuery($city,$days,$minPrice,$maxPrice){
        global $paginationQuery, $limit,$pageno, $prev, $next;


 
    //build query for final filtering
    // Number of entries to show in a page. 
                      // Look for a GET variable page if not found default is 1.      
                      if (isset($_GET["page"])) {  
                          $pageno  = $_GET["page"];  
                        }  
                        else {  
                            $pageno=1;  
                      };   
                      $start_from = 0;
       

                    //   $start_from = ((int)$pageno-1) * $limit;  
                    //   echo $start_from;
                    //   exit;
                    //   $start_from = ($limit * ()$pageno) - $limit;


                    
                        $where = '';
                        if($city!="null" and $days!=0){
                            $where .= "city='".$city."' and no_of_days='".$days."' and ";
                        }
                        elseif($city!="null" and $days==0){
                            $where .= "city='".$city."' and ";
                        }
                        elseif($city=="null" and $days!=0){
                            $where .= "no_of_days='".$days."' and ";
                        }

                        $where .= "price between '".$minPrice."' and '".$maxPrice."'";

                        $query = "SELECT * FROM addproduct WHERE $where LIMIT $start_from,$limit";
                        $paginationQuery = "SELECT COUNT(*) as dataCount FROM  addproduct WHERE $where LIMIT $start_from,$limit";
                        return($query);
                        
                        }
                    
                        if(isset($_GET['page'])){

                            $city = $_SESSION['city'];
                        
                            $checkin_date = $_SESSION['checkin_date'];
                            $checkout_date = $_SESSION['checkout_date'];
                            $minPrice = $_SESSION['minPriceVal'];
                            $maxPrice = $_SESSION['maxPriceVal'];

                        //session set
                        if($checkin_date == "" or $checkout_date==""){
                            $days = 0;
                            }else{
                                $days = getDateDiff($checkin_date,$checkout_date);
                                $days = $days->d;
                            }
                            
                            $query = getFilterQuery($city,$days,$minPrice,$maxPrice);
                        
                            // echo "$query";
                            // exit;
                            if ($res=mysqli_query($conn, $query)) {
                                $resultData = $res;
                            }     

                        }

                    ?>