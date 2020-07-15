<?php 
	

	/// this is the model for get all the user related informations and use in the admin side..
	class MABusiness extends CI_Model{


		/// this function use to get all the user related details from the userdetails table..
		public function getBusiness(){
			$data = $this->db->get('businessdetails')->result_array();
			return $data;
		}


		public function getBusinessPerPage($page = 1){
    		$start = ($page-1)*12;

			$data = $this->db->query('SELECT * FROM `businessdetails` LIMIT '.$start.',12')->result_array();
	      	return $data;
	      	// print_r($data);
		}

		public function getTotalBusiness(){
			return count($this->db->get('businessdetails')->result_array());
		}

		public function getTotalOffersOfBusiness($BusinessId){
			$where['BusinessId'] = $BusinessId;
			return count($this->db->where($where)->get('offers')->result_array());
		}


		public function getOffersOfBusinessPerPage($BusinessId, $Page = 1){
			$start = ($Page-1)*3;

			$data = $this->db->query('SELECT * FROM `offers` Where BusinessId='.$BusinessId.' LIMIT '.$start.',12')->result_array();
	      	return $data;
		}

	}
?>