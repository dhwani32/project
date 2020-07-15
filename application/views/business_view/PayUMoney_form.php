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

    <?php require('business_css_links.php'); ?> 

</head>

<body onload="submitPayuForm()">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
                    <!-- <?=print_r($businessdetails);?>
                    <?=print_r($packagedetails);?> -->
                    <!-- <?=print_r($hash);?>  -->
                    <!-- <?=print_r($posted['hash'])?> -->
                    <!-- <?=print_r($posted)?> -->

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
                            <input readonly class="form-control" name="amount" value="<?php echo (empty($posted['amount'])) ? $packagedetails[0]['PackagePrice'] : $posted['amount'] ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>First Name : </label>
                            <input class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $businessdetails[0]['CompanyName'] : $posted['firstname']; ?>" />
                          </div>
                            

                          <div class="col-md-12">
                            <label>Email : </label>
                            <input class="form-control" name="email" id="email" value="<?php echo (empty($posted['email'])) ? $businessdetails[0]['BusinessEmail'] : $posted['email']; ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>Phone : </label>
                            <input class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? $businessdetails[0]['BusinessPhone'] : $posted['phone']; ?>" />
                          </div>

                          <div class="col-md-12">
                            <label>Product Info : </label>
                            <input type="text" readonly class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $packagedetails[0]['PackageName'] : $posted['productinfo'] ?>" >
                          </div>

                          <input type="hidden" name="surl" value="<?=base_url('business/payment_success/')?><?=$businessdetails[0]['BusinessId']?>/<?=$userdetails[0]['UserId']?>/<?=$packagedetails[0]['PackageId']?>" size="64" />

                          <input type="hidden" name="furl" value="<?=base_url('business/payment_fail')?>" size="64" />
                            
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

    <?php require('business_js_links.php'); ?>

</body>

</html>
