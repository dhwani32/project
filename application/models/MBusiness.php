<?php 
class MBusiness extends CI_Model{

	public function getBusinessId($UserId)
	{
		$data = $this->db->query('select * from `businessdetails` where UserId = '.$UserId)->result_array();
		return $data;
	}


	public function getConnectedBusiness(){
		$totalBusiness = count($this->db->get('businessdetails')->result_array());
		$start = rand(1, ($totalBusiness-$totalBusiness/2));
		$end = rand(4, $totalBusiness);
		$state = rand(0 ,1);
		$order = "ASC";
		if($state == 0){
			$order = "DESC";
		}
		return $this->db->query('SELECT * FROM `businessdetails` GROUP BY BusinessId '.$order.' LIMIT '.$start.','.$end)->result_array();
	}




}
?>