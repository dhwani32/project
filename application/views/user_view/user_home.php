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

        

        <?php if(!isset($_SESSION['userDetails'])){ ?>

        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">


            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <!-- search for text  -->
                <h1 data-aos="fade-up">Search For <span class="typed-words"></span></h1>
                <!-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> -->
              </div>
            </div>


            <!-- Search bar in the body of the page -->
            <div class="form-search-wrap p-2 col-8" style="margin-left: 16%; border-radius:50px;" data-aos="fade-up" data-aos-delay="200">
              <form method="post" action="<?php echo base_url('findSubcategoryfromhome/'); ?>">
                <div class="row align-items-center">
                


                  <!-- list of the categories -->
                  <div class="col-lg-12 col-xl-8">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="categoryId" id="">

                        <?php
                          $result = $this->MCategory->getAllCategory();
                          foreach($result as $r){
                            $count =  $this->MCategory->countSubcategory($r['CategoryId']);
                            ?>
                               <option value="<?=$r['CategoryId']?>"><?=$r['CategoryName']?></option>
                          <?php }?>


                        <!-- <option value="">All Categories</option>
                        <option value="">Hotels</option>
                        <option value="">Restaurant</option>
                        <option value="">Eat &amp; Drink</option>
                        <option value="">Events</option>
                        <option value="">Fitness</option>
                        <option value="">Others</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>

                </div>
              </form>
            </div>


          </div>
        </div>
          <?php } else { ?>

      <div class="row align-items-center text-center justify-content-center ">
        <div class="col-md-8 text-white">



          <h3> Every Offers You Can Check Of Your Area.</h3>
          <p> Explore some popular offers now. </p>

          <br><br><br>
            <a href="#ExplorePopularOffers" class="btn btn-pink">&#x2B9F</a>
        </div>
      </div>

           <?php } ?>

      </div>
    </div>



    <?php 
      $sponsors = $this->MSponsor->getAllSponsors();
      if(count($sponsors) > 0){
    ?>
      <br><br>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Our Sponsors</h2>
            <p class="color-black-opacity-5">There are some Sponsors of our website connected with us.</p>
          </div>
        </div>
      <div class="container">
        <div class="row">
          <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                  <div class="MultiCarousel-inner">
                    <div class="item">
                      <div style="width: 120px; height: 120px; background: white;" class="pad15">

                      </div>
                    </div>
                    <?php
                      foreach ($sponsors as $s) {
                        // print_r($s);
                        $businessDetails = $this->db->where(array('BusinessId'=>$s['BusinessId']))->get('businessdetails')->result_array()[0];
                        // print_r($businessDetails);
                    ?>
                      <div class="item">
                          <a href="<?=base_url('user/allOffersOfBusiness/').$businessDetails['BusinessId']?>"> 
                            <div class="pad15">
                                <img style="height: 120px; width: 120px; border-radius: 10px; box-shadow: 1px 10px 10px #333;" src="<?=base_url('assets/assets_business_images/').$businessDetails['BusinessImage']?>">
                            </div>
                          </a>
                      </div>
                    <?php } ?>
                    <div class="item">
                      <div style="width: 120px; height: 120px; background: white;" class="pad15">

                      </div>
                    </div>
                      
                  </div>
                  <button class="btn btn-primary leftLst"><</button>
                  <button class="btn btn-primary rightLst">></button>
              </div>
        </div>
      </div>
    <?php
        
      }
    ?>





