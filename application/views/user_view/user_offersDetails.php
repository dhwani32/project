<?php


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$adresseip = getRealIpAddr();

// Script Online Users and Visitors - http://coursesweb.net/php-mysql/
if(!isset($_SESSION)) session_start();        // start Session, if not already started

$filetxt = 'userson.txt';  // the file in which the online users /visitors are stored
$timeon = 120;             // number of secconds to keep a user online
$sep = '^^';               // characters used to separate the user name and date-time
$vst_id = '-vst-';        // an identifier to know that it is a visitor, not logged user

/*
 If you have an user registration script,
 replace $_SESSION['nume'] with the variable in which the user name is stored.
 You can get a free registration script from:  http://coursesweb.net/php-mysql/register-login-script-users-online_s2
*/

// get the user name if it is logged, or the visitors IP (and add the identifier)

    $uvon = isset($_SESSION['nume']) ? $_SESSION['nume'] : $_SERVER['SERVER_ADDR']. $vst_id;

$rgxvst = '/^([0-9\.]*)'. $vst_id. '/i';         // regexp to recognize the line with visitors
$nrvst = 0;                                       // to store the number of visitors

// sets the row with the current user /visitor that must be added in $filetxt (and current timestamp)

    $addrow[] = $uvon. $sep. time();

// check if the file from $filetxt exists and is writable

    if(is_writable($filetxt)) {
      // get into an array the lines added in $filetxt
      $ar_rows = file($filetxt, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $nrrows = count($ar_rows);

            // number of rows

  // if there is at least one line, parse the $ar_rows array

      if($nrrows>0) {
        for($i=0; $i<$nrrows; $i++) {
          // get each line and separate the user /visitor and the timestamp
          $ar_line = explode($sep, $ar_rows[$i]);
      // add in $addrow array the records in last $timeon seconds
          if($ar_line[0]!=$uvon && (intval($ar_line[1])+$timeon)>=time()) {
            $addrow[] = $ar_rows[$i];
          }
        }
      }
    }

$nruvon = count($addrow);                   // total online
$usron = '';                                    // to store the name of logged users
// traverse $addrow to get the number of visitors and users
for($i=0; $i<$nruvon; $i++) {
 if(preg_match($rgxvst, $addrow[$i])) $nrvst++;       // increment the visitors
 else {
   // gets and stores the user's name
   $ar_usron = explode($sep, $addrow[$i]);
   $usron .= '<br/> - <i>'. $ar_usron[0]. '</i>';
 }
}
$nrusr = $nruvon - $nrvst;              // gets the users (total - visitors)

// the HTML code with data to be displayed
$reout = '<div id="uvon"><h4>Online: '. $nruvon. '</h4>Visitors: '. $nrvst. '<br/>Users: '. $nrusr. $usron. '</div>';
$online = ($nrusr+$nrvst);
$visitor = $nrvst;
$users = $nrusr;
// write data in $filetxt
if(!file_put_contents($filetxt, implode("\n", $addrow))) $reout = 'Error: Recording file not exists, or is not writable';

// if access from <script>, with GET 'uvon=showon', adds the string to return into a JS statement
// in this way the script can also be included in .html files
if(isset($_GET['uvon']) && $_GET['uvon']=='showon') $reout = "document.write('$reout');";

// echo $reout;             // output /display the result


?>

















<!DOCTYPE html>
<html lang="en">
  <head>
    <title>offersnearme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta name="author" content="Free-Template.co" /> -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="function.js" type="text/javascript"></script>


    <style>
      .mySlides {display:none;}
    </style>



    





  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSCerG8WrIjldYWF8q67_kr2R7VxV9VkE&callback=initMap">
    </script>

    <script type="text/javascript">
      function initMap() {
        // The location of Uluru
        var uluru = {lat: 21.170240, lng: 72.831062};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});


        var mapProp= {
          center:new google.maps.LatLng(21.170240,72.831062),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("map"),mapProp);



      }
    </script>








