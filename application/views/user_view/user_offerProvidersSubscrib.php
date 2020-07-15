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
                <h1> Offer Providers </h1>
            </div>
          </div>



      </div>
    </div>




    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row">


          <?php foreach ($offerProvidersDetails as $log) {

            $subscriptionDetails = $this->MSubscription->getSubscriptionDetails($_SESSION['userDetails'][0]['UserId'], $log['BusinessId']);
            // print_r($subscriptionDetails);
            ?>
            <div class="orderCard">
            <div class="col-xl-12 mb-2">
              <div class="row">
                <div class="col-xl-1 col-sm-2">
                  <img style="width: 75px; height: 75px; margin-top: 10px;" src="<?=base_url('assets/assets_business_images/').$log['BusinessImage']?>" >
                </div>
                <div class="col-xl-2 col-sm-2">
                  <br>
                  <?=$log['CompanyName']?>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <br>
                  <?=$log['BusinessEmail']?>
                </div>
                <div class="col-xl-2 col-sm-2">
                  <br>
                  <?=$log['BusinessPhone']?>
                </div>
                <div class="col-xl-3 col-sm-2">
                  <br>
                  <?php if(empty($subscriptionDetails)){ ?>
                    <a href="<?=base_url('user/subscribeBusiness/').$log['BusinessId']?>"> <button class="btn btn-pink"> Subscribe </button> </a>
                  <?php }else{?>
                    <a href="<?=base_url('user/unSubscribeBusiness2/').$log['BusinessId']?>"> <button style="background: #333!important;" class="btn btn-pink"> Subscribed </button> </a>
                  <?php } ?>
                </div>
            </div>
            </div>
          </div>


          <?php } ?>




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



<style type="text/css">


  .orderCard{
    background: #eee;
    width: 100%;
    height: 100px;
    box-shadow: 5px 5px 10px 1px #ddd;
    margin-bottom: 20px;
    border-radius: 10px;
    overflow-wrap: break-word;
    overflow: hidden;
  }

</style>
