<?php 

class MOffers extends CI_Model {

	public function getOffersPerPage($CategoryId,$page=1){
		$start = ($page-1)*3;

		// echo $CategoryId;

		$data = $this->db->query('SELECT * FROM `offers` WHERE CategoryId = '.$CategoryId.' LIMIT '.$start.',3')->result_array();
	    // print_r($data[0]);
	    return $data;
	}


	public function getTotalOffers($CategoryId){
		return count($this->db->query('SELECT * FROM `offers` WHERE CategoryId = '.$CategoryId)->result_array());
	}


	public function countOffers($SubcategoryId){
		return count($this->db->query('SELECT * FROM `offers` WHERE CategoryId = '.$SubcategoryId)->result_array());
	}

	public function getOffersForFavorite($OfferId){
		return $this->db->query('SELECT * FROM `offers` where OfferId = '.$OfferId)->result_array();
	}

	public function getOfferImageForFavorite($OfferId){
		return $this->db->query('SELECT * from `images` WHERE OfferId = '.$OfferId.' Group By OfferId')->result_array();
	}

	public function getFavorite($OfferId, $UserId){
		return count($this->db->query('SELECT * FROM `wishlist` WHERE OfferId = '.$OfferId.' and UserId = '.$UserId)->result_array());
	}

	public function totalPurchaseOfOffers($OfferId){
		return count($this->db->query('SELECT * FROM `orders` WHERE OfferId = '.$OfferId)->result_array());
	}

	public function getTotalPurchaseOfAllOffers($BusinessId){
		return count($this->db->query('SELECT * FROM `orders` WHERE BusinessId = '.$BusinessId)->result_array());
	}

	public function getOffersOfBusiness($BusinessId){
		return count($this->db->query('SELECT * FROM `offers` WHERE BusinessId = '.$BusinessId)->result_array());
	}

	public function getRecentOffers()
	{
		return $this->db->query('SELECT * FROM `offers` GROUP BY OfferId ORDER BY OfferId DESC LIMIT 8')->result_array();
	}

	public function getOfferesOfBusinessOffers($BusinessId){
		return $this->db->query('SELECT * FROM `offers` WHERE BusinessId = '.$BusinessId)->result_array();
	}

	public function getOffersForReports($BusinessId, $OfferId){
		return $this->db->query('SELECT * FROM `offers` WHERE BusinessId = '.$BusinessId.' AND OfferId = '.$OfferId)->result_array();
	}

	public function getOffersForRecentOrders($OfferId){
		return $this->db->query('SELECT * FROM `offers` WHERE OfferId='.$OfferId)->result_array();
	}

		
	public function getNearAreaOffers($BusinessId){


		$totalOffers = count($this->db->query('select * from `offers` where BusinessId='.$BusinessId)->result_array());
		$start = rand(1, ($totalOffers-$totalOffers/2));
		$end = rand(12, $totalOffers);
		$state = rand(0 ,1);
		$order = "ASC";
		if($state == 0){
			$order = "DESC";
		}

		return $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$BusinessId.' Group by OfferId '.$order.' LIMIT '.$start.','.$end)->result_array();
	}

	public function getTotalOffersOfArea($CategoryId, $AreaId){
		$data['BusinessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE AreaId='.$AreaId)->result_array();

		$i=0;
		foreach ($data['BusinessDetails'] as $bd) {
			$data['OffersDetails'][$i] = $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$bd['BusinessId'].' AND  CategoryId = '.$CategoryId)->result_array(); 
			$i++;
		}

			$count=0;
		if(!empty($data['BusinessDetails'])){
			foreach ($data['OffersDetails'] as $od) {
				$count = $count + count($od);
			}
		}
		return $count;

		// return count($this->db->query('SELECT * FROM `offers` WHERE CategoryId = '.$CategoryId)->result_array());
	}

	
	public function getOffersPerPageOfArea($CategoryId, $AreaId){



		if($AreaId == 0){
			$data[0] = $this->db->query('SELECT * FROM `offers` WHERE CategoryId='.$CategoryId)->result_array();

			return $data;

		}




		$data['BusinessDetails'] = $this->db->query('SELECT * FROM `businessdetails` WHERE AreaId='.$AreaId)->result_array();

		$i=0;
		$data['OffersDetails'][0] = 0;
		foreach ($data['BusinessDetails'] as $bd) {
			if(!empty($data['BusinessDetails'])){
				$data['OffersDetails'][$i] = $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$bd['BusinessId'].' AND  CategoryId = '.$CategoryId)->result_array(); 
				$i++;
			}	
		}

		return $data['OffersDetails'];

	}


	public function getRecommandedOffers(){
		$UserId = $_SESSION['userDetails'][0]['UserId'];
		// $UserId = 16;
		$data = $this->db->query('SELECT * FROM `offers`,`orders`,`category` WHERE orders.UserId = '.$UserId.' AND orders.OfferId = offers.OfferId and offers.CategoryId = category.CategoryId GROUP BY offers.OfferId')->result_array();
		// print_r($data);
		// print_r($UserId);
		return $data;
	}












}

?>