<?php require('user_csslinks.php');?>




  </head>
  <body>



    <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>


        <!-- ShareThis BEGIN -->
        <!-- <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5e83617483557b00194a23a5&product=sticky-share-buttons"></script> -->

          <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e83617483557b00194a23a5&product=sticky-share-buttons&cms=website' async='async'></script>
        <!-- ShareThis END -->


  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <?php require('user_header.php');?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_logo/');?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Details of the Offer you select</h1>

              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-sm-12 col-md-12 ">

            <div class="row">
              <div style="border-bottom: 3px solid #ddd;" class="col-xl-12 mb-3 text-center">
                  <a href="<?=base_url('user/allOffersOfBusiness/').$BusinessDetails[0]['BusinessId']?>"> <h1 style="color: #F38181;"> <?=$BusinessDetails[0]['CompanyName']?> </h1> </a>
              </div>

              <?php
                $Location = $this->MLocation->getLocation($BusinessDetails[0]['AreaId']);
                $LocationSrc = $BusinessDetails[0]['BusinessLocation'];
                if($LocationSrc != ""){
                  $LocationMapSrc = "<iframe src=\"".$LocationSrc."\" width=\"100%\" height=\"500\" frameborder=\"0\" style=\"border:none;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>";
                }else{
                  $LocationMapSrc = "<h6> This Business Doesn't set the location. Please tell them to set the location to find them.. </h6>";
                }
              ?>

              <div class="col-xl-12 mt-2 mb-2">
                <div class="row">
                  <div class="col-xl-4 col-md-12 col-sm-12">
                    <?php  foreach ($images as $image) { ?>
                      <img width="300" height="300" style="border-radius: 10px; box-shadow: 0px 0px 10px #333;" class=" mySlides" src="<?=base_url('assets/assets_offers_images/')?><?=$image['Image']?>" >
                    <?php } ?>
                  </div>

                  <div class="col-xl-8 col-sm-12">
                    <div class="col-xl-12 mt-3 mb-3 pt-4"> <h5> <b><?=$OfferDetails[0]['OfferName']?> </b></h5> </div>
                    <div class="col-xl-12 mt-2 mb-2 ">  <?=$OfferDetails[0]['OfferDescription']?>  </div>
                    <div class="col-xl-12 mt-2 mb-2 "> Price :
                      <del style="color: red;"> <?=$OfferDetails[0]['OfferPrice']?> ₹ </del> &nbsp;&nbsp;
                      <b> <?=$OfferDetails[0]['OfferPayablePrice']?> \-  </b>Only
                    </div>
                    <div class="col-12 mt-2 mb-2 ">
                      <p><?=$Location['AreaDetails'][0]['AreaName']?>, <?=$Location['CityDetails'][0]['CityName']?>, <?=$Location['StateDetails'][0]['StateName']?>, <?=$Location['CountryDetails'][0]['CountryName']?></p>
                    </div>
                    <div class="col-xl-12 col-sm-12">
                      <div class="row">
                        <div class="col-xl-2 col-sm-4">
                          Likes : <?=$ReviewStars?>
                        </div>
                        <div class="col-xl-2 col-sm-4">
                          Review : <?=$Review?>
                        </div>
                        <div class="col-xl-2 col-sm-4">
                          views : <?php
                            echo $online;
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-12 mt-2 mb-2">
                      Total Purchase : <b> <?=count($purchase)?> </b>
                    </div>
                    <hr>
                    <div class="col-xl-12 mt-2 mb-2">
                      <button OfferId="<?=$OfferDetails[0]['OfferId']?>" BusinessId="<?=$BusinessDetails[0]['BusinessId']?>" data-toggle="modal" data-target="#sendInquiryToBusiness" id="<?=$_SESSION['userDetails'][0]['UserId']?>" class="col-xl-5 col-sm-6  btn btn-pink btnSendInquiry"> Inquiry To Business</button>

                      <a style="color: #fff;" href="<?=base_url('user/getCoupon/')?><?=$OfferDetails[0]['OfferId']?>"> <button class="col-xl-3  col-sm-6 btn btn-pink"> Get Coupon </button> </a>


                      <a> <button class=" btn btn-pink" data-toggle="modal" data-target="#businessLocationMap"> <i class="fa fa-map-marker"> </i></button></a>

                      <a> <button class=" btn btn-pink" data-toggle="modal" data-target="#offerQr"> <i class="fa fa-qrcode"> </i></button></a>


                    </div>


                    <!-- <div class="col-xl-12">
                      <button style="background: rgb(10, 120, 250);" class="btn col-xl-2">
                      <div class="fb-share-button" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?> &amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                       </button>

                       <?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                      <?php echo $_SERVER['REQUEST_URI']; ?>

                      <button style="background: green;" class="btn col-xl-2"> <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i style="color: #fff;" class="fa fa-whatsapp fa-lg" aria-hidden="true"> &nbsp;</i>
                        <i style="color: #fff;" class="fa fa-share" aria-hidden="true"></i>
                      </a> </button>


                    </div> -->
                  </div>
                </div>

              </div>
            </div>



              

            <!-- Modal for send inquiry -->





    <div class="modal fade" id="businessLocationMap" tabindex="-1" role="dialog" aria-labelledby="businessLocationMapTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="businessLocationMapTitle">Business Location Map</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <div class="modal-body">
              <?php echo $LocationMapSrc; ?>
             </div>
            
          </form>
        </div>
      </div>
    </div>


    <?php 
      $qrData = "Offer Name : ".$OfferDetails[0]['OfferName']."   Offer Description  : ".$OfferDetails[0]['OfferDescription']." Offer Price : ". $OfferDetails[0]['OfferPrice']." Offer Payable : ". $OfferDetails[0]['OfferPayablePrice']." Address : ".$Location['AreaDetails'][0]['AreaName'].", ".$Location['CityDetails'][0]['CityName'].", ".$Location['StateDetails'][0]['StateName'].", ".$Location['CountryDetails'][0]['CountryName']." Likes : ".$ReviewStars."  Review : ".$Review."  Views : ".$online." Total Purchase : ".count($purchase);
    ?>

    <div class="modal fade" id="offerQr" tabindex="-1" role="dialog" aria-labelledby="offerQrTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="offerQrTitle">Offer QR CODE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <div class="modal-body">
              <center>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$qrData?>&amp;size=200x200" alt="" title="" />  
              </center>
              <hr>
              <p class="text text-danger"> Please Scan the QR Code to check the details of the offer. </p>
            </div>
            
          </form>
        </div>
      </div>
    </div>










    <div class="modal fade" id="sendInquiryToBusiness" tabindex="-1" role="dialog" aria-labelledby="sendInquiryToBusinessTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sendInquiryToBusinessTitle">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="<?=base_url('user/sendInquiryToBusiness');?>" method="post">
            <div class="modal-body">


                <input type="hidden" name="UserId" id="UserId">
                <input type="hidden" name="BusinessId" id="BusinessId">
                <input type="hidden" name="OfferId" id="OfferId">


                <label>Enter Message</label>
                <input type="text" name="Message" id="Message" class="form-control" required>


             </div>
             <div class="modal-footer">
                <input type="submit" class="btn btn-pink" name="AddCategoryButton" value="Send Message">
            </div>
          </form>
        </div>
      </div>
    </div>





            <!-- End Modal for send inquiry -->


