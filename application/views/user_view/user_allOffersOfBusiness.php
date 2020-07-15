<?php if(isset($_SESSION['userDetails'])){?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>offersnearme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- <meta name="author" content="Free-Template.co" /> -->

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
                <h2> All Offers Of </h2><br> <h1><?=$businessDetails[0]['CompanyName']?> </h1>
            </div>
          </div>



      </div>
    </div>




    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row">


          <?php

                foreach ($offers as $o) {
                  $image = $this->MOffers->getOfferImageForFavorite($o['OfferId']);

            ?>

            <a href="<?=base_url('user/getOffersDetails/');?><?=$o['OfferId']?>" class="col-xl-12 mb-2 border-bottom">
              <div class="row">
                <div class="col-xl-1 col-sm-2">
                  <img style="width: 75px; height: 75px;" src="<?=base_url('assets/assets_offers_images/').$image[0]['Image']?>" >
                </div>
                <div class="col-xl-2 col-sm-2">
                  <?=$o['OfferName']?>

                </div>
                <div class="col-xl-4 col-sm-4">
                   <?=$o['OfferDescription']?>
                </div>
                <div class="col-xl-2 col-sm-2">
                  <b> <?=$o['OfferPrice']?> ₹ </b>
                </div>
                <div class="col-xl-3 col-sm-2">
                  <?=$businessDetails[0]['CompanyName']?>
                </div>
            </div>
          </a>


          <?php } /// end inner foreach loop
       ?>

        <div class="col-xl-12 text-center" > <h4> No More Results.. </h4> </div>


        </div>
      </div>
    </div>





<!-- following code is for the use sign up and registration of the user....  -->
    <div class="py-5 bg-primary">
      <div class="container">

      </div>
    </div>

    <!-- require the footer for the visitor page....  -->
    <?php require('user_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('user_jslinks.php'); ?>




</body>

</html>
<?php }else{redirect(base_url(''));}?>
