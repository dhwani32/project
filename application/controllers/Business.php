<!-- API TOKEN SECRET OF BULKSMS : Fd6X9IzU*xXVTELwjUhU6wNRUkF8d -->


<?php
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


	class Business extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('MLocation');
			$this->load->model('MCategory');
			$this->load->model('MBusiness');
			$this->load->model('MPackages');
			$this->load->model('MOffers');
			$this->load->model('MSponsor');

			if(!isset($_SESSION['userDetails'])){
				redirect(base_url(''));
			}
		}

		public function businessRegisterPage($UserId){
			$where['UserId'] = $UserId;
			$data = $this->db->where($where)->get('businessdetails')->result_array();
			// $this->checkPackageExpire($data[0]['BusinessId']);
			// $data = $this->db->where($where)->get('businessdetails')->result_array();
			// echo count($data);
			// print_r($data);
			if(count($data) > 0){
				if($data[0]['PackageId'] == null){

					$data['businessdetails'] = $this->db->query('select * from `businessdetails` where UserId = '.$UserId)->result_array();

					$this->load->view('business_view/business_packages',$data);
				}else{
					redirect(base_url('business/businessHome'));
				}
			}else{
				$this->load->view('business_view/business_register');
			}
		}

		public function checkPackageExpire($BusinessId){
			$date = date('Y-m-d');
			// print_r($date);
			$delete = $this->db->query('DELETE  FROM `activepackage` WHERE EndDate =\''.$date.'\' AND BusinessId='.$BusinessId);
			$data['activePackageBusiness'] = count($this->db->query('select * from `activepackage` where BusinessId='.$BusinessId)->result_array());

			if($data['activePackageBusiness'] <= 0){
				$this->db->where(array('BusinessId'=>$BusinessId))->update('businessdetails',array('PackageId'=>NULL));
				$where['BusinessId'] = $BusinessId;
				$data['business'] = $this->db->where($where)->get('businessdetails')->result_array();

				$whereUser['UserId'] = $data[0]['UserId'];
				$updateUser['UserType'] = 0;
				$this->db->where($whereUser)->update('userdetails',$updateUser);

				// print_r($data);
			}
		}

		public function businessHome(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();
			$this->checkPackageExpire($data['businessDetails'][0]['BusinessId']);
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();
			// print_r($data);
			$data['Orders'] = $this->db->query('SELECT count(OrderId) as TotalOrder, OrderDate FROM `Orders` WHERE BusinessId='.$data['businessDetails'][0]['BusinessId'].' AND substr(OrderDate, 1, 7) = "'.date('Y-m').'" group by OrderDate')->result_array();

			if($data['businessDetails'][0]['PackageId'] == NULL){
				redirect(base_url('business/businessRegisterPage/').$UserId);
			}else{
				$this->load->view('business_view/business_home',$data);
			}
		}


		public function generateImageName($data){

			function randomString($StrLength){
			$str = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				return substr(str_shuffle($str),0,$StrLength);
			}
			$imageNamePRFX = substr($data['CompanyName'],0,5);
			$imageNamePOFX = randomString(4);
			$imageName = $imageNamePRFX.$imageNamePOFX;
			return $imageName;
		}



		public function businessRegister(){
			$businessData = $this->input->post();
			// print_r($businessData);

			$imageName = $this->generateImageName($businessData);

			$config['upload_path'] = 'assets/assets_business_images/';
			$config['allowed_types'] = 'jpg|jpeg|png|jfif';
			$config['file_name'] = $imageName;

			$this->load->library('upload',$config);

			if($this->upload->do_upload('BusinessImage')){
				$imageData = $this->upload->data();

				$userdetails = $this->db->query('select * from `userdetails` where UserId = '.$businessData['UserId'])->result_array();

				$insert['UserId'] = $businessData['UserId'];
				$insert['CompanyName'] = $businessData['CompanyName'];
				$insert['AreaId'] = $businessData['AreaDropDown'];
				$insert['Pincode'] = $businessData['Pincode'];
				$insert['CategoryId'] = $businessData['SubcategoryDropDown'];
				$insert['BusinessEmail'] = $userdetails[0]['UserEmail'];
				$insert['BusinessPhone'] = $userdetails[0]['UserPhone'];
				$insert['BusinessImage'] = $imageData['file_name'];

				$this->db->insert('businessdetails',$insert);

				$data['businessdetails'] = $this->db->query('select * from `businessdetails` where UserId = '.$businessData['UserId'])->result_array();
				$this->load->view('business_view/business_packages',$data);
				// $this->load->view('admin_view/manageCategory');
			}else{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('business_view/business_register',$error);
  				// $this->load->view('admin_view/manageCategory', $error);
			}





			// $where['UserId'] = $businessData['UserId'];
			// $update['UserType'] = 1;
			// $this->db->where($where)->update('userdetails',$update);
			// print_r($businessDetails);


		}

		public function addOffers(){

			$offerData = $this->input->post();
			// print_r($offerData);
			$whereBid = $offerData['BusinessId'];
			$businessdetails = $this->db->query('select * from `businessdetails` where BusinessId='.$whereBid)->result_array();
			// print_r($businessdetails);
			$counter = $businessdetails[0]['OffersCounter'];

			$totalOffers = $this->db->query('select TotalOffers from `package` where PackageId='.$businessdetails[0]['PackageId'])->result_array();

			if($counter >= $totalOffers){
				echo "Plane expire";
			}

			// print_r($offerData);

			$counter++;

			$updateData['OffersCounter'] = $counter;

			$whereB['BusinessId'] = $whereBid;
			$this->db->where($whereB)->update('businessdetails',$updateData);



			$OfferPayable = $offerData['OfferPrice'] - ( $offerData['OfferPrice'] * $offerData['OfferPr'] / 100 );


			$insert['BusinessId'] = $offerData['BusinessId'];
			$insert['OfferName'] = $offerData['OfferName'];
			$insert['OfferPrice'] = $offerData['OfferPrice'];
			$insert['OfferDescription'] = $offerData['OfferDescription'];
			$insert['StartDate'] = $offerData['StartDate'];
			$insert['EndDate'] = $offerData['EndDate'];
			$insert['CategoryId'] = $offerData['CategoryId'];
			$insert['OfferPr'] = $offerData['OfferPr'];
			$insert['OfferPayablePrice'] = $OfferPayable;
			$insert['OfferPaymentMode'] = $offerData['OfferPaymentMode'];


			$this->db->insert('offers',$insert);


			$OfferId = $this->db->insert_id();


			$config['upload_path'] = 'assets/assets_offers_images';
			$config['allowed_types'] = 'gif|jpg|png|jfif|jpeg';
			$this->load->library('upload',$config);

			for($i=0;$i<count($_FILES['OfferImages']['name']);$i++){
				$_FILES['tempFile']['name'] = $_FILES['OfferImages']['name'][$i];
				$_FILES['tempFile']['type'] = $_FILES['OfferImages']['type'][$i];
				$_FILES['tempFile']['tmp_name'] = $_FILES['OfferImages']['tmp_name'][$i];
				$_FILES['tempFile']['error'] = $_FILES['OfferImages']['error'][$i];
				$_FILES['tempFile']['size'] = $_FILES['OfferImages']['size'][$i];

				if($this->upload->do_upload('tempFile')){
					$data = $this->upload->data();
					$insertImg['Image'] = $data['file_name'];
					$insertImg['OfferId'] = $OfferId;
					$this->db->insert('images',$insertImg);

				}else{
					$error = array('error' => $this->upload->display_errors());
	  				// echo $error;
	  				// $this->load->view('business/businessHome', $error);
				}
			}

			redirect(base_url('business/businessHome'));

		}



		public function selectPackage($PackageId, $UserId){
			redirect(base_url('business/payUmoney_form/'.$PackageId."/".$UserId));
		}


		public function payUmoney_form($PackageId, $UserId){


			$data['businessdetails'] = $this->db->query('select * from `businessdetails` where UserId = '.$UserId)->result_array();
			$data['packagedetails'] = $this->db->query('select * from `package` where PackageId = '.$PackageId)->result_array();
			$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();

			if($data['packagedetails'][0]['PackagePrice'] == 0){

				redirect(base_url('business/payment_success/').$data['businessdetails'][0]['BusinessId'].'/'.$data['userdetails'][0]['UserId'].'/'.$data['packagedetails'][0]['PackageId']);
			}else{
				$this->load->view('business_view/PayUMoney_form',$data);
			}


		}



		public function payment_success($BusinessId, $UserId, $PackageId){

			// echo "Business : ".$BusinessId." User : ".$UserId."Package : ".$PackageId;

			/// take data of business from the database for the business details...
			$data['businessdetails'] = $this->db->query('select * from `businessdetails` where UserId = '.$UserId)->result_array();
			// print_r($data);


			///take teh data from the userdetails table to use in this function...
			$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId ='.$UserId)->result_array();



			/// take data from the package table to use the packages related details in the page..
			$data['packagedetails'] = $this->db->query('select * from `package` where PackageId = '.$PackageId)->result_array();

			// print_r($data['packagedetails']);

			/// take the package duration and the month of the package to count the expiry date of the package ...
			$monthstoadd = $data['packagedetails'][0]['PackageDuration'];



			/// take the data of the successful payment form the business transactions...
			$dataPost = $this->input->post();



			/// split the date from the string to count the seconds...
			$monthsToAdd2 = explode(' ', $monthstoadd);



			/// count the second to add in the time..
			$timeAdd = $monthsToAdd2[0]*30*24*60*60;
			// print_r($timeAdd);


			// print_r($dataPost);
			// echo "<br>";


			/// create the end date from the today's time..
			$EndDate = date("Y-m-d",time()+$timeAdd);
			$CurrDate = date("Y-m-d", time());

			$where['BusinessId'] = $BusinessId;
			$update['PackageId'] = $PackageId;

			$this->db->where($where)->update('businessdetails',$update);


			$insert['PackageId'] = $PackageId;
			$insert['BusinessId'] = $BusinessId;
			$insert['EndDate'] = $EndDate;
			$insert['Duration'] = $monthsToAdd2[0];

			// print_r($monthsToAdd2[0]);

			if(!empty($dataPost['addedon']) &&
				!empty($dataPost['status']) &&
				!empty($dataPost['txnid']) &&
				!empty($dataPost['mode']) )
			{
				$insert['StartDate'] = $dataPost['addedon'];
				$insert['PaymentStatus'] = $dataPost['status'];
				$insert['PackageTransactionNumber'] = $dataPost['txnid'];
				$insert['PaymentMethod'] = $dataPost['mode'];
			}else{
				$insert['StartDate'] = $CurrDate;
				$insert['PaymentStatus'] = 'Free';
				$insert['PackageTransactionNumber'] = 'Free Package';
				$insert['PaymentMethod'] = 'Free';
			}

			$this->db->insert('activePackage',$insert);


			$Mobile = $data['userdetails'][0]['UserPhone'];
			$MassageSMS = "Your Payment has been done. and Business successfully started...";






			/// this is the very important function to send the sms to user ..
			$this->sendSMS($Mobile, $MassageSMS);







			if(empty($dataPost['addedon']) &&
				empty($dataPost['status']) &&
				empty($dataPost['txnid']) &&
				empty($dataPost['mode']) )
			{
				$MassageEmail = " You have been selected the trial package for free...";
			}else{
				$MassageEmail = "
				<h5> Dear Customer ".$data['userdetails'][0]['UserName'].". </h5>
				<br>
				<b> Your CompanyName : ".$data['businessdetails'][0]['CompanyName'].". </b>
				<p>has been selected the <b>".$data['packagedetails'][0]['PackageName']."</b> of total amount of <b>
				".$data['packagedetails'][0]['PackagePrice']."</b> for the business offers listing.  <br> .
				<br>
				Transaction has been successfully processed.
				<br> <br>
				Your transactionId is : <b>".$dataPost['txnid']."</b>.


				</p>

				";

			}	


			$sendTo = $data['userdetails'][0]['UserEmail'];


			$subject = "Package Selected";

			$this->sendEmail($sendTo, $subject, $MassageEmail);


			$updateUser['UserType'] = 1;
			$whereUser['UserId'] = $data['userdetails'][0]['UserId'];
			// $this->db->where($whereUser)->update('userdetails',$updateUser);





			redirect(base_url('business/businessHome'));


		}

		public function sendSMS($Mobile, $Msg){


				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?Group_id=group_id&authkey=ENTERYOURKEY&mobiles=$Mobile&country=91&message=$Msg&sender=TESTIN&route=4",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}

		}


		public function sendEmail($sendTo,$subject,$Msg){
			$this->load->library('email');

			$this->email->from('dhwanishiroya32@gmail.com', 'DD[onm]');
			$this->email->to($sendTo);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');

			$this->email->subject($subject);
			$this->email->message($Msg);

			if(!$this->email->send()){
				echo "something wents wronge while sending email.....";
			}
		}




		public function payment_fail(){
			// echo "payment fail page...";
			$data['businessdetails'] = $this->db->query('select * from `businessdetails` where UserId = '.$businessData['UserId'])->result_array();
			$this->load->view('business_view/business_packages',$data);
		}


















		public function OfferRedeemPage(){

			if(isset($_POST['btnRedeemCheck'])){
				$checkData = $this->input->post();

				$data['TransactionData'] = $checkData;

				$TransactionRecords = $this->db->query('select * from `orders` where TransectionId=\''.$checkData['TransactionId'].'\' and OfferDistributeState = 0 and OfferRedeemCode=\''.$checkData['RedeemCode'].'\'')->result_array();
				// print_r($TransactionRecords);
				$data['TransactionRecords'] = $TransactionRecords;


				if(count($TransactionRecords) > 0){
					$this->session->set_flashdata('validTIdCode', 'TransactionId :'.$checkData['TransactionId'].' and Redeem Code '.$checkData['RedeemCode'].' are aprroved..');
					$data['userDetails'] = $this->db->query('SELECT * FROM `userdetails` WHERE UserId='.$TransactionRecords[0]['UserId'])->result_array();
					// print_r($data);
					$this->load->view('business_view/OfferRedeemPage', $data);

				}else{
					$this->session->set_flashdata('invalidTIdCode','TransactionId :'.$checkData['TransactionId'].' and Redeem Code '.$checkData['RedeemCode'].' not aprroved..');
					$this->load->view('business_view/OfferRedeemPage');

				}



			}else{
				$this->load->view('business_view/OfferRedeemPage');
			}



		}


		public function DistributeOffer($TransactionId, $RedeemCode){
			// print_r($TransactionId);
			// print_r($RedeemCode);

			date_default_timezone_set('Asia/Kolkata');

			$CurrDate = date("Y-m-d", time());

			$where['TransectionId'] = $TransactionId;
			$where['OfferRedeemCode'] = $RedeemCode;
			$updateDistributeState['OfferDistributeState'] = 1;
			$updateDistributeState['OfferDistributeDate'] = $CurrDate;
			$updateDistributeState['OfferOrderPayment'] = "Payed";



			$this->db->where($where)->update('orders', $updateDistributeState);

			redirect(base_url('business/OfferRedeemPage'));

		}







		public function msgFromAdminPage(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();

			$data['msgFromAdmin'] = $this->db->query('select * from `adminbusinesschat` where BusinessId='.$data['businessDetails'][0]['BusinessId'])->result_array();
			// print_r($data);
			$this->load->view('business_view/business_msgFromAdmin',$data);
		}


		public function msgFromUserPage(){

			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();

			$data['msgFromUser'] = $this->db->query('select * from `chat` where ReceiverBusinessId='.$data['businessDetails'][0]['BusinessId'])->result_array();

			// print_r($data);

			$this->load->view('business_view/business_msgFromUser',$data);
		}





		public function replyMsgToUser(){

			$data = $this->input->post();


			// set the timezone of the india
			date_default_timezone_set('Asia/Kolkata');
			$date['time'] = date('H:i:s',time());
			$date['date'] = date('Y-m-d',time());
			// $datetime = date('Y-m-d H:i:s', time());
			// print_r($date);
			print_r($data);


			$insertChat['SenderBusinessId'] = $data['SenderBusinessId'];
			$insertChat['ReceiverId'] =  $data['ReceiverId'];
			$insertChat['Message'] = $data['Message'];
			$insertChat['ChatDate'] = $date['date'];
			$insertChat['ChatTime'] = $date['time'];

			$this->db->insert('chat',$insertChat);

			redirect(base_url('business/msgFromUserPage'));


		}


		public function sendMsgToAdmin(){
			$data['msg'] = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$date['time'] = date('H:i:s',time());
			$date['date'] = date('Y-m-d',time());
			$datetime = date('Y-m-d H:i:s', time());

			// print_r($data);
			// print_r($date);

			$insertMsg['date'] = $date['date'];
			$insertMsg['time'] = $date['time'];
			// $insertMsg['time'] = $datetime;
			$insertMsg['FromBusiness'] = $data['msg']['BusinessId'];
			$insertMsg['Message'] = $data['msg']['Message'];

			$this->db->insert('adminbusinesschat', $insertMsg);

			redirect(base_url('business/businessHome'));
		}


		public function manageDailyReports(){

			date_default_timezone_set('Asia/Kolkata');

			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();
			$CurrDate = date("Y-m-d", time());
			$data['orders'] = $this->db->query('SELECT * FROM `orders` WHERE BusinessId='.$data['businessDetails'][0]['BusinessId'].' and OrderDate=\''.$CurrDate.'\'')->result_array();
			// print_r($data);

			$this->load->view('business_view/manageDailyReports',$data);

		}

		public function managecustomReports(){
			$this->load->view('business_view/managecustomReports');
		}


		public function getManagecustomReports(){
			date_default_timezone_set('Asia/Kolkata');
			$CurrDate = date("Y-m-d", time());

			$data['Date'] = $this->input->post();
			$StartDate = $data['Date']['reportStartDate'];
			$EndDate = $data['Date']['reportEndDate'];

			$UserId = $_SESSION['userDetails'][0]['UserId'];

			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();
			// SELECT * FROM `orders` WHERE BusinessId = 2 AND OrderDate >= '2020-03-01' AND OrderDate <= '2020-03-30'
			$data['orders'] = $this->db->query('SELECT * FROM `orders` WHERE BusinessId='.$data['businessDetails'][0]['BusinessId'].' and OrderDate>=\''.$StartDate.'\' and OrderDate<=\''.$EndDate.'\'')->result_array();
			// print_r($data);

			$this->load->view('business_view/managecustomReports',$data);

		}

		public function manageOffers(){

			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE UserId='.$UserId)->result_array();
			$data['offersDetails'] = $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$data['businessDetails'][0]['BusinessId'])->result_array();
			$this->load->view('business_view/manageOffers', $data);

		}


		public function editOffers(){

			$data = $this->input->post();



			// print_r($data);

			$OfferPayable = $data['OfferPrice'] - ( $data['OfferPrice'] * $data['OfferPr'] / 100 );
			// echo $OfferPayable;


			$updateOffers['OfferName'] = $data['OfferName'];
			$updateOffers['OfferDescription'] = $data['OfferDescription'];
			$updateOffers['OfferPrice'] = $data['OfferPrice'];
			$updateOffers['StartDate'] = $data['OfferStartDate'];
			$updateOffers['EndDate'] = $data['OfferEndDate'];
			$updateOffers['OfferPr'] = $data['OfferPr'];
			$updateOffers['OfferPayablePrice'] = $OfferPayable;

			$where['OfferId'] = $data['OfferId'];
			$this->db->where($where)->update('offers', $updateOffers);

			redirect(base_url('business/manageOffers'));
		}

		public function deleteOffers($OfferId){
			$data = $this->db->query('select * from `orders` WHERE OfferId='.$OfferId.' AND OfferDistributeState = 0')->result_array();
			


			if(count($data) <= 0){
				$this->db->query('delete from `offers` where OfferId = '.$OfferId);
				redirect(base_url('business/manageOffers'));
			}else{
				$this->session->set_flashdata('offerDeleteErrMsg', 'Some Orders are not distributed so you can not delete the offer..');
				redirect(base_url('business/manageOffers'));
			}
			
		}


		public function allOfferDetails($OfferId){
			$data['offerDetails'] = $this->db->query('select * from `offers` where OfferId='.$OfferId)->result_array();
			$data['offerImages'] = $this->db->query('select * from `images` where OfferId='.$OfferId)->result_array();	
			$data['offerOrders'] = $this->db->query('select * from `orders` where OfferId='.$OfferId)->result_array();	
			$data['offerComments'] = $this->db->query('select * from `offercomments` where OfferId='.$OfferId)->result_array();	
			$data['offerReviews'] = $this->db->query('select * from `review` where OfferId='.$OfferId)->result_array();
			$data['offerRatings'] = $this->db->query('select * from `ratingstar` where OfferId='.$OfferId)->result_array();

			$this->load->view('business_view/business_offersDetails',$data);
		}	






		public function manageLocation(){

			$this->load->view('business_view/business_manageLocation');
		}

		public function setBusinessLocation(){
			$data = $this->input->post();
			// print_r($data);

			$updateLocation['BusinessLocation'] = $data['BusinessLocationSrc'];

			$where['BusinessId'] = $data['BusinessId'];

			$this->db->where($where)->update('businessdetails', $updateLocation);
			redirect(base_url('business/manageLocation'));
		}




		/// this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 
		/// this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 
		/// this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 




		public function businessBank(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$BusinessId = $this->db->query('select BusinessId from 	`businessdetails` where UserId='.$UserId)->result_array();
			// print_r($BusinessId);
			$data['businessWallet'] = $this->db->query('select * from `businessdetails` where BusinessId = '.$BusinessId[0]['BusinessId'])->result_array();
			$this->load->view('business_view/business_businessBank', $data);
		}


		public function setBusinessBank(){
			$data = $this->input->post();
			
			$insertBD['BusinessBankName'] = $data['BusinessBankName'];
			$insertBD['BusinessBankAccNo'] = $data['BusinessBankAccNo'];
			$insertBD['BusinessBankIFSC'] = $data['BusinessBankIFSC'];
			$insertBD['BusinessBankBranch'] = $data['BusinessBankBranch'];
			$insertBD['BusinessPanNo'] = $data['BusinessPanNo'];

			$whereBD['BusinessId'] = $data['BusinessId'];

			$this->db->where($whereBD)->update('businessdetails', $insertBD);
			redirect(base_url('business/businessBank'));
		}


		public function requestForCash(){
			$data = $this->input->post();
			print_r($data);
			if($data['AmountToConvert'] > $data['MaxAmount']  || $data['AmountToConvert'] < 1000){
				$this->session->set_flashdata('RQFCErr', 'You Have Insufficient Balance Or Improper Amount.');
				redirect(base_url('business/businessBank'));
			}else{	

				$update['BusinessWallate'] = $data['MaxAmount'] - $data['AmountToConvert'];
				$where['BusinessId'] = $data['BusinessId'];
				$this->db->where($where)->update('businessdetails', $update);


				date_default_timezone_set('Asia/Kolkata');
				$date['date'] = date('Y-m-d',time());

				$insert['TransactionRequestId'] = $this->generateRequestId();
				$insert['BusinessId'] = $data['BusinessId'];
				$insert['TransactionAmount'] = $data['AmountToConvert'];
				$insert['RequestDate'] = $date['date'];
				$insert['RequestStatus'] = 'Requested';

				$this->db->insert('businesstransactiondetails', $insert);
				$this->session->set_flashdata('RQFCScc', 'Request Send, Transaction Will Done Within 3 Days.');

				redirect(base_url('business/businessBank'));
			}
		}



		public function generateRequestId(){
			function randomString($StrLength){
			$str = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				return substr(str_shuffle($str),0,$StrLength);
			}
			return randomString(4).randomString(3).randomString(3).randomString(2);
		}




		/// End this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 
		/// End this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 
		/// End this functions are use to connect the business with bank and the bank transactions of the wallet coins.. 


		public function manageSponsorPage(){
			$this->load->view('business_view/manageSponsorPage');
		}

		public function selectSponsorPlan($spid){
			$data['userId'] = $_SESSION['userDetails'][0]['UserId'];
			$data['businessDetails'] = $this->db->where(array('UserId' => $data['userId']))->get('businessdetails')->result_array();	
			$data['sponsorPlanDetails'] = $this->db->where(array('SponsorPlanId' => $spid))->get('sponsorplans')->result_array();

			$this->load->view('business_view/PayUMoney_Sponsor',$data);
			
		}

		public function sponsorPlanPayment_success($BusinessId, $UserId, $SponsorPlanId){
			$data['transactionDetails'] = $this->input->post();
			$data['businessDetails'] = $this->db->where(array("BusinessId" => $BusinessId))->get('businessdetails')->result_array();
			$data['sponsorPlanDetails'] = $this->db->where(array("SponsorPlanId" => $SponsorPlanId))->get('sponsorplans')->result_array();


			$monthstoadd = $data['sponsorPlanDetails'][0]['PlanDuration'];
			$monthsToAdd2 = explode(' ', $monthstoadd);
			$timeAdd = $monthsToAdd2[0]*30*24*60*60;
			$EndDate = date("Y-m-d",time()+$timeAdd);

			print_r($EndDate);


			// print_r($data);

			$insertSponsorDetails['BusinessId'] = $data['businessDetails'][0]['BusinessId'];
			$insertSponsorDetails['SponsorPlanId'] = $data['sponsorPlanDetails'][0]['SponsorPlanId'];
			$insertSponsorDetails['TransactionDate'] = $data['transactionDetails']['addedon'];
			$insertSponsorDetails['TransactionAmount'] = $data['transactionDetails']['amount'];
			$insertSponsorDetails['TransactionMode'] = $data['transactionDetails']['mode'];
			$insertSponsorDetails['TransactionId'] = $data['transactionDetails']['txnid'];
			$insertSponsorDetails['EndDate'] = $EndDate;

			$this->db->insert('sponsordetails', $insertSponsorDetails);
			redirect(base_url('business/manageSponsorPage'));


		}

		public function SponsorPlanPayment_fail(){

		}


		public function generateExl($type, $BusinessId)
		{
			// Create new Spreadsheet object
			  $spreadsheet = new Spreadsheet();
			  $sheet = $spreadsheet->getActiveSheet();

			// Set document properties
			    $spreadsheet->getProperties()->setCreator('Offersnearme')
			      ->setLastModifiedBy('Offersnearme')
			      ->setTitle('Report')
			      ->setSubject('')
			      ->setDescription('');

			// add style to the header
			   
			    //auto fit column to content
				foreach(range('A', 'Z') as $columnID) 
				{
			      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			    }


			    /// current date 
			    date_default_timezone_set('Asia/Kolkata');
			    $curDate = date('Y-m-d');

			    /// date of week
			    $weeklyDate = date('Y-m-d', time() - 7*24*60*60);


			    /// date of month
			    $monthlyDate = date('Y-m-d', time() - 30*24*60*60);



			    if($type == "daily"){
				    $getdata = $this->db->query('SELECT *
				    							FROM `orders`
				    							WHERE BusinessId = '.$BusinessId.'
				    							AND OrderDate = '.$curDate)->result_array();
			    	 $filename= 'dailyReports.xls';

			    }else if($type == "weekly"){
				    $getdata = $this->db->query('SELECT *
				    							FROM `orders`
				    							WHERE BusinessId = '.$BusinessId.'
				    							AND OrderDate >= '.$weeklyDate)->result_array();
			    	 $filename= 'weeklyReports.xls';
			    }else if($type == "monthly"){
			    	$getdata = $this->db->query('SELECT *
				    							FROM `orders`
				    							WHERE BusinessId = '.$BusinessId.'
				    							AND OrderDate >= '.$monthlyDate)->result_array();
			    	 $filename= 'monthlyReports.xls';
			    }

	

			    $row=1;
			    $column='A';
			    foreach($getdata[0] as $key => $value)
			    {
			    	
				    $sheet->setCellValue($column.$row, $key);
				    $column++;
			    }
			     

			    // Add some data
			    $row = 2;
			   
			    foreach($getdata as $get)
			    {
			    	$column='A';
			    	foreach ($get as $key => $value) 
			    	{
			    		$sheet->setCellValue($column.$row, $value);
			        	$column++;
			    	}
			        
			      	$row++;
			    }

			//Create file excel.xlsx
			$writer = new Xlsx($spreadsheet);
			header('Content-disposition: attachment; filename='.$filename);
			header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			ob_clean();
			flush();
            $writer->save('php://output');
				
		}


	}
?>
