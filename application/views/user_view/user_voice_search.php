<!DOCTYPE html>
<html lang="en">

<head>
  <title>offersnearme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
<!--   <meta name="author" content="Free-Template.co" /> -->



  <style type="text/css">
    
    .googleTranslate{
      position: absolute;
      display: block;

      top: 0;
      left: 0;
      

    }


    .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }



  </style>



  <!-- require the php file for the css links  -->
  <?php require('user_csslinks.php'); ?>



</head>

<body>



  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <!-- require the header file for the header html code...  -->
    <?php require('user_header.php'); ?>


    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets/assets_logo/') ?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">

      <div class="row align-items-center text-center justify-content-center ">
        <div class="col-md-8 text-white">

          <h3> Voice Searched Offers</h3>

        </div>
      </div>

      </div>
    </div>



    <!-- Recent Offers Facility -->


    <div id="ExplorePopularOffers" class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Searched Offers</h2>
            <p class="color-black-opacity-5">You Searched for <b>"<?=$searchKey?>"</b>.</p>
          </div>
        </div>

        <div class="row">


          <?php

          foreach ($offers as $rd) {
            $image = $this->db->query('select * from `images` where OfferId='.$rd['OfferId'].' group by OfferId')->result_array();
            // print_r($image);
          ?>


          <div class="col-md-4 mb-3 mb-lg-3 col-lg-3">
            <div class="listing-item">
              <div class="listing-image">
                <img style="width: 100%; height: 250px;"  src="<?= base_url('assets/assets_offers_images/') ?><?=$image[0]['Image']?>" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <!-- <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
 -->                <a class="px-3 mb-3 category" href="<?php 
                        if(isset($_SESSION['userDetails'])){
                      echo base_url('user/getOffersDetails/').$rd['OfferId']; 
                        }else{
                          echo base_url('user/uc_login_page');
                        }
 ?>"><?=$rd['OfferName']?></a>
                <h2 class="mb-1"></h2>
                <span class="address"><?=$rd['OfferDescription']?></span>
              </div>
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
            <p class="mb-0"><a href="<?=base_url('user/uc_register_page')?>" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
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

    <!-- require the footer for the visitor page....  -->
    <?php require('user_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('user_jslinks.php'); ?>

</body>

</html>