<hr>

<!-- <div class="row">
  <div class="col-12" style="height: 500px;">
    <div style="width: 100%; height:100%;" id="map"></div>
  </div>
</div>
 -->

 <?php 

  if($LocationSrc != ""){
    $LocationMapSrc2 = "<iframe src=\"".$LocationSrc."\" width=\"100%\" height=\"500\" frameborder=\"0\" style=\"border:none;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>";
  }else{
    $LocationMapSrc2 = "Please Ask This Provider To Set His Location Map !!";
  }

 ?>


 <div class="row">
  <div class="col-12">
    <?php echo $LocationMapSrc2; ?>
  </div>
 </div>



<hr>



            <div class="row">
              <div class="col-xl-4 col-sm-12">
                <?php if(count($RatingByUser) <= 0){ ?>
                  <div class="main ">
                    <form id="rating-form">
                      <span class="rating-star">
                        <input type="radio" name="rating" class="ratnig" value="5"><span class="star"></span>
                        <input type="radio" name="rating" class="ratnig" value="4"><span class="star"></span>
                        <input type="radio" name="rating" class="ratnig" value="3"><span class="star"></span>
                        <input type="radio" name="rating" class="ratnig" value="2"><span class="star"></span>
                        <input type="radio" name="rating" class="ratnig" value="1"><span class="star"></span>
                        <input type="hidden" name="UserIdForRating" class="UserIdForRating" value="<?=$_SESSION['userDetails'][0]['UserId']?>">
                        <input type="hidden" name="OfferIdForRating" class="OfferIdForRating" value="<?=$OfferDetails[0]['OfferId']?>">
                      </span>
                    </form>
                    <p>Give Ratings.</p>
                  </div>
                <?php } ?>
              </div>

              <div class="col-xl-8 col-sm-12 p-5">

                  <div class="row">
                    <div class="side">
                      <div>5 star</div>
                    </div>
                    <div class="middle">
                      <div class="bar-container">
                        <div class="bar-5"></div>
                      </div>
                    </div>
                    <div class="side right">
                      <p><?=$Rating5?></p>
                    </div>

                    <div class="side">
                      <div>4 star</div>
                    </div>
                    <div class="middle">
                      <div class="bar-container">
                        <div class="bar-4"></div>
                      </div>
                    </div>
                    <div class="side right">
                      <p><?=$Rating4?></p>
                    </div>


                    <div class="side">
                      <div>3 star</div>
                    </div>
                    <div class="middle">
                      <div class="bar-container">
                        <div class="bar-3"></div>
                      </div>
                    </div>
                    <div class="side right">
                      <p><?=$Rating3?></p>
                    </div>


                    <div class="side">
                      <div>2 star</div>
                    </div>
                    <div class="middle">
                      <div class="bar-container">
                        <div class="bar-2"></div>
                      </div>
                    </div>
                    <div class="side right">
                      <p><?=$Rating2?></p>
                    </div>


                    <div class="side">
                      <div>1 star</div>
                    </div>
                    <div class="middle">
                      <div class="bar-container">
                        <div class="bar-1"></div>
                      </div>
                    </div>
                    <div class="side right">
                      <p><?=$Rating1?></p>
                    </div>


                  </div>

              </div>

            </div>


            <hr>


            <div class="row">
              <div class=" col-xl-12 col-sm-12 m-2">
                <form action="<?=base_url('user/addComment')?>" method="post" class="row">
                  <input type="hidden" id="OfferId" name="OfferId" value="<?=$OfferDetails[0]['OfferId']?>">
                  <input type="hidden" id="UserId" name="UserId" value="<?=$_SESSION['userDetails'][0]['UserId']?>">
                  <input style="border-radius: 10px;" type="text" class="form-control mt-1 col-xl-10 col-sm-12 " id="OfferComment" name="OfferComment" required placeholder="Enter the comment ...">
                  <input class="col-xl-2 col-sm-6 mt-1 btn btn-pink" type="submit" value="Add Comment" name="btnOfferComment" >
                </form>

                <div class="row">
                      <div class="col-xl-12 mt-4">

                  <?php foreach ($Comments as $cm) {

                    $user = $this->db->query('SELECT * FROM `userdetails` WHERE UserId='.$cm['UserId'])->result_array();

                  ?>

                    <div style="border-bottom: 1px solid #eee; border-radius: 5px; box-shadow: 1px 1px 5px #ddd;" class="row pt-1 mt-1">
                      <div class="col-xl-8"> <?=$user[0]['UserName']?></div>
                      <div class="col-xl-2"> <?=$cm['Date']?> </div>
                      <div class="col-xl-2"> <?=$cm['Time']?> </div>
                      <div class="col-xl-10"> <?=$cm['Comment']?> </div>
                      <?php if($_SESSION['userDetails'][0]['UserId'] == $cm['UserId']){?><div class="col-xl-2 text text-danger"><a href="<?=base_url('user/removeComment/').$cm['UserId'].'/'.$cm['OfferId'].'/'.$cm['OfferCommentId']?>" > remove </a></div> <?php } ?>
                    </div>


                  <?php } ?>

                  </div>

                </div>

              </div>
            </div>




            <hr>

          </div>
        </div>
      </div>
    </div>



  <div class="site-section bg-light">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Businesses Connected With Us</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">


          <?php

          $businessData = $this->MBusiness->getConnectedBusiness();
          // print_r($businessData);
          foreach ($businessData as $bd) {

          ?>

          <div>
            <div class="testimonial">

                <img style="width: 80%; height: 480px; margin-left: 10%;" src="<?= base_url('assets/assets_business_images/') ?><?=$bd['BusinessImage']?>" alt="Image" class="mb-3">
                <h1 style="text-shadow: 2px 2px #333;" ><b><p><?=$bd['CompanyName']?></p></b></h1>

            </div>
          </div>


          <?php } ?>





        </div>
      </div>
    </div>




   <?php if(!isset($_SESSION['userDetails'])){ ?>

<!-- following code is for the use sign up and registration of the user....  -->
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
            <p class="mb-0 text-white">For find the offers in your selected area, must sign up first. </p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0"><a href="signup.html" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>


<?php }else{ ?>

  <div class="py-5 bg-primary">
      <div class="container">

      </div>
    </div>

<?php } ?>




    <?php require('user_footer.php');?>
  </div>

  <?php require('user_jslinks.php');?>

  </body>
