
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>offersnearme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta name="author" content="Free-Template.co" /> -->

    <?php require('user_csslinks.php');?>

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

    <?php require('user_header.php');?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=base_url('assets/assets_logo/');?>hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Offers Related To Category</h1>

              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="offersDataMain col-lg-8">


            <?php if(isset($_SESSION['userDetails'])){

             foreach($allOffers as $o){


              $UserId = $_SESSION['userDetails'][0]['UserId'];
              $OfferId = $o['OfferId'];

              $stars = $this->MReview->getStars($UserId,$OfferId);

              $likes = $this->MReview->countStars($OfferId);
              $review = $this->MReview->countReview($OfferId);

              $favorite = $this->MOffers->getFavorite($OfferId, $UserId);

              $businessDetails = $this->db->query('SELECT * FROM `businessdetails` , `offers`  where offers.OfferId = '.$OfferId.' AND businessdetails.BusinessId='.$o['BusinessId'])->result_array();

              $Location = $this->MLocation->getLocation($businessDetails[0]['AreaId']);

            $image = $this->db->query('select * from `images` where OfferId='.$OfferId.' group by OfferId')->result_array();

              ?>


              <div class="d-block d-md-flex listing-horizontal">

              <a class="img d-block" style="background-image: url('<?=base_url('assets/assets_offers_images/');?><?=$image[0]['Image']?>')">
                <span class="category"><?=$o['OfferName']?></span>
              </a>

              <div class="lh-content">
                <a id="<?=$o['OfferId']?>" data-OfferId="<?=$o['OfferId'];?>" data-stars="<?=$stars;?>" data-UserId="<?=$_SESSION['userDetails'][0]['UserId'];?>" class="bookmark
                <?php if($stars == 1){ ?> icon-click <?php } ?> btn-heart-icon">
                  <span id="star<?=$o['OfferId']?>"  class="
                <?php if($stars == 1){ ?> icon-heart-click <?php } else { ?> icon-heart-noclick <?php } ?> icon-heart">
                  </span>
                </a>



                <h3><a href="<?=base_url('user/getOffersDetails/');?><?=$o['OfferId']?>"><?=$o['OfferDescription']?></a></h3>
                <p><?=$Location['AreaDetails'][0]['AreaName']?>, <?=$Location['CityDetails'][0]['CityName']?>, <?=$Location['StateDetails'][0]['StateName']?>, <?=$Location['CountryDetails'][0]['CountryName']?></p>
                <p> Price : <?=$o['OfferPrice'];?> Rs/- </p>



                  <span>( <?=$review?> Reviews, <?=$likes?> likes)</span>



                 <div class="col-12">
                  <form id="<?=$o['OfferId']?>" method="post" class="review-default float-left" action="<?=base_url('user/giveReview');?>">
                    <input type="hidden" value="<?=$_SESSION['userDetails'][0]['UserId']?>" name="UserId" >
                    <input type="hidden" value="<?=$o['OfferId']?>" name="OfferId" >
                    <input class="review-default-input float-left" id="rw-input-<?=$o['OfferId']?>"  type="text" name="OfferReview" placeholder="Give Review....">
                    <button type="submit" name="btnGiveReview" class="btn btn-pink float-right review-default-button" id="rw-btn-<?=$o['OfferId']?>"> R </button>
                  </form>


                  <a
                  <?php if($favorite <= 0){ ?>
                     href="<?=base_url('user/addToFavorite/');?><?=$o['OfferId']?>"
                  <?php } ?>
                  style="border-radius: 20px; color: #fff;"
                   class="float-right pl-4 pr-4 <?php if($favorite <= 0){ ?> btn btn-pink <?php } else { ?> btn btn-dark <?php } ?>" aria-label="View 3 items in your shopping cart">
                    Add +
                  </a>
                </div>


              </div>

            </div>

            <?php }?>


            <div class="col-12 mt-5 text-center">
              <div>
                <?php echo $links;?>
              </div>
            </div>

          <?php } else { ?>



            <?php foreach($allOffers as $o){


              $OfferId = $o['OfferId'];

              $likes = $this->MReview->countStars($OfferId);
              $review = $this->MReview->countReview($OfferId);

              $businessDetails = $this->db->query('SELECT * FROM `businessdetails` , `offers`  where offers.OfferId = '.$OfferId.' AND businessdetails.BusinessId='.$o['BusinessId'])->result_array();

              // print_r($businessDetails);
              $Location = $this->MLocation->getLocation($businessDetails[0]['AreaId']);

            $image = $this->db->query('select * from `images` where OfferId='.$OfferId.' group by OfferId')->result_array();



              ?>

              <div class="d-block d-md-flex listing-horizontal">

              <a href="<?=base_url('user/uc_login_page');?>" class="img d-block" style="background-image: url('<?=base_url('assets/assets_offers_images/');?><?=$image[0]['Image']?>')">
                <span class="category"><?=$o['OfferName']?></span>
              </a>


              <div class="lh-content">
                <!-- <a class="bookmark btn-heart-icon2"><span class="icon-heart icon-heart-noclick"></span></a> -->

                <h3><a href="<?=base_url('user/uc_login_page');?>"><?=$o['OfferDescription']?></a></h3>
                <p> <?=$Location['AreaDetails'][0]['AreaName']?>, <?=$Location['CityDetails'][0]['CityName']?>, <?=$Location['StateDetails'][0]['StateName']?>, <?=$Location['CountryDetails'][0]['CountryName']?> </p>
                <p> Price : <?=$o['OfferPrice'];?> Rs/- </p>




                  <span>( <?=$review?> Reviews, <?=$likes?> likes )</span>




                <div class="col-12">
                  <a href="<?=base_url('user/uc_login_page');?>" class="float-right pl-4 pr-4  btn btn-pink" aria-label="View 3 items in your shopping cart">
                    Add +
                  </a>
                </div>



              </div>

            </div>

            <?php }?>


            <div class="col-12 mt-5 text-center">
              <div>
                <?php echo $links;?>
              </div>
            </div>






          <?php } ?>

          </div>
          <div class="col-lg-3 ml-auto">

            <div class="mb-5">
              <h3 class="h5 text-black mb-3">Select Area</h3>
               <div class="form-group">

                                <label>Select Country</label>
                                <select required name="CountryDropDown" id="CountryDropDown" class="offset-0 col-12 form-control selectpicker">
                                    <?php
                                    $country = $this->MLocation->getCountry();
                                    foreach($country as $ac){ ?>

                                        <option value="<?=$ac['CountryId']?>"><?=$ac['CountryName']?></option>
                                    <?php } ?>

                                </select>

                                <label>Select State</label>
                                <select required name="StateDropDown" id="StateDropDown" class="offset-0 col-12 form-control selectpicker">

                                </select>

                                <label>Select City</label>
                                <select required name="CityDropDown" id="CityDropDown" class="offset-0 col-12 form-control selectpicker">

                                </select>

                                <label>Select Area</label>
                                <select required name="AreaDropDown" area="<?php if(!empty($businessDetails)){echo $businessDetails[0]['CategoryId'];}else{echo "0";}?>"
                                  user="<?php if(!isset($_SESSION['userDetails'])){echo "0";}else{echo "1";}?>"
                                 id="AreaDropDown" class="offset-0 col-12 form-control selectpicker">

                                </select>

                        </div>
            </div>




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

</style>

<script type="text/javascript">
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





<script type="text/javascript">
    $('#CountryDropDown').click(function(){
        // alert('asd');
        cid = $('#CountryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getState/')?>'+cid,
            success:function(result){
                $('#StateDropDown').html(result);
            }
        });
    });




    $('#StateDropDown').click(function(){
        cid = $('#StateDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getCity/')?>'+cid,
            success:function(result){
                $('#CityDropDown').html(result);
            }
        });
    });


    $('#CityDropDown').click(function(){
        cid = $('#CityDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getArea/')?>'+cid,
            success:function(result){
                $('#AreaDropDown').html(result);
            }
        });
    });

    $('#CategoryDropDown').click(function(){
        cid = $('#CategoryDropDown').val();
        $.ajax({
            url:'<?=base_url('admin/getSubcategory/')?>'+cid,
            success:function(result){
                // alert(result);
                $('#SubcategoryDropDown').html(result);
            }
        });
    });

    $('#AreaDropDown').click(function(){
      var id = $(this).val();
      var CategoryId = $(this).attr('area');
      var user = $(this).attr('user');



      // if(session == 0){
      //   alert("Please Login To Explore Offers Areawise..");
      // }else{

        if(id == null){
          id = 0;
        }

        // alert("Area : " + id + " Category : " + CategoryId);


        $.ajax({
          url: '<?=base_url('user/getOffersAreawise/')?>'+CategoryId+"/"+id+"/"+user,
          success: function(result){
            $('.offersDataMain').html(result);
          }
        });
      // }

    });



</script>
