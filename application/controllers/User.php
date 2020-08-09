<?php


/// this is the controller for the user to manage all the user related functionality....
class User extends CI_Controller{

	/// this is the controller to manage the users...
	public function __construct(){
		/// here, is the call to the parent class's constructor...
		parent:: __construct();
		/// lead the MCategory model to use category related facilities...
		$this->load->model('MCategory');
		/// load the MBusiness model to use business related functions...
		$this->load->model('MBusiness');
		/// load the MOffers model to use the offers in the use page...
		$this->load->model('MOffers');
		/// load the MUser model to use the functionality of the user....
		$this->load->model('MUser');
		/// load the MReview model to use the functionality of the Reviews....
		$this->load->model('MReview');
		//// load the MLocation model to use the location functionality in site...
		$this->load->model('MLocation');
		/// load the MSubscription model to use the Subscription details in site...
		$this->load->model('MSubscription');
		/// load the MSponsor model to use the Spondor details in site....
		$this->load->model('MSponsor');

	}




	public function offerDateExpire(){
		$date = date('Y-m-d');
		$data = $this->db->query('DELETE  FROM `offers` WHERE EndDate <=\''.$date.'\'');
	}

	public function sponsorPlanExpire(){
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		// print_r($date);
		$data = $this->db->query('DELETE  FROM `sponsordetails` WHERE EndDate <=\''.$date.'\'');		
	}

	/// this is the default function called from the url ....
	/// this function load the visitor page.....
	public function index()
	{
		$this->offerDateExpire();
		$this->sponsorPlanExpire();
		$this->load->view('user_view/user_home');
	}



	public function third_party(){
		$this->load->view('user_view/thirdPartyCustom');
	}



	/// this is the function to load the about view...
	/// this function load the about page from the visitor view..
	public function uc_about()
	{
		$this->load->view('user_view/user_about');
	}

	/// this is the function to load the contact view...
	/// this function load the contact page from the visitor view...
	public function uc_contact()
	{
		$this->load->view('user_view/user_contact');
	}


	/// this is the function to load the registration page from the view....
	public function uc_register_page()
	{
		$this->load->library('form_validation');
		$this->load->view('user_view/user_register');
	}


	/// this is the function to load the login page from the view...
	public function uc_login_page()
	{
		$this->load->library('form_validation');
		$this->load->view('user_view/user_login');
	}


