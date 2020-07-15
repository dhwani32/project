<?php
defined('BASEPATH') or exit('No direct script access allowed');


/// this is the visitor controller for all the visitor related tasks......

class Visitor extends CI_Controller
{

	public function __construct(){
			/// call the constructor of parent class (CI_Controller)
			parent::__construct();
			/// load the MCategory model to use in the code...
			$this->load->model('MCategory');

		}

	/// this is the default function called from the url .... 
	/// this function load the visitor page..... 	
	public function index()
	{
		$this->load->view('visitor_view/visitor_home');
	}

	/// this is the function to load the about view... 
	/// this function load the about page from the visitor view..
	public function vc_about()
	{
		$this->load->view('visitor_view/visitor_about');
	}

	/// this is the function to load the contact view...
	/// this function load the contact page from the visitor view...
	public function vc_contact()
	{
		$this->load->view('visitor_view/visitor_contact');
	}


	/// this is the function to load the registration page from the view....
	public function vc_register_page()
	{
		$this->load->library('form_validation');
		$this->load->view('visitor_view/visitor_register');
	}


	/// this is the function to load the login page from the view...
	public function vc_login_page()
	{
		$this->load->library('form_validation');
		$this->load->view('visitor_view/visitor_login');
	}


	/// this is the function for the register the user....
	public function vc_register()
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

			$this->load->model('MVisitor');
			$this->MVisitor->insertUserDetails($userDetails);

			$this->load->view('visitor_view/visitor_login');
		} else {
			$this->load->view('visitor_view/visitor_register');
		}
	}


	/// this is the function for the login user.....
	public function vc_login()
	{


		$this->load->library('form_validation');
		$this->form_validation->set_rules('UserName', 'UserName', 'required|alpha_numeric');
		$this->form_validation->set_rules('UserPassword', 'UserPassword', 'required|min_length[8]|max_length[15]');

		if ($this->form_validation->run()) {

			/// input->post() : is the method use to take the data from the form passed data using post method...
			$userDetails = $this->input->post();

			$this->load->model('MVisitor');
			$userRecord = $this->MVisitor->getUserDetails($userDetails);

			if($userRecord[0]['UserAllow']==1){
				if (count($userRecord) > 0) {

					/// set_userdata is the method to set the session...
					/// set_userdata('sessionName','session Data To Store')
					$this->session->set_userdata('userDetails', $userRecord);
					$this->load->view('user_view/user_home');
				} else {

					/// set_flashdata is the method to store the session for the temporary time....
					/// set_flashdata('temporarySessionName','Temporary Message Or Data')
					$this->session->set_flashdata('errMsg', 'UserId And Password Do Not Match!');
					$this->load->view('visitor_view/visitor_login');
				}
			}else{
				$this->session->set_flashdata('errMsg', 'User has been Disabled by admin!');
				$this->load->view('visitor_view/visitor_login');
			}

			
		} else {
			$this->load->view('visitor_view/visitor_login');
		}
	}



	public function allCategory(){
		$this->load->view('visitor_view/allCategory');
	}


	public function getOffers($CategoryId){
		$where['CategoryId'] = $CategoryId;	
		$offers['allOffers'] = $this->db->where($where)->get('offers')->result_array();
		// print_r($offers);
		$this->load->view('visitor_view/getOffers',$offers);
	}
















}



?>