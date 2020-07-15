<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();
	
// $OrderDetails['UserId'] = $_POST["CUST_ID"];
// $OrderDetails['OfferId'] = $_POST["productid"];
// $OrderDetails['BusinessId'] = $_POST["businessid"];


setcookie("OrderUserId", $_POST['CUST_ID'], time() + (86400 * 30), "/");
setcookie("OrderOfferId", $_POST['productid'], time() + (86400 * 30), "/");
setcookie("OrderBusinessId", $_POST['businessid'], time() + (86400 * 30), "/");


$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = base_url('user/paytmResponse');
// $paramList["PInfo"] = "offer"; //Mobile number of customer
$paramList["MSISDN"] = $_POST['phone']; //Mobile number of customer
$paramList["EMAIL"] = $_POST['email']; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="text" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>