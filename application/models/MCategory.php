<?php 
	
	/// this is the model of category to manage the category and subcategory related funcitons.. 
	class MCategory extends CI_Model{

		/// this is the function to get all the category from the category table..
		public function getAllCategory(){
			$where['ParentCategoryId'] = 0;
			$allCategory= $this->db->where($where)->get('category')->result_array();
			return $allCategory; 
		}


		/// this is the modal function to get six category to display in the home page...
		public function getLimitedCategory(){
			$limitedCategory = $this->db->query('select * from `category` where ParentCategoryId = 0 limit 6')->result_array();
 			return $limitedCategory;
 		}

 		public function countSubcategory($CategoryId){
 			return count($this->db->query('select * from `category` where ParentCategoryId='.$CategoryId)->result_array());
 		}


 		public function getAllSubcategory($CategoryId){
 			$where['ParentCategoryId'] = $CategoryId;
			$allCategory= $this->db->where($where)->get('category')->result_array();
			return $allCategory; 
 		}


 		public function getCategoryForAdmin($CategoryId){
 			return $this->db->query('select * from `category` where CategoryId='.$CategoryId)->result_array();
 		}

	}
?>