</html>


<script type="text/javascript">
  $('.btn-heart-icon').click(function(){
    OfferId = $(this).attr('data-OfferId');
    UserId = $(this).attr('data-UserId');
    Stars = $(this).attr('data-stars');
    // alert(Stars);

    $.ajax({
      url:'<?=base_url('user/checkStars/')?>'+OfferId+'/'+UserId+'/'+Stars,
      success:function(result){

        if(result==0){
          $('#'+OfferId).addClass('icon-click');
          $('#star'+OfferId).addClass('icon-heart-click');
          $('#star'+OfferId).removeClass('icon-heart-noclick');
        }else{
          $('#'+OfferId).removeClass('icon-click');
          $('#star'+OfferId).removeClass('icon-heart-click');
          $('#star'+OfferId).addClass('icon-heart-noclick');
        }
      }
    });

  });
</script>



<style>

  .icon-click{
    background: #F38181 !important;
  }

  .icon-click:hover{
    background: rgba(243,129,129, 0.5) !important;
  }

  .btn-heart-icon:hover{
    background: #F38181 !important;
    cursor: pointer;
  }

  .btn-heart-icon2:hover{
    background: #F38181 !important;
    cursor: pointer;
  }

  .icon-heart-click{
    color: #fff !important;
  }


  .icon-heart-noclick{
    color: #f38181;
  }

  .review-default{
    border: 1px solid #F38181;
    border-radius: 40px;
    padding-left: 0px;
    width: 40px;
    transition: 0.5s;
  }


  .review-default-input{
    border: none;
    width: 0px;
    transition: 0.4s;
    border-radius: 10px;

  }

  .review-default-button{
    border: none;
    border-radius: 40px;
    transition: 0.3s;

  }
























  .main {
    margin-left: 10%;
    margin-top: 2%;
  }
  .rating-star {
      direction: rtl;
      font-size: 40px;
      unicode-bidi: bidi-override;
      display: inline-block;
  }
  .rating-star input {
      opacity: 0;
      position: relative;
      left: -30px;
      z-index: 2;
      cursor: pointer;
  }
  .rating-star span.star:before {
      color: #F38181;
  }
  .rating-star span.star {
      display: inline-block;
      font-family: FontAwesome;
      font-style: normal;
      font-weight: normal;
      position: relative;
      z-index: 1;
  }
  .rating-star span {
      margin-left: -30px;
  }
  .rating-star span.star:before {
      color: #F38181;
      content:"\f006";
  }
  .rating-star input:hover + span.star:before, .rating-star input:hover + span.star ~ span.star:before, .rating-star input:checked + span.star:before, .rating-star input:checked + span.star ~ span.star:before {
      color: #F38181;
      content:"\f005";
  }