<?php if(isset($_SESSION['userDetails'])){?>


<div id="OfferInArea" class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Nearest To You</h2>
            <p class="color-black-opacity-5">There are some of the leatest offeres that are in your nearest area.</p>
          </div>
        </div>

        <div class="row">


          <?php

          $businessDetails = $this->db->query('SELECT * FROM `businessdetails` WHERE AreaId='.$_SESSION['userDetails'][0]['AreaId'])->result_array();
          $State = 1;
          if(!empty($businessDetails)){/// if condition

            foreach ($businessDetails as $bd) { /// main foreach loop

              $data = $this->MOffers->getNearAreaOffers($bd['BusinessId']);
              foreach ($data as $rd) { /// inner foreach loop
                $State = 0;
                $image = $this->db->query('select * from `images` where OfferId='.$rd['OfferId'].' group by OfferId')->result_array();
                // print_r($image);
            ?>


            <div class="col-md-6 mb-3 mb-lg-3 col-lg-3">
              <div class="listing-item">
                <div class="listing-image">
                  <img style="width: 100%; height: 250px;"  src="<?= base_url('assets/assets_offers_images/') ?><?=$image[0]['Image']?>" alt="Image" class="img-fluid">
                </div>
                <div class="listing-item-content">
                  <!-- <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
   -->                <a class="px-3 mb-3 category" href="<?=base_url('user/getOffersDetails/');?><?=$rd['OfferId']?>"><?=$rd['OfferName']?></a>
                  <h2 class="mb-1"></h2>
                  <span class="address"><?=$rd['OfferDescription']?></span>
                </div>
              </div>
            </div>


          <?php 

            } /// inner foreach loop

          } /// main foreach loop

        } else { /// if condition  ?>
          
        
        <?php } 

        if($State == 1){ /// if condition  ?>
          
          <div class="h6"> Curruntly Any Offers are not available in your area... </div>  
        <?php }

        ?>

        </div>

      </div>
    </div>


<?php } ?>


















    <!-- category area to display some of the popular categories -->
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Offer Categories</h2>
            <p class="color-black-opacity-5">There are some categories which are very popular in this days.</p>
          </div>
        </div>

        <div class="row align-items-stretch">

          <?php
          $result = $this->MCategory->getLimitedCategory();
          foreach($result as $r){
            $count =  $this->MCategory->countSubcategory($r['CategoryId']);
            ?>
              <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-4 col-lg-2">
                <a href="<?php echo base_url('findSubcategory/').$r['CategoryId']; ?>" class="popular-category h-100">
                  <span class="icon mb-3"><img style="border-radius: 5px;" width="70" height="70" src="<?=base_url('assets/assets_category_images/');?><?php echo $r['CategoryImage'];?>"></span>
                  <span class="caption mb-2 d-block"><?=$r['CategoryName']?></span>
                  <span class="number"><?=$count?></span>
                </a>
              </div>
          <?php }?>

        </div>

        <div class="row mt-5 justify-content-center tex-center">
          <div class="col-md-4"><a href="<?php echo base_url('user/allCategory'); ?>" class="btn btn-block btn-outline-primary btn-md px-5">View All Categories</a></div>
        </div>
      </div>
    </div>








    <!-- Recommanded Offers Facility .. -->



<?php if(isset($_SESSION['userDetails'])){?>



  <?php 
          $data = $this->MOffers->getRecommandedOffers();

          if(count($data) > 0){ 
  ?>


    <div id="ExplorePopularOffers" class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Recommanded Offers</h2>
            <p class="color-black-opacity-5">There are some of the Offers Recommanded for you..</p>
          </div>
        </div>

        <div class="row">


          <?php

          foreach ($data as $rd) {
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


<?php } }?>

<!-- End Recommanded Offers Facility .... -->














    <!-- Recent Offers Facility -->


    <div id="ExplorePopularOffers" class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Recent Offers</h2>
            <p class="color-black-opacity-5">There are some of the leatest offeres that are started in sort time.</p>
          </div>
        </div>

        <div class="row">


          <?php

          $data = $this->MOffers->getRecentOffers();
          foreach ($data as $rd) {
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


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">How It Works</h2>
            <p class="color-black-opacity-5">We are providing you the best offers of your area. If you have business and want to grow your business then you can also provide the offers to customers and make your brand name in the market without more efforts.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-1.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">1</span>
              <h3>Register</h3>
              <p>Make your account in the website and be our customer. If you want to provide the offers then also ou need to register and create your account first. Click on below <b>SIGNUP</b> button to make your process fast.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-2.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">2</span>
              <h3>Explore Amazing Offers</h3>
              <p><b> LOGIN </b> in to your account and explore offers, There are many offers that you can enjoy. All the offers are from your nearest area. If  you want to check any other offers from different area then also you can search them. </p>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            <div class="how-it-work-step">
              <div class="img-wrap">
                <img src="<?= base_url('assets/assets_user/') ?>images/step-3.svg" alt="Free website template by Free-Template.co" class="img-fluid">
              </div>
              <span class="number">3</span>
              <h3>Provide Offers</h3>
              <p>If you have new startup and want to make your brand name in market very faster, then click on add offers button in profile tab and just make your business. that's all now you can make your brand name in market soon.</p>
            </div>
          </div>
        </div>
      </div>
    </div>







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



  <script>
    var typed = new Typed('.typed-words', {
      strings: ["Offers.", "Coupons.", "Discounts.", "Sales."],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 2000,
      startDelay: 500,
      loop: true,
      showCursor: false
    });
  </script>


</body>

</html>





  <div class="googleTranslate" id="google_translate_element"></div>