	/// this is the function for the register the user....
	public function uc_register()
	{
		/// this is the form validation library of the codeigniter framework...
		/// this library is use to validate the form
		$this->load->library('form_validation');

		/// set_rules is the function of the form_validation library which is use to set the validation rule....

		/// set_rules('field_name','statement to display','validation property');

		$this->form_validation->set_rules('UserName', 'UserName', 'required|alpha_numeric');
		$this->form_validation->set_rules('UserEmail', 'UserEmail', 'required|is_unique[userdetails.UserEmail]|valid_email');
		$this->form_validation->set_rules('UserPhone', 'UserPhone', 'required|exact_length[10]|numeric');
		$this->form_validation->set_rules('UserPassword', 'UserPassword', 'required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('UserConfirmPassword', 'UserConfirmPassword', 'required|matches[UserPassword]');
		$this->form_validation->set_rules('UserGender', 'UserGender', 'required');


		/// run() is the function of the codegnitor's form_validation library to run the validation...
		/// if the validation works then the run function return the true.(all the conditions of the validation are true)
		/// if there are mistakes in the validation then it returns the false. (any of the condition is not valid)
		if ($this->form_validation->run()) {

			/// input->post() : is the method use to take the data from the form passed data using post method...
			$userDetails = $this->input->post();

			$this->MUser->insertUserDetails($userDetails);


			$UserId = $this->db->insert_id();

			$insertLogData['UserId'] = $UserId;
			$insertLogData['Action'] = "User Register";
			$insertLogData['UserActionDate'] = date('Y/m/d');

			$this->db->insert('userlogreport',$insertLogData);


			// $this->load->view('user_view/user_login');
			redirect(base_url('user/referalEarningPage'));
		} else {
			$this->load->view('user_view/user_register');
		}
	}


	public function referalEarningPage(){
		$this->load->view('user_view/user_referalEarningPage');
	}


	public function referAndEarn(){
		$data['referCode'] = $this->input->post();
		// print_r($data);
		$data['userDetails'] = $this->db->query('SELECT * FROM `userdetails` WHERE ReferalCode=\''.$data['referCode']['RaferalCode'].'\'')->result_array();
		// print_r($data['userDetails']);

		$NewReferalPoints = $data['userDetails'][0]['ReferalPoints'] + 10;

		$this->db->where(array('UserId'=>$data['userDetails'][0]['UserId']))->update('userdetails',array('ReferalPoints'=>$NewReferalPoints));

		redirect(base_url('user/uc_login_page'));
	}



	/// this is the function for the login user.....
	public function uc_login()
	{


		$this->load->library('form_validation');
		$this->form_validation->set_rules('UserName', 'UserName', 'required|alpha_numeric');
		$this->form_validation->set_rules('UserPassword', 'UserPassword', 'required|min_length[8]|max_length[15]');

		if ($this->form_validation->run()) {

			/// input->post() : is the method use to take the data from the form passed data using post method...
			$userDetails = $this->input->post();

			$this->load->model('MUser');
			$userRecord = $this->MUser->getUserDetails($userDetails);
			// print_r($userRecord);
			if (count($userRecord) > 0) {
				if($userRecord[0]['UserAllow']==1){

					/// set_userdata is the method to set the session...
					/// set_userdata('sessionName','session Data To Store')
					$this->session->set_userdata('userDetails', $userRecord);

					$insertLogData['UserId'] = $userRecord[0]['UserId'];
					$insertLogData['Action'] = "User Login";
					$insertLogData['UserActionDate'] = date('Y/m/d');

					$this->db->insert('userlogreport',$insertLogData);

					redirect(base_url('user/index'));
				}else{
					$this->session->set_flashdata('errMsg', 'User has been Disabled by admin!');
					$this->load->view('user_view/user_login');
				}

			} else {

					/// set_flashdata is the method to store the session for the temporary time....
					/// set_flashdata('temporarySessionName','Temporary Message Or Data')
					$this->session->set_flashdata('errMsg', 'UserId And Password Do Not Match!');
					$this->load->view('user_view/user_login');
			}


		} else {
			$this->load->view('user_view/user_login');
		}
	}




	public function findSubcategoryfromhome(){
		$data = $this->input->post('categoryId');
		redirect(base_url('findSubcategory/').$data);
	}


	public function findSubcategory($CategoryId){
		$data['result'] = $this->db->query('SELECT * FROM `category` WHERE ParentCategoryId = '.$CategoryId)->result_array();
		// print_r(count($data));
		if(count($data) > 0){
			$this->load->view('user_view/user_subcategory',$data);
		}else{
			$this->getOffers($CategoryId);
		}

	}


	public function allCategory(){
		$this->load->view('user_view/allCategory');
	}

	public function getOffers($CategoryId,$page=1){

			$this->load->library('pagination');
			$config['per_page'] = 3;
			$config['base_url'] = base_url('getOffers/').$CategoryId;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = true;
			$config['attributes'] = array('class' =>'btn');
			$config['num_rows'] = 2;
			$config['cur_tag_open'] = '<span class="btn btn-dark">';
			$config['cur_tag_close'] = '</span>';
			// $config['first_link'] = 'First';
			// $config['last_link'] = 'Last';
			// $config['first_tag_open'] = '<span class="btn btn-dark">';
			// $config['first_tag_close'] = '</span>';
			// $config['last_tag_open'] = '<sapn class="btn btn-dark">';
			// $config['last_tag_close'] = '</span>';
			// $config['next_tag_open'] = '<span class="btn btn-dark">';
			// $config['next_tag_close'] = '</span">';
			// $config['prev_tag_open'] = '<span class="btn btn-purple">';
			// $config['prev_tag_close'] = '</span">';
			// $config['num_tag_open'] = '<span class="btn-dark">';
			// $config['num_tag_close'] = '</span">';



			$config['total_rows']=$this->MOffers->getTotalOffers($CategoryId);
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['allOffers'] = $this->MOffers->getOffersPerPage($CategoryId,$page);
			// print_r($data['users']);
			$this->load->view('user_view/getOffers',$data);

	}







	/// The function for user logout ...
    public function uc_logout(){

        $insertLogData['UserId'] = $_SESSION['userDetails'][0]['UserId'];
		$insertLogData['Action'] = "User Logout";
		$insertLogData['UserActionDate'] = date('Y/m/d');

		$this->db->insert('userlogreport',$insertLogData);

        $this->session->unset_userdata('userDetails');

        redirect(base_url('uc_login_page'));
    }




    public function addOffers(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
    	$where['UserId'] = $UserId;
    	$userDetails = $this->db->where($where)->get('userDetails')->result_array();

    	// print_r($userDetails);

    	if($userDetails[0]['UserType'] != 1){
    		redirect(base_url('business/businessRegisterPage/').$userDetails[0]['UserId']);
    	}else{
    		redirect(base_url('business/businessHome'));
    	}

    }

    public function userProfile(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
			$where['UserId'] = $UserId;
    	$userDetail['userDetails'] = $this->db->where($where)->get('userDetails')->result_array();
    	$this->load->view('user_view/user_Profile',$userDetail);
    }


    public function giveReview(){
    	$data = $this->input->post();

    	$UserId = $data['UserId'];
    	$OfferId = $data['OfferId'];
    	$Review = $data['OfferReview'];

    	$where['UserId'] = $data['UserId'];
    	$where['OfferId'] = $data['OfferId'];


    	$data['Review'] = $this->db->where($where)->get('review')->result_array();

    	if(count($data['Review']) == 0){
    		$insert['OfferId'] = $OfferId;
			$insert['UserId'] = $UserId;
			$insert['Stars'] = 0;
			$insert['Review'] = $Review;
			$this->db->insert('review',$insert);
    		$offerDetails = $this->db->query('select CategoryId from offers where OfferId = '.$OfferId)->result_array();
    		$this->getOffers($offerDetails[0]['CategoryId']);

    	}else{
    		if($data['Review'][0]['Review'] == ""){
    			$where['UserId'] = $UserId;
    			$where['OfferId'] = $OfferId;
    			$update['Review'] = $Review;
    			$this->db->where($where)->update('review',$update);
    			$offerDetails = $this->db->query('select CategoryId from offers where OfferId = '.$OfferId)->result_array();
    			$this->getOffers($offerDetails[0]['CategoryId']);

    		}else{
    			$offerDetails = $this->db->query('select CategoryId from offers where OfferId = '.$OfferId)->result_array();
    			// $this->session->set_flashdata('reviewMsg',"review already given");
    			$this->getOffers($offerDetails[0]['CategoryId']);
    			// print_r($CategoryId);
    		}
    	}


    }

    public function checkStars($OfferId,$UserId,$Stars){

    	$where['UserId'] = $UserId;
		$where['OfferId'] = $OfferId;

		$data = $this->db->where($where)->get('review')->result_array();


		if(count($data) == 0){
			$insert['OfferId'] = $OfferId;
			$insert['UserId'] = $UserId;
			$insert['Stars'] = 1;
			$insert['Review'] = "";
			$this->db->insert('review',$insert);
			echo 0;
		}else{
			if($data[0]['Stars'] == 1){
				$update['OfferId'] = $OfferId;
				$update['UserId'] = $UserId;
				$update['Stars'] = 0;
				// $update['Review'] = "";
				$where['ReviewId'] = $data[0]['ReviewId'];
				// print_r($data);
				$this->db->where($where)->update('review',$update);
				echo 1;
			}else{
				$update['OfferId'] = $OfferId;
				$update['UserId'] = $UserId;
				$update['Stars'] = 1;
				// $update['Review'] = "";
				$where['ReviewId'] = $data[0]['ReviewId'];
				// print_r($data);
				$this->db->where($where)->update('review',$update);
				echo 0;
			}
		}


    }


    public function addToFavorite($OfferId){


			$UserId = $_SESSION['userDetails'][0]['UserId'];

    	$where['OfferId'] = $OfferId;
    	$where['UserId'] = $UserId;
    	$favoriteData = $this->db->where($where)->get('wishlist')->result_array();


    	if(count($favoriteData) > 0){
    		redirect(base_url('favoritePage/'));
    	}else{
	    	$insert['OfferId'] = $OfferId;
	    	$insert['UserId'] = $UserId;
	    	$this->db->insert('wishlist',$insert);
    		// redirect(base_url('favoritePage/'));

	    	$insertLogData['UserId'] = $UserId;
			$insertLogData['Action'] = "Add offer in favorite list";
			$insertLogData['UserActionDate'] = date('Y/m/d');

			$this->db->insert('userlogreport',$insertLogData);

    		$offerDetails = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
	    	$this->getOffers($offerDetails[0]['CategoryId']);
    		redirect(base_url('favoritePage/'));
	    	
    	}

    }

    public function removeFavorite($OfferId,$UserId){
    	$where['OfferId'] = $OfferId;

    	$this->db->where($where)->delete('wishlist');


    	$insertLogData['UserId'] = $UserId;
		$insertLogData['Action'] = "Remove offer from favorite list";
		$insertLogData['UserActionDate'] = date('Y/m/d');

		$this->db->insert('userlogreport',$insertLogData);


    	redirect(base_url('favoritePage/'));

    }

    public function favoritePage(){
			$UserId = $_SESSION['userDetails'][0]['UserId'];
    	$where['UserId'] = $UserId;
    	$offers['myFavoriteOffers'] = $this->db->where($where)->get('wishlist')->result_array();
    	// print_r($offers['myFavoriteOffers']);
    	$this->load->view('user_view/user_favorites',$offers);
    }


    public function addToCart($OfferId){

    	$where['OfferId'] = $OfferId;
    	$data = $this->db->where($where)->get('offers')->result_array();

    	echo count($data);
    	print_r($data);

		if(count($data) > 0){
			// $this->load->library('cart');
    		// print_r($data);
	    	$insert['id'] = $data[0]['OfferId'];
	    	$insert['qty'] = 1;
	    	$insert['price'] = $data[0]['OfferPrice'];
	    	$insert['name'] = $data[0]['OfferName'];
    		$id=$this->cart->insert($insert);
    		print_r($id);
		}
   		// $cat['item']=$this->cart->contents();
		// print_r($cat);
		// print_r($id);

    	redirect(base_url('cart'));
    }


    public function cart(){
   		// $this->load->library('cart');
   		$data['cart'] = $this->cart->contents();
   		// var_dump($data);
   		$this->load->view('user_view/user_cart',$data);
    }

    public function ForgetPassword(){
    	$this->load->view('user_view/user_forgotPassword');
    }

    public function sendForgotPasswordLink(){
    	$data = $this->input->post();
    	// print_r($data);


    	$where['UserEmail'] = $data['email'];

    	// print_r($this->db->where($where)->get('userdetails')->result_array());
    	$data = $this->db->where($where)->get('userdetails')->result_array();
    	if(count($data) > 0){

    		$salt = $this->raferalCodeGenerator();

    		$sendTo = $data[0]['UserEmail'];
    		$subject = "reset password Link";
    		$Msg = "<br>Salt :  <b> ".$salt."</b> is your Confirmation Salt Password. <br> Please remember this.<br>
    		<a href=".base_url('setNewPassword/').$salt." > click to reset your password </a>";

    		// echo $Msg;


			$this->sendEmail($sendTo,$subject,$Msg);

		}else{
			$this->session->set_flashdata('accNotCreatedErr','You Don\'t have an account with this Eamil.');
			// echo '<script type="text/javascript">
   //        		window.alert("You Do not Have Any account with this email. \nPlease Make an account.");
			// </script>';
		}

		redirect(base_url('uc_login_page'));


    }


    public function raferalCodeGenerator(){

        ///str_shuffle is the function to shuffle the string ...
        function random_strings($length_of_string)
        {
              $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
              return substr(str_shuffle($str_result), 0, $length_of_string);
        }
        return random_strings(3).random_strings(2).random_strings(1);
    }


	    public function setNewPassword($confirmSalt){
    	$data['confirmSalt'] = $confirmSalt;


    	if(isset($_POST['changePassword'])){
    		$userData = $this->input->post();
			// print_r($data);

    		$where['UserEmail'] = $userData['Email'];
    		$userDetails = $this->db->where($where)->get('userdetails')->result_array();

			if(count($userDetails) > 0){
				// print_r($userDetails);
				// print_r($userData);
				// print_r($data);

				if($userData['confirmSalt'] == $data['confirmSalt']){
					// echo "salt match";


					if($userData['NewPassword'] == $userData['ConfirmPassword']){


						if(strlen($userData['NewPassword']) > 8 && strlen($userData['NewPassword']) < 15 ){

							$whereUpdate['UserId'] = $userDetails[0]['UserId'];
							$update['UserPassword'] = md5($userData['NewPassword']);

							if($this->db->where($whereUpdate)->update('userdetails',$update)){
								redirect(base_url('uc_login_page'));
							}

						}else{
							$this->session->set_flashdata('passValErr','Password must need to be greater than 8 and less than 15');
							$this->load->view('user_view/user_setNewPassword',$data);
						}



					}else{
						$this->session->set_flashdata('passErr','Password does not match, Enter proper password');
						$this->load->view('user_view/user_setNewPassword',$data);
					}



				}else{
					$this->session->set_flashdata('saltErr','Salt not match, Re-enter the propper salt');
					$this->load->view('user_view/user_setNewPassword',$data);
				}


			}else{
				$this->session->set_flashdata('emailErr','Email is not found, Please confirm your email');
				$this->load->view('user_view/user_setNewPassword',$data);
			}
    	}else{
    		$this->load->view('user_view/user_setNewPassword',$data);
    	}

    }


	public function getCoupon($OfferId){

		$UserId = $_SESSION['userDetails'][0]['UserId'];


			// echo $OfferId." ".$UserId;

			redirect(base_url('user/selectPaymentMethod/'.$OfferId."/".$UserId));
			// redirect(base_url('user/payUmoney_form/'.$OfferId."/".$UserId));

	}

	public function selectPaymentMethod($OfferId, $UserId){

		$data['OfferId'] = $OfferId;
		$data['UserId'] = $UserId;
		// print_r($data);
		$this->load->view('user_view/user_selectPaymentMethod',$data);
	}

	public function makePayment($paymentType, $OfferId, $UserId){

			if($paymentType == 1 ){
				redirect(base_url('user/payByWallet/'.$OfferId."/".$UserId));
			}

			if($paymentType == 2 ){
				redirect(base_url('user/payUmoney_form/'.$OfferId."/".$UserId));
			}

			if($paymentType == 3){
				redirect(base_url('user/COD_form/'.$OfferId."/".$UserId));
			}

	}

	public function payByWallet($OfferId, $UserId){

		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
		// print_r($data['offerdetails']);
		// echo "<br>";
		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId='.$data['offerdetails'][0]['BusinessId'])->result_array();
		// print_r($data['businessdetails']);
		// echo "<br>";

		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();
		// print_r($data['userdetails']);


		$this->load->view('user_view/PaymentUsingWallet',$data);

	}

	public function COD_form($OfferId, $UserId){
		
		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
		// print_r($data['offerdetails']);
		// echo "<br>";
		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId='.$data['offerdetails'][0]['BusinessId'])->result_array();
		// print_r($data['businessdetails']);
		// echo "<br>";

		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();
		// print_r($data['userdetails']);


		$this->load->view('user_view/Payment_COD',$data);

	}







	// public function TxnTest($OfferId, $UserId){

	// 		$data['OfferId'] = $OfferId;
	// 		$data['UserId'] = $UserId;

	// 		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
	// 		// print_r($data['offerdetails']);
	// 		// echo "<br>";
	// 		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId='.$data['offerdetails'][0]['BusinessId'])->result_array();
	// 		// print_r($data['businessdetails']);
	// 		// echo "<br>";

	// 		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();
	// 		// print_r($data['userdetails']);

	// 		$this->load->view('user_view/paytmGatway/TxnTest',$data);

	// }

	// public function paytmResponse(){


	// 	$data['OfferId'] = $_SESSION['OrderOfferId'];
	// 	$data['UserId'] = $_SESSION['OrderUserId'];
	// 	$data['BusinessId'] = $_SESSION['OrderBusinessId'];

	// 	$data['Post'] = $this->input->post();

	// 	// print_r($_SESSION['OrderOfferId']);
	// 	// print_r($_SESSION['OrderUserId']);
	// 	// print_r($_SESSION['OrderBusinessId']);
	// 	// echo $_COOKIE['OrderUserId'];
	// 	// $this->load->view('user_view/paytmGatway/pgResponse');
	// 	redirect(base_url('user/payment_successPaytm/').$data);
	// }


	// public function payment_successPaytm($data){
	// 	print_r($data);
	// }

	// public function paytm_form($OfferId, $UserId){

	// 		$data['post'] = $this->input->post();

	// 		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
	// 		// print_r($data['offerdetails']);
	// 		// echo "<br>";
	// 		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId='.$data['offerdetails'][0]['BusinessId'])->result_array();
	// 		// print_r($data['businessdetails']);
	// 		// echo "<br>";

	// 		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();
	// 		// print_r($data['userdetails']);

	// 		$this->load->view('user_view/paytmGatway/pgRedirect',$data);


	// }


	public function payUmoney_form($OfferId, $UserId){


			$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();
			// print_r($data['offerdetails']);
			// echo "<br>";
			$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId='.$data['offerdetails'][0]['BusinessId'])->result_array();
			// print_r($data['businessdetails']);
			// echo "<br>";

			$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$UserId)->result_array();
			// print_r($data['userdetails']);


			$this->load->view('user_view/PayUMoney_formUser',$data);


			// redirect(base_url('user/payment_success'));


	}


