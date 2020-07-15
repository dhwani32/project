
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
                <h1>Select Payment Method</h1>
                
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
            Payment Methods
          </div>
        </div>
     
     	<div class="row"> 
     		<div class="col-xl-3 col-md-6 col-sm-12"> 
     			<!-- 1 for determine the type used of payment is paytm  -->
          <?php 
            $userDetails = $this->db->query('select * from `userdetails` where UserId='.$UserId)->result_array();
            $offerDetails = $this->db->query('select * from `offers` where OfferId='.$OfferId)->result_array();
          ?>
				<a <?php if($userDetails[0]['ReferalPoints'] > $offerDetails[0]['OfferPayablePrice']){ ?>
          href="<?php echo base_url('user/makePayment/1/').$OfferId.'/'.$UserId; ?>"
        <?php } else { ?>
          onClick="balanceAlert()"
        <?php } ?> > <img width="100%" height="150" src="<?=base_url('assets/assets_payment_images/')?>downloadwallet.png"> </a>

        


     		</div>

     		<div class="col-xl-3 col-md-6 col-sm-12"> 
     			<!-- 2 for determine the type used of payment is payUmoney -->
				<a href="<?=base_url('user/makePayment/2/').$OfferId.'/'.$UserId?>"> <img width="100%" height="150" src="<?=base_url('assets/assets_payment_images/')?>payUmoney.png"> </a>
     		</div>

  
    <?php if($offerDetails[0]['OfferPaymentMode'] == 'COD'){?>
        <div class="col-xl-3 col-md-6 col-sm-12"> 
          <!-- 2 for determine the type used of payment is payUmoney -->
        <a href="<?=base_url('user/makePayment/3/').$OfferId.'/'.$UserId?>"> <img width="100%" height="150" src="<?=base_url('assets/assets_payment_images/')?>cod.jfif"> </a>
        </div>

    <?php } ?> 
     	</div>


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


<script type="text/javascript">
  
  function balanceAlert(){
    alert("Don't Have Enough Points");
  }

</script>
