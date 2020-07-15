<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="<?=base_url('user/paytm_form/').$OfferId.'/'.$UserId;?>">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input class="form-control" readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>










 -->




















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
    <title>Register | jeweler - Material Admin Template</title>
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


</head>

<body>
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
                    <h3>PayTm Form</h3>
                    <p>Payment Gatway for your safe transactions..</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                       


                       <form method="post" action="<?=base_url('user/paytm_form/').$OfferId.'/'.$UserId;?>">

                       		<div class="col-12"> 
                       			<label> Order ID : </label>
                       			<input class="form-control" readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20"
											name="ORDER_ID" autocomplete="off"
											value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                       		</div>	


                       		<div class="col-12"> 
                       			<label> Cust ID : </label>
                       			<input class="form-control" readonly id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?=$userdetails[0]['UserId']?>">
                       		</div>	


                       		<div class="col-12"> 
                       			<label> Ind Type ID : </label>
                       			<input class="form-control" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                       		</div>	


                       		<div class="col-12"> 
                       			<label> Channel ID : </label>
                       			<input class="form-control" readonly id="CHANNEL_ID" tabindex="4" maxlength="12"
											size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                       		</div>	
									
							<div class="col-12"> 
                       			<label> Transaction Amount : </label>
                       			<input class="form-control" readonly title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?=$offerdetails[0]['OfferPayablePrice']?>">
                       		</div>	

                       		<div class="col-12">
	                            <label>First Name : </label>
	                            <input class="form-control" name="firstname" id="firstname" value="<?php echo $userdetails[0]['UserName']; ?>" />
                         	 </div>
                            

                          <div class="col-12">
                            <label>Email : </label>
                            <input class="form-control" name="email" id="email" value="<?php echo $userdetails[0]['UserEmail'];?>" />
                          </div>

                          <div class="col-12">
                            <label>Phone : </label>
                            <input class="form-control" name="phone" value="<?php echo $userdetails[0]['UserPhone']; ?>" />
                          </div>

                          <div class="col-12">
                            <label>Business Id : </label>
                            <input class="form-control" readonly name="businessid" id="businessid" value="<?php echo $businessdetails[0]['BusinessId'];?>" />
                          </div>

                          <div class="col-12">
                            <label>Product Id : </label>
                            <input type="text" readonly class="form-control" name="productid" value="<?php 
                            echo $offerdetails[0]['OfferId']; ?>" >
                          </div>

                          <div class="col-12">
                            <label>Product Info : </label>
                            <input type="text" readonly class="form-control" name="productinfo" value="<?php echo $offerdetails[0]['OfferName']; ?>" >
                          </div>


                       		<br>
                       		<div class="col-12"> 
                       			<input class="btn mt-3 btn-primary" value="CheckOut" type="submit"	onclick="">
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