	public function payment_success($BusinessId, $UserId, $OfferId){
		$data['successData'] = $this->input->post();


		/// here, we generate the redeem code to redeem offer...
		$data['redeemCode']= $this->generateRedeemCode();
		// echo "Redeem Code : ".$redeemCode;


		/// take data of business from the database for the business details...
		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId = '.$BusinessId)->result_array();
		// print_r($BusinessId);


		///take teh data from the userdetails table to use in this function...
		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId ='.$UserId)->result_array();



		/// take data from the package table to use the packages related details in the page..
		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$OfferId)->result_array();

		// print_r($data['packagedetails']);


		// print_r($data);

		if($data['successData']['mode'] == 'COD'){
			$insert['OfferOrderPayment'] = "UnPayed";

		}else{
			$walletWhere['BusinessId'] = $BusinessId;
			$walletUpdate['BusinessWallate'] = $data['businessdetails'][0]['BusinessWallate'] + $data['successData']['amount'] ;

			$this->db->where($walletWhere)->update('businessdetails', $walletUpdate);
		}

		$insert['UserId'] = $UserId;
		$insert['TransectionId'] = $data['successData']['txnid'];
		$insert['OrderDate'] = $data['successData']['addedon'];
		$insert['OrderMethod'] = $data['successData']['mode'];
		$insert['OrderAmount'] = $data['successData']['amount'];
		$insert['BusinessId'] = $BusinessId;
		$insert['OfferId'] = $OfferId;
		$insert['OfferRedeemCode'] = $data['redeemCode'];


