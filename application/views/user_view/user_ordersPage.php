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
                <h1> Your Orders </h1>
            </div>
          </div>



      </div>
    </div>




    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row">


          <?php
              foreach ($orders as $log) {
          
              $images = $this->MOffers->getOfferImageForFavorite($log['OfferId']);
              $businessDetails = $this->db->query('select * from `businessdetails` where BusinessId='.$log['BusinessId'])->result_array();
              $offers = $this->db->query('select * from `offers` WHERE OfferId='.$log['OfferId'])->result_array();


              // print_r($images);


              if(!empty($images) && !empty($businessDetails) && !empty($offers)){

              // print_r($log);  
                // print_r($offers);
              // print_r($businessDetails);
            ?>


            <div class="col-lg-12"> 
              <div class="orderCard">
                 <div class="col-xl-12 mb-2">
                  <div class="row">
                    <div class="col-xl-1 col-sm-2">
                      <img style="margin-top: 10px; width: 75px; height: 75px;" src="<?=base_url('assets/assets_offers_images/').$images[0]['Image']?>" >
                    </div>

                    <div class="col-xl-2 col-sm-2">
                      <span><a href="<?=base_url('user/allOffersOfBusiness/').$businessDetails[0]['BusinessId']?>" >
                        <b> <?=$businessDetails[0]['CompanyName']?> </b> <br>
                      </a></span>
                      <?=$offers[0]['OfferName']?>
                    </div>

                    <div class=" col-xl-2 col-sm-2">
                      <span class="text text-success">Order On : </span> <br>
                      <?=$log['OrderDate']?>
                    </div>
                    
                    <div class="col-xl-2 col-sm-2">
                      <span class="text text-success">Order Amount : </span> <br>
                      <b><?=$log['OrderAmount']?></b>
                    </div>
                    
                    <div class="col-xl-2 col-sm-2">
                      <span class="text text-success">Redeem Code : </span> <br>
                      <b><?=$log['OfferRedeemCode']?></b>
                    </div>

                    <div class="col-xl-2 col-sm-2">
                        
                      <?php if($log['OfferDistributeState'] == 0){?>
   
                        <span class="text text-success">Transaction Id : </span> <br>
                        <b><?=$log['TransectionId']?></b>             

                      <?php } else {?>

                        <p class="text text-danger"> Distributed </p>

                      <?php } ?>
                    </div>

                  </div>
                    <a href="<?=base_url('user/userInvoice/'.$log['OrderId']);?>"> <button class="btn btn-pink float-right"> <span> <i class="fa fa-download "></i> </span> </button> </a>
                </div>
              </div>
            </div>  


          <?php } }?>




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
    height: 140px;
    box-shadow: 5px 5px 10px 1px #ddd;
    margin-bottom: 20px;
    border-radius: 10px;
    overflow-wrap: break-word;
    overflow: hidden;
  }

</style>