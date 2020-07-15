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
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">


            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <!-- search for text  -->
                <h1 data-aos="fade-up">All Subcategory</h1>
                <!-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> -->
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>





    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">All Subcategories</h2>
            <p class="color-black-opacity-5">There are all Subcategories Related to selected Category.</p>
          </div>
        </div>

        <div class="row align-items-stretch">
          
          <?php 
          foreach($result as $r){ 
            $count =  $this->MOffers->countOffers($r['CategoryId']);
            ?>
              <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-3 col-lg-2">
                <a href="<?=base_url('getOffers/').$r['CategoryId']?>" data-id="<?=$r['CategoryId']?>" class="category-class popular-category h-100">
                  <span class="icon mb-3"><img style="border-radius: 5px;" width="70" height="70" src="<?=base_url('assets/assets_subcategory_images/');?><?php echo $r['CategoryImage'];?>"></span>
                  <span class="caption mb-2 d-block"><?=$r['CategoryName']?></span>
                  <span class="number"><?=$count?></span>
                </a>
              </div>
          <?php }?>

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


<?php }else{?>

  <div class="py-5 bg-primary">
      <div class="container">

      </div></div>

<?php } ?>

    <!-- require the footer for the visitor page....  -->
    <?php require('user_footer.php'); ?>


  </div>

  <!-- require the js links for the jquery and javascript -->
  <?php require('user_jslinks.php'); ?>





</body>

</html>