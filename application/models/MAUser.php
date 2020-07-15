<?php 
	

	/// this is the model for get all the user related informations and use in the admin side..
	class MAUser extends CI_Model{


		/// this function use to get all the user related details from the userdetails table..
		public function getUsers(){
			$data = $this->db->get('userdetails')->result_array();
			return $data;
		}


		public function getUsersPerPage($page = 1){
    		$start = ($page-1)*12;

			$data = $this->db->query('SELECT * FROM `userdetails` LIMIT '.$start.',12')->result_array();
	      	return $data;
	      	// print_r($data);
		}

		public function getTotalUsers(){
			return count($this->db->get('userdetails')->result_array());
		}

		public function getReviewerName($UserId){
			return $this->db->query('SELECT * FROM 	`userdetails` WHERE UserId='.$UserId)->result_array();
		}

		public function getNewUsers(){
			date_default_timezone_set('Asia/Kolkata');
			$CurrDate = date("Y-m-d",time());
			return count($this->db->query('SELECT * FROM `userdetails` WHERE JoinDate=\''.$CurrDate.'\'')->result_array());
		}

		public function getAllUsers(){
			return $this->db->get('userdetails')->result_array();
		}
	}
?>