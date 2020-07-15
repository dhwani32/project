<?php 

	/// this is the model for the admin facility...
	class MAdmin extends CI_Model{

		/// this is the function get admin's details from the database...
		public function login($AdminName, $AdminPassword){

			

			$data = $this->db->query('select * from `admindetails` where AdminName = \''. $AdminName .'\' AND  AdminPassword = \''. $AdminPassword.'\'')->result_array();
			if(count($data) <= 0 ){
				$data = $this->db->query('select * from `admindetails` where AdminName = \''. $AdminName .'\' AND  AdminPassword = \''. md5($AdminPassword).'\'')->result_array();
			}
			return $data;
		}

		
		public function paymentRequestNotification(){
			$data['businesstransactiondetails'] = $this->db->query('select * from `businesstransactiondetails` Where RequestStatus = \'Requested\'')->result_array();
   			return count($data['businesstransactiondetails']);

		}
























	}
?>