		$this->db->insert('orders',$insert);

		$OrderId = $this->db->insert_id();




		$insertLogData['UserId'] = $UserId;
		$insertLogData['Action'] = "Purchase Offer";
		$insertLogData['UserActionDate'] = date('Y/m/d');

		$this->db->insert('userlogreport',$insertLogData);


		$this->db->query('DELETE FROM `wishlist` WHERE UserId='.$UserId.' AND OfferId='.$OfferId);



		$Mobile = $data['userdetails'][0]['UserPhone'];
			$MassageSMS = "Test Msg";

			$this->sendSMS($Mobile, $MassageSMS);



		$MassageEmail = "
			<h5> Dear Customer ".$data['userdetails'][0]['UserName'].". </h5>

			<p>you have been purchased the offer <b>".$data['offerdetails'][0]['OfferName']."</b> of total amount of <b>
			".$data['offerdetails'][0]['OfferPrice']."</b> .
			<br>
			Transaction has been successfully processed.
			<br>
			Your transactionId is : <b>".$data['successData']['txnid']."</b>.
			<br>Your Offer Redeem Code is : <span style=\"font-size:20px;color:red;\">".$data['redeemCode']."</span>
			<br> Thank you for showing interest.

			</p>

			";



			$sendTo = $data['userdetails'][0]['UserEmail'];


