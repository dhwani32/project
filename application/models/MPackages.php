<?php

	class MPackages extends CI_Model{
		public function getAllPackages(){
			return $this->db->get('package')->result_array();
		}


		public function getPackageList($PackageId){
			return $this->db->query('SELECT * FROM `package` WHERE PackageId='.$PackageId)->result_array();
		}


		public function getExpirenotifications($BusinessId, $day5, $day2, $day1){

			$data['dataDay5'] = $this->db->query('SELECT * FROM `activepackage` WHERE BusinessId='.$BusinessId.' AND EndDate=\''.$day5.'\'')->result_array();
			$data['dataDay2'] = $this->db->query('SELECT * FROM `activepackage` WHERE BusinessId='.$BusinessId.' AND EndDate=\''.$day2.'\'')->result_array();
			$data['dataDay1'] = $this->db->query('SELECT * FROM `activepackage` WHERE BusinessId='.$BusinessId.' AND EndDate=\''.$day1.'\'')->result_array();

			return $data;
		}

	}

?>
