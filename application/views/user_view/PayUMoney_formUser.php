<?php

$MERCHANT_KEY = "1j4MAE4a";
$SALT = "KbwGYH0nyR";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    // $posted['hash'] = $hash;
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>























<?php 
    if(!isset($_SESSION['userDetails'])){
        redirect(base_url());
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>offersnearme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >

    <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="<color-code>" bolt-logo="<image path>"></script>
    



    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/assets_business/');?>assets/img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/main.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?=base_url('assets/assets_business/');?>assets/css/responsive.css">
    <!-- modernizr JS -->





    <script type="text/javascript">
      var hash = '<?php echo $hash ?>';
      function submitPayuForm() {
        if(hash == '') {
          return;
        }
        var payuForm = document.forms.payuForm;
        payuForm.submit();
      }
    </script>

    

</head>

<body onload="submitPayuForm()">
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?=base_url();?>" class="btn btn-primary">Back to Userside</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>PayU Form</h3>
                    <p>Payment Gatway for your safe transactions..</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <?php if($formError) { ?>
                          <span style="color:red">Please fill all mandatory fields.</span>
                          <br/>
                          <br/>
                        <?php } ?>
                        <?php if(isset($error)){print_r($error);}?>
                        


                        <form action="<?php echo $action; ?>" method="post" name="payuForm">
                          <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                          <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                          <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                          <div class="col-md-12">
                            <p style="font-size: 20px; font-weight: 900; padding-bottom: 30px;"> Madatory Parameters </p>
                          </div>

                          <div class="col-md-12">
                            <label>Amount : </label>
                            <input readonly class="form-control" name="amount" value="<?php echo (empty($posted['amount'])) ? $offerdetails[0]['OfferPayablePrice'] : $posted['amount'] ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>First Name : </label>
                            <input class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $userdetails[0]['UserName'] : $posted['firstname']; ?>" />
                          </div>
                            

                          <div class="col-md-12">
                            <label>Email : </label>
                            <input class="form-control" name="email" id="email" value="<?php echo (empty($posted['email'])) ? $userdetails[0]['UserEmail'] : $posted['email']; ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>Phone : </label>
                            <input class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? $userdetails[0]['UserPhone'] : $posted['phone']; ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>Product Info : </label>
                            <input type="text" readonly class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $offerdetails[0]['OfferName'] : $posted['productinfo'] ?>" >
                          </div>

                          <div class="col-md-12">
                            <label>Payment Mode : </label>
                            <input type="text" readonly class="form-control" name="paymentmode" value="<?php echo (empty($posted['paymentmode'])) ? $offerdetails[0]['OfferPaymentMode'] : $posted['paymentmode'] ?>" >
                          </div>

                          <input type="hidden" name="surl" value="<?=base_url('user/payment_success/')?><?=$businessdetails[0]['BusinessId']?>/<?=$userdetails[0]['UserId']?>/<?=$offerdetails[0]['OfferId']?>" size="64" />

                          <input type="hidden" name="furl" value="<?=base_url('user/payment_fail')?>" size="64" />
                            
                          <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                          
                          <div style="margin-top: 20px;" class="col-md-12">  
                            <?php if(!$hash) { ?>
                              <input class="col-md-3 btn btn-primary" type="submit" value="Submit" />
                            <?php } ?>
                              
                          </div>
                        </form>
                      
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
              <p> Please Do Not Refresh To Make Safe Transactions. </p>
            </div>
        </div>
    </div>

    

































<!-- jquery

    
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/morrisjs/raphael-min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/morrisjs/morris.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/calendar/moment.min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/calendar/fullcalendar.min.js"></script>
    <script src="<?=base_url('assets/assets_business/');?>assets/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?=base_url('assets/assets_business/');?>assets/js/main.js"></script>

    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>




















</body>

</html>