			$subject = "Offer Purchased";



			$this->sendEmail($sendTo, $subject, $MassageEmail);




		// $this->load->view('user_view/user_paymentSuccess',$data);
			redirect(base_url('userInvoice/'.$OrderId));


	}



	public function userInvoice($OrderId){


		$data['orderDetails'] = $this->db->query('select * from `orders` where OrderId ='.$OrderId)->result_array();
		$data['userdetails'] = $this->db->query('select * from `userdetails` where UserId = '.$data['orderDetails'][0]['UserId'])->result_array();
 		$data['businessdetails'] = $this->db->query('select * from `businessdetails` where BusinessId = '.$data['orderDetails'][0]['BusinessId'])->result_array();
		$data['successData']['addedon'] = $data['orderDetails'][0]['OrderDate'];
		$data['offerdetails'] = $this->db->query('select * from `offers` where OfferId = '.$data['orderDetails'][0]['OfferId'])->result_array(); 



		// print_r($data);
		$this->load->view('user_view/user_paymentSuccess',$data);		
	}



	public function payment_fail(){

	}


	public function generateRedeemCode(){
		function randomString($StrLength){
		$str = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			return substr(str_shuffle($str),0,$StrLength);
		}
		return randomString(3).randomString(2).randomString(2);
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


	public function sociallogin()
	{

		$data=$this->input->post();
		// $data['email'];
		$result=$this->db->where(array('UserEmail'=>$data['UserEmail']))->get('userdetails')->result_array();
		if(count($result)>0)
		{
			$_SESSION['userDetails']=$result;

		}
		else
		{
			$user['UserName']=$data['UserName'];
			$user['UserEmail']=$data['UserEmail'];
			$this->db->insert('userdetails',$user);
			$uid=$this->db->insert_id();
			$result=$this->db->where(array('uid'=>$uid))->get('userdetails')->result_array();
			$_SESSION['userDetails']=$result;
		}
		redirect(base_url());

	}


	public function socialloginOnm()
	{

		$data=$this->input->post();
		// $data['email'];
		$result=$this->db->where(array('UserEmail'=>$data['UserEmail']))->get('userdetails')->result_array();
		if(count($result)>0)
		{
			$_SESSION['userDetails']=$result;

		}
		else
		{
			$user['UserName']=$data['UserName'];
			$user['UserEmail']=$data['UserEmail'];
			$this->db->insert('userdetails',$user);
			$uid=$this->db->insert_id();
			$result=$this->db->where(array('uid'=>$uid))->get('userdetails')->result_array();
			$_SESSION['userDetails']=$result;
		}
		// redirect(base_url());

	}



	public function userLogPage(){
		$userId = $_SESSION['userDetails'][0]['UserId'];
		$data['userLogReport'] = $this->db->query('SELECT * FROM `userlogreport` WHERE UserId='.$userId.' ORDER BY UserActionDate DESC')->result_array();
		$this->load->view('user_view/user_userLogReport',$data);
	}



	public function changeUserProfileImage(){
		$data['userProfile'] = $this->input->post();
		$data['userDetails'] = $this->db->query('SELECT * FROM `userdetails` WHERE UserId='.$data['userProfile']['UserId'])->result_array();
		print_r($data);
		$userProfileImageName = $data['userDetails'][0]['UserImage'];

		$config['upload_path'] = 'assets/assets_user_images/';
		$config['allowed_types'] = 'jpg|jpeg|png|jfif';

		$this->load->library('upload',$config);

		$fileName = 'assets/assets_user_images/'.$userProfileImageName;

		if($userProfileImageName != 'defaultforWomen.png' || $userProfileImageName != 'defaultforMen.png'){
			$delete = unlink($fileName);
		}

		if($this->upload->do_upload('UserProfileImage')){
			$imageData = $this->upload->data();

			$update['UserImage'] = $imageData['file_name'];

			$this->db->where(array('UserId'=>$data['userProfile']['UserId']))->update('userdetails',$update);

			redirect(base_url('user/userProfile/').$data['userProfile']['UserId']);


		}else{
			$error = array('error' => $this->upload->display_errors());
			redirect(base_url('user/userProfile/').$data['userProfile']['UserId']);

		}

	}



	public function changeUserProfileDetails(){
		$data['userProfile'] = $this->input->post();
		$data['userDetails'] = $this->db->query('SELECT * FROM `userdetails` WHERE UserId='.$data['userProfile']['UserId'])->result_array();


		print_r($data);

		if(($data['userProfile']['UserName']) == ""){
			$data['userProfile']['UserName'] = $data['userDetails'][0]['UserName'];
		}

		if(($data['userProfile']['UserAddress'])  == ""){
			$data['userProfile']['UserAddress'] = $data['userDetails'][0]['UserAddress'];
		}

		if(($data['userProfile']['UserPhone'])  == ""){
			$data['userProfile']['UserPhone'] = $data['userDetails'][0]['UserPhone'];
		}

		// print_r($data);


		$updateProfile['UserName'] = $data['userProfile']['UserName'];
		$updateProfile['UserPhone'] = $data['userProfile']['UserPhone'];
		$updateProfile['UserAddress'] = $data['userProfile']['UserAddress'];





		$this->db->where(array('UserId'=>$data['userProfile']['UserId']))->update('userdetails',$updateProfile);


			redirect(base_url('user/userProfile/').$data['userProfile']['UserId']);


	}



	public function msgFromBusinessPage(){
		$UserId = $_SESSION['userDetails'][0]['UserId'];

		$data['msgFromBusiness'] = $this->db->query('SELECT * FROM `chat` WHERE ReceiverId='.$UserId)->result_array();
		// print_r($data);
		$this->load->view('user_view/user_msgFromBusiness', $data);
	}

	public function getOffersDetails($OfferId){
		if(!isset($_SESSION['userDetails'])){
			redirect(base_url());
		}
		$data['OfferDetails'] = $this->db->query('SELECT * FROM `offers` WHERE OfferId='.$OfferId)->result_array();
		$data['BusinessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE BusinessId='.$data['OfferDetails'][0]['BusinessId'])->result_array();
		$data['ReviewStars'] = $this->MReview->countStars($OfferId);
		$data['Review'] = $this->MReview->countReview($OfferId);
		$data['area'] = $this->db->query('SELECT * FROM `area` WHERE AreaId='.$data['BusinessDetails'][0]['AreaId'])->result_array();
		$data['images'] = $this->db->query('SELECT * FROM `images` WHERE OfferId='.$OfferId)->result_array();
		$data['Rating'] = $this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId)->result_array();
		$data['RatingByUser'] = $this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();
		$data['purchase'] = $this->db->query('SELECT * FROM `orders` WHERE OfferId='.$OfferId)->result_array();


		$data['Rating1'] = count($this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND Rating = 1')->result_array());
		$data['Rating2'] = count($this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND Rating = 2')->result_array());
		$data['Rating3'] = count($this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND Rating = 3')->result_array());
		$data['Rating4'] = count($this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND Rating = 4')->result_array());
		$data['Rating5'] = count($this->db->query('SELECT * FROM `ratingstar` WHERE OfferId='.$OfferId.' AND Rating = 5')->result_array());


		$data['Comments'] = $this->db->query('SELECT * FROM `offercomments` WHERE OfferId='.$OfferId)->result_array();


 	// 	echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		if(count($data['Rating']) > 0){


		$data['Rating1Or'] = $data['Rating1'] * 100 / count($data['Rating']);
		$data['Rating2Or'] = $data['Rating2'] * 100 / count($data['Rating']);
		$data['Rating3Or'] = $data['Rating3'] * 100 / count($data['Rating']);
		$data['Rating4Or'] = $data['Rating4'] * 100 / count($data['Rating']);
		$data['Rating5Or'] = $data['Rating5'] * 100 / count($data['Rating']);
			$count = 0;
			foreach ($data['Rating'] as $r) {
				$count = $count + $r['Rating'];
			}
			// echo $count;
			$data['average'] = $count / count($data['Rating']);
			// echo $average;
		}

		$this->load->view('user_view/user_offersDetails',$data);
	}


	public function userRatingStars($UserId, $OfferId, $data){

		$insert['UserId'] = $UserId;
		$insert['OfferId'] = $OfferId;
		$insert['Rating'] = $data;

		$this->db->insert('ratingstar',$insert);
		echo $OfferId;
		// redirect(base_url('user/getOffersDetails/').$OfferId);
	}



	public function sendInquiryToBusiness(){
		$data['msg'] = $this->input->post();
			/// here, we can set the timezone so we can get exact curent time..
		date_default_timezone_set('Asia/Kolkata');
		$date['time'] = date('H:i:s',time());
		$date['date'] = date('Y-m-d',time());
		// $datetime = date('Y-m-d H:i:s', time());
		// print_r($date);
		// print_r($data);

		$insertMsg['SenderId'] = $_SESSION['userDetails'][0]['UserId'];
		$insertMsg['ReceiverBusinessId'] = $data['msg']['BusinessId'];
		$insertMsg['ChatDate'] = $date['date'];
		$insertMsg['ChatTime'] = $date['time'];
		// $insertMsg['time'] = $datetime;
		$insertMsg['Message'] = $data['msg']['Message'];

		$this->db->insert('chat', $insertMsg);

		redirect(base_url('user/getOffersDetails/').$data['msg']['OfferId']);
	}


	public function addComment(){
		$data = $this->input->post();

		date_default_timezone_set('Asia/Kolkata');
		$data['time'] = date('H:i:s',time());
		$data['date'] = date('Y-m-d',time());

		print_r($data);

		$insert['UserId'] = $data['UserId'];
		$insert['OfferId'] = $data['OfferId'];
		$insert['Date'] = $data['date'];
		$insert['Time'] = $data['time'];
		$insert['Comment'] = $data['OfferComment'];

		$this->db->insert('offercomments',$insert);

		redirect(base_url('user/getOffersDetails/').$data['OfferId']);
	}



	public function sendMsgToAdminFromUser(){
		$data = $this->input->post();
		// print_r($data);

		$insertInquiry['FirstName'] = $data['fname'];
		$insertInquiry['LastName'] = $data['lname'];
		$insertInquiry['Email'] = $data['email'];
		$insertInquiry['Subject'] = $data['subject'];
		$insertInquiry['Message'] = $data['message'];

		$this->db->insert('userinquiry', $insertInquiry);

		$this->load->view('user_view/user_contact');
	}


	public function offerProvidersDetails(){
		$data['offerProvidersDetails'] = $this->db->query('SELECT * FROM `businessdetails`')->result_array();
		// print_r($data);
		$this->load->view('user_view/user_offerProvidersSubscrib', $data);
	}

	public function subscribeBusiness($BusinessId){
		$UserId = $_SESSION['userDetails'][0]['UserId'];
		$insertSubsciber['UserId'] = $UserId;
		$insertSubsciber['BusinessId'] = $BusinessId;
		$this->db->insert('subscriptiondetails',$insertSubsciber);
		redirect(base_url('user/offerProvidersDetails'));
	}

	public function SubscriptionsDetails(){
		$data['subscriptionDetails'] = $this->db->query('SELECT * FROM `subscriptiondetails` WHERE UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();
		// $counter = 0;
		// foreach ($data['subscriptionDetails'] as $sd) {
		// 	$data['businessDetails'][$counter] = $this->db->query('SELECT * FROM `businessDetails` WHERE BusinessId='.$sd['BusinessId'])->result_array();
		// 	$counter++;
		// }
		// print_r($data);
		$this->load->view('user_view/user_subscriptionDetails', $data);

	}


	public function unSubscribeBusiness1($BusinessId){
		$UserId = $_SESSION['userDetails'][0]['UserId'];
		$this->db->query('DELETE FROM `subscriptiondetails` WHERE UserId='.$UserId.' AND BusinessId='.$BusinessId);
		redirect(base_url('user/SubscriptionsDetails'));
	}

	public function unSubscribeBusiness2($BusinessId){
		$UserId = $_SESSION['userDetails'][0]['UserId'];
		$this->db->query('DELETE FROM `subscriptiondetails` WHERE UserId='.$UserId.' AND BusinessId='.$BusinessId);
		redirect(base_url('user/offerProvidersDetails'));
	}


	public function subscribedOffersNotifications(){

		$data['subscribedBusiness'] = $this->db->query('SELECT * FROM `subscriptiondetails` WHERE UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();

		// print_r($data);

		$this->load->view('user_view/user_subscribedOfferNotifications', $data);
	}


	public function allOffersOfBusiness($BusinessId){


			$data['businessDetails'] = $this->db->query('SELECT * FROM `businessDetails` WHERE BusinessId='.$BusinessId)->result_array();
			$data['offers'] = $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$BusinessId)->result_array();
			// print_r($data);

			$this->load->view('user_view/user_allOffersOfBusiness', $data);
	}


	public function deleteUserLog(){
		$UserId = $_SESSION['userDetails'][0]['UserId'];
		$this->db->query('delete from `userlogreport` where UserId='.$UserId);
		redirect(base_url('user/userLogPage/'));
	}

	public function getOffersAreawise($CategoryId,$AreaId,$userState){

		$state = 1;

		$data = $this->MOffers->getOffersPerPageOfArea($CategoryId, $AreaId);
			if(!empty($data)){
				foreach ($data as $d) {
					if(!empty($d)){
						foreach ($d as $o) {
							$state = 0;
							$OfferId = $o['OfferId'];
							$likes = $this->MReview->countStars($OfferId);
			              	$review = $this->MReview->countReview($OfferId);

			              	$businessDetails = $this->db->query('SELECT * FROM `businessdetails` , `offers`  where offers.OfferId = '.$OfferId.' AND businessdetails.BusinessId='.$o['BusinessId'])->result_array();

				            // print_r($businessDetails);
				            $Location = $this->MLocation->getLocation($businessDetails[0]['AreaId']);

			            	$image = $this->db->query('select * from `images` where OfferId='.$OfferId.' group by OfferId')->result_array();


			            	if($userState == 1){

								echo "<div class=\"d-block d-md-flex listing-horizontal\"> <a href=\"".base_url('user/uc_login_page')."\" class=\"img d-block\" style=\"background-image: url('".base_url('assets/assets_offers_images/').$image[0]['Image']."')\"> <span class=\"category\"> ".$o['OfferName']." </span> </a> <div class=\"lh-content\"> <h3><a href=\"".base_url('user/getOffersDetails/').$o['OfferId']."\"> ".$o['OfferDescription']." </a></h3> <p> ".$Location['AreaDetails'][0]['AreaName'].", ".$Location['CityDetails'][0]['CityName'].", ".$Location['StateDetails'][0]['StateName'].", ".$Location['CountryDetails'][0]['CountryName']."</p> <p> Price : ".$o['OfferPrice']." Rs/- </p> <span>( ".$review." Reviews, ".$likes." likes )</span> <div class=\"col-12\"> <a href=\"".base_url('user/uc_login_page')."\" class=\"float-right pl-4 pr-4  btn btn-pink\" aria-label=\"View 3 items in your shopping cart\"> Add + </a></div></div></div>";
							}else{
								echo "<div class=\"d-block d-md-flex listing-horizontal\"> <a href=\"".base_url('user/uc_login_page')."\" class=\"img d-block\" style=\"background-image: url('".base_url('assets/assets_offers_images/').$image[0]['Image']."')\"> <span class=\"category\"> ".$o['OfferName']." </span> </a> <div class=\"lh-content\"> <h3><a href=\"".base_url('user/uc_login_page/')."\"> ".$o['OfferDescription']." </a></h3> <p> ".$Location['AreaDetails'][0]['AreaName'].", ".$Location['CityDetails'][0]['CityName'].", ".$Location['StateDetails'][0]['StateName'].", ".$Location['CountryDetails'][0]['CountryName']."</p> <p> Price : ".$o['OfferPrice']." Rs/- </p> <span>( ".$review." Reviews, ".$likes." likes )</span> <div class=\"col-12\"> <a href=\"".base_url('user/uc_login_page')."\" class=\"float-right pl-4 pr-4  btn btn-pink\" aria-label=\"View 3 items in your shopping cart\"> Add + </a></div></div></div>";
							}
						}
					}
				}
			}else{
				echo "<div class=\"text-center text text-danger\"> Offers Not Found.. </div> ";
			}


			if($state != 0){
				echo "<div class=\"text-center h3 text text-danger\"> Offers Not Found.. </div> ";
			}

	}




	public function userOrdersPage(){

		$UserId	= $_SESSION['userDetails'][0]['UserId'];
		$data['orders'] = $this->db->query('SELECT * FROM `orders` WHERE UserId='.$UserId)->result_array();


		$this->load->view('user_view/user_ordersPage', $data);

	}



	public function removeComment($UserId, $OfferId, $OfferCommentId){
		$this->db->query('delete from `offercomments` where UserId = '.$UserId.' AND OfferId = '.$OfferId.' AND OfferCommentId='.$OfferCommentId);
		redirect(base_url('user/getOffersDetails/').$OfferId);
	}


	/// check for every words matching in the database and search...
	public function voice_search_data($searchKey){
		
		$keywords = explode('%20',$searchKey);
		
		$searchKey2 = implode(' ', $keywords);
		
		$totalOffers = array();
		foreach ($keywords as $search) {
			$offers = $this->db->query('SELECT * FROM `offers` WHERE OfferName LIKE \'%'.$search.'%\' OR OfferDescription LIKE \'%'.$search.'%\'')->result_array();	
			if(count($offers)>0){
				foreach ($offers as $o) {
					array_push($totalOffers, $o);								
				}				
			}
		}
		$data['searchKey'] = $searchKey2;
		$data['offers'] = $totalOffers;

		$this->load->view('user_view/user_voice_search', $data);

	}


	/// very simple search of all search keyword... 
	public function voice_search_data2($search){
		$offers = $this->db->query('SELECT * FROM `offers` WHERE OfferName LIKE \'%'.$search.'%\' OR OfferDescription LIKE \'%'.$search.'%\'')->result_array();	
		
	}
































}

?>
