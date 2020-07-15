<?php 
	class Payment extends CI_Controller{
		public function paymentWallet(){
			date_default_timezone_set('Asia/Kolkata');
			$data['post'] = $this->input->post();
			$data['addedon'] = date("Y-m-d", time());
			$data['mode'] = "wallet";
			
 
			$userDetails = $this->db->query('select * from `userdetails` where UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();

			$updatePoints['ReferalPoints'] = $userDetails[0]['ReferalPoints'] - $data['post']['amount'];
			$whereUser['UserId'] = $userDetails[0]['UserId'];

			$this->db->where($whereUser)->update('userdetails',$updatePoints);

			$this->load->view('user_view/paymentWallet/user_paymentWallet', $data);
		}



		public function paymentCOD(){
			date_default_timezone_set('Asia/Kolkata');
			$data['post'] = $this->input->post();
			$data['addedon'] = date("Y-m-d", time());
			$data['mode'] = "COD";
			
 
			$userDetails = $this->db->query('select * from `userdetails` where UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();
			
			$this->load->view('user_view/paymentWallet/user_paymentWallet', $data);
		}
	}
?>