/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top: 10px;
}

.middle {
  float: left;
  width: 70%;
  margin-top: 10px;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */

/*.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}*/

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  /* Hide the right column on small screens */
  .right {
    display: none;
  }
}









</style>

<script type="text/javascript">

  bar1 = "<?=$Rating1Or?>";
  bar2 = "<?=$Rating2Or?>";
  bar3 = "<?=$Rating3Or?>";
  bar4 = "<?=$Rating4Or?>";
  bar5 = "<?=$Rating5Or?>";


  $(window).load(function(){
    $('.bar-1').css({
      "width":bar1+"%",
      "height":"18px",
      "background-color":"#f44336",
    });

    $('.bar-2').css({
      "width":bar2+"%",
      "height":"18px",
      "background-color":"#ff9800",
    });

    $('.bar-3').css({
      "width":bar3+"%",
      "height":"18px",
      "background-color":"#00bcd4",
    });

    $('.bar-4').css({
      "width":bar4+"%",
      "height":"18px",
      "background-color":"#2196F3",
    });

    $('.bar-5').css({
      "width":bar5+"%",
      "height":"18px",
      "background-color":"#4CAF50",
    });
  });


  $('.review-default').mouseenter(function(){

    OfferId = $(this).attr('id');

    $(this).css({
      "width":"60%",
    });
    $('.review-default #rw-input-'+OfferId).css({
      "width":"80%",
      "visibility":"visible",
      "margin-top":"3px",
      "margin-left":"5px",
      "outline":"none",
    });
  });

  $('.review-default').mouseleave(function(){
    $(this).css({
      "width":"10%",
    });
    $('.review-default #rw-input-'+OfferId).css({
      "width":"0px",
      "visibility":"hidden",
      "margin-top":"0px",
      "margin-left":"0px",
    });
  });
</script>





<script>

$('#rating-form .ratnig').click(function(){
  data = $(this).val();
  UserId = $('.UserIdForRating').val();
  OfferId = $('.OfferIdForRating').val();
  // alert(data);
  // alert(UserId);
  // alert(OfferId);

  $.ajax({
    url: '<?=base_url('user/userRatingStars/')?>'+UserId+'/'+OfferId+'/'+data,
    success: function(result){
      // alert(result);
    }
  });

});


 $('.btnSendInquiry').click(function(){
        UserId = $(this).attr('id');
        BusinessId = $(this).attr('BusinessId');
        OfferId = $(this).attr('OfferId');

        $('.modal .modal-body #UserId').val(UserId);
        $('.modal .modal-body #BusinessId').val(BusinessId);
        $('.modal .modal-body #OfferId').val(OfferId);
    });



var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
