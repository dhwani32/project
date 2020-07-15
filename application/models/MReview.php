<?php 


class MReview extends CI_Model{


	public function getStars($UserId, $OfferId){
		$where['UserId'] = $UserId;
		$where['OfferId'] = $OfferId;

		$data = $this->db->where($where)->get('review')->result_array();
		

		if(count($data) == 0){
			return 0;
		}else{
			if($data[0]['Stars'] == 1){
				return 1;
			}else{
				return 0;
			}
		}



	}

	public function countStars($OfferId){

		return count($this->db->query('select * from `review` where OfferId='.$OfferId.' and Stars = 1')->result_array());

	}

	public function countReview($OfferId){
		return count($this->db->query('select * from `review` where OfferId='.$OfferId.' and Review != ""')->result_array());
	}



	public function getAllReviewForBusiness($OfferId){
		return count($this->db->query('SELECT * FROM `review` WHERE OfferId='.$OfferId)->result_array());
	}


	public function getTotalReviewsOfUser($UserId){
		return count($this->db->query('SELECT * FROM `review` WHERE UserId='.$UserId)->result_array());
	}







}



?>