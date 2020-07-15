<?php 
	
	class MOrders extends CI_Model{

		public function getRecentOrders(){
			return $this->db->query('SELECT * FROM `orders` ORDER BY OrderId DESC LIMIT 10')->result_array();
		}

		public function getUserName($UserId){
			return $this->db->query('SELECT * FROM `userdetails` WHERE UserId='.$UserId)->result_array();
		}

	}

?>