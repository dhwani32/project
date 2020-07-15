
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
                <h1>All the favorite Offers and Coupons</h1>
                
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
    

    <div class="site-section bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12 h1 mb-5 text-center"> 
            Favorite Offers
          </div>
        </div>
      
        <div class="row">
            <div class=" col-2"> 
              Image
            </div>

            <div class=" col-2"> 
              Name
            </div>

            <div class=" col-3">
              Description
            </div>

            <div class="col-1">
              Price
            </div>

            <div class=" col-2">
              Get Coupon
            </div>            

            <div class=" col-2">
              Remove
            </div>
        </div>
        <br>
        <?php foreach ($myFavoriteOffers as $fo) {
          $OfferId = $fo['OfferId'];
          // echo $OfferId;
          $UserId = $fo['UserId'];
          $OffersDetails = $this->MOffers->getOffersForFavorite($OfferId);
          $offerImage = $this->MOffers->getOfferImageForFavorite($OfferId);
          // print_r($offerImage);
          // print_r($OffersDetails);
          if(count($OffersDetails) >= 1){
        ?>
          
          <div class="orderCard">
        <div class="row">
            <div class=" col-2"> 
              <img width="70px" height="70px" src="<?=base_url('assets/assets_offers_images/')?><?php print_r($offerImage[0]['Image']); ?>" alt="Offer Image">
            </div>

            <div class=" col-2"> 
              <?=$OffersDetails[0]['OfferName']?>
            </div>

            <div class=" col-3">
              <?=$OffersDetails[0]['OfferDescription']?>
            </div>

            <div class="col-1">
              <?=$OffersDetails[0]['OfferPrice']?>
            </div>

            <div class=" col-2">
              <a href="<?=base_url('user/getCoupon/')?><?=$OfferId?>/<?=$UserId?>" > Get Coupon </a>
            </div>            

            <div class=" col-2">
              <a href="<?=base_url('user/removeFavorite/')?><?=$OfferId?>/<?=$UserId?>" > Remove </a>
            </div>
        </div>
      </div>

      <?php  } } ?>

      </div>
    </div>

    





   <div class="py-5 bg-primary">
      <div class="container">
        
      </div>
    </div>



    
  
    
    <?php require('user_footer.php');?>
  </div>

  <?php require('user_jslinks.php');?>
  
  </body>
</html>

<!-- 
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
</script> -->






<style type="text/css">
  

  .orderCard{
    background: #eee;
    width: 100%;
    height: 70px;
    box-shadow: 5px 5px 10px 1px #ddd;
    margin-bottom: 20px;
    border-radius: 10px;
    overflow-wrap: break-word;
    overflow: hidden;
  }

</style>