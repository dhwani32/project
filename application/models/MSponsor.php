<?php 


class MSponsor extends CI_Model{

		public function getAllPlans(){
			$data = $this->db->query('select * from `sponsorplans`')->result_array();
			return $data;
		}

		public function getAllSponsors(){
			$data = $this->db->get('sponsordetails')->result_array();
			return $data;
		}
		

} 

?>