<?php
	class Admin extends CI_Controller{


		/// this is the constructor for the adminc controller to load some important models...
		public function __construct(){
			/// call the constructor of parent class (CI_Controller)
			parent::__construct();
			/// load the MCategory model to use in the code...
			$this->load->model('MCategory');
			/// load the MLocation model to use in the code...
			$this->load->model('MLocation');
			/// load the MAUser model to use in the code...
			$this->load->model('MAUser');
			/// load the MPackage model to use in the code...
			$this->load->model('MPackages');
			/// load the MABusiness model to use in the code...
			$this->load->model('MABusiness');
			/// load the MOffer model to use in the code...
			$this->load->model('MOffers');
			/// load the MReview model to use in the code...
			$this->load->model('MReview');
			/// load the MOrders model to use in the code...
			$this->load->model('MOrders');
			/// load the MSubscription model to use in the code...
			$this->load->model('MSubscription');
			/// load the MAdmin model to use in the code...
			$this->load->model('MAdmin');
			/// load the MSponsor model to use in the code...
			$this->load->model('MSponsor');

		}




		/// Login and Logout Related...............
		/// Login and Logout Related...............
		/// Login and Logout Related...............



		/// this function load the login page of admin.....
		/// when enter the URL localhost/offersnearme/admin then this page will open by default.....
		public function index(){
			$this->load->view('admin_view/admin_login');
		}



		/// the controller function for the admin login check code....
		/// this function is user to login user....
		public function login(){

			/// retrive data using POST resquest....
			$AdminData = $this->input->post();
			$AdminName = $AdminData['AdminName'];
			$AdminPassword = $AdminData['AdminPassword'];

			/// load the model class M_Admin...
			/// Below onw statement is not very important...
			$this->load->model('MAdmin');
			/// Call the function of the MAdmin controller...
			$result = $this->MAdmin->login($AdminName, $AdminPassword);


			if(count($result)>0){
				/// set session for admin's details..
				$this->session->set_userdata('Admin_Details',$result[0]);
				redirect(base_url('admin/admin_home'));
			}else{
				/// set temporary session for show some errors in login page...
				$this->session->set_flashdata('Admin_Ermsg','Admin Id and Password are Invalid!');
				$this->load->view('admin_view/admin_login');
			}
		}


		/// this is the controller function for the admin logout function ....
		public function logout() {
			/// destroy the session storing the details of the admin....
			$this->session->unset_userdata('Admin_Details');
			/// redirect to the login page or index controller....
			redirect(base_url('admin/index'));
		}



		/// When Admin has login once then only allow to open the adminpage..
		public function admin_home(){
			if(isset($_SESSION['Admin_Details'])){
				/// load the admin_home page view....
				$this->load->view('admin_view/admin_home');
			}else{
				/// redirect to login page...
				redirect(base_url('admin/index'));
			}
		}


		/// function to load the admin's profile page..
		public function admin_profile(){
			$this->load->view('admin_view/admin_profile');
		}

		/// End Login and Logout Related...............
		/// End Login and Logout Related...............
		/// End Login and Logout Related...............







		///========= Category Related ==============
		///========= Category Related ==============
		///========= Category Related ==============




		/// function to load the page to manage the categories..
		public function manageCategory() {
			/// load the category management page.....
			$this->load->view('admin_view/manageCategory');
		}

		/// function to add the category...
		public function addCategory(){
			/// retrive data using the POST request.....
			$data = $this->input->post();

			/// configure some parameter for file_upload library...
			/// upload_path : define the path of saving image... (It Define PATH Where to upload or save files/images...)
			$config['upload_path'] = 'assets/assets_category_images';
			/// allowed_types : define supported file types... (It Define Which TYPES OF FILES are supported and allowed to upload the files...)
			$config['allowed_types'] = 'jpg|jpeg|png|gif|jfif|JFIF|pjpeg';

			/// This function is use to load the library of uploading the files...
			$this->load->library('upload',$config);

			/// do_upload : it is the function to upload files....
			if($this->upload->do_upload('CategoryImage')){
				/// upload->data() : it is the function which return the values which are uploaded....
				/// it return the data or details of the uploaded file....
				$imageData = $this->upload->data();

				/// create the variable to insert this data in the database...
				$insert['CategoryName'] = $data['CategoryName'];
				$insert['CategoryImage'] = $imageData['file_name'];
				$insert['ParentCategoryId'] = 0;
				/// here, is the query to insert the data in the 'category' table in the database...
				$this->db->insert('category',$insert);
				/// after insert all the data in the database now load the category management page...
				$this->load->view('admin_view/manageCategory');

			}else{
				/// if file doesn't uploaded in the defined location then show the error message...
				$error = array('error' => $this->upload->display_errors());
				/// load the caetgory management page....
  				$this->load->view('admin_view/manageCategory', $error);
			}
		}

		/// function to delete the category from the database...
		public function deleteCategory($c_id,$c_image){
			/// Define the Proper PATH with file name of which you need to delete the file....
			$fileName = 'assets/assets_category_images/'.$c_image;
			/// echo $fileName;
			/// unlink is the function to delete the file or remove the file from the location....
			$delete = unlink($fileName);
			if($delete){
				/// Query to delete the files from the 'category' table...
				$this->db->query('delete from `category` where CategoryId = '.$c_id.' or ParentCategoryId = '.$c_id);
				/// redirect the category management page.....
				redirect(base_url('admin/manageCategory'));
			}else{
				echo "not done";
			}
		}

		/// this is the function to edit the category in database..
		public function editCategory(){
			/// retrive the data using the POST request....
			$data = $this->input->post();

			/// define the parameter WHERE to get data from the 'category' table....
			$where['CategoryId'] = $data['CategoryId'];
			/// get data from the category table...
			$records = $this->db->where($where)->get('category')->result_array();
			// print_r($records);
			/// Define the Proper PATH with file name of which you need to delete the file....
			$fileName = 'assets/assets_category_images/'.$records[0]['CategoryImage'];
			// echo $fileName;

			/// unlink is the function to delete the file or remove the file from the location....
			$delete = unlink($fileName);
			if($delete){
				/// specify the path to upload the image..
				$config['upload_path'] = 'assets/assets_category_images';
				/// specify the image type to store the image..
				$config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
				/// to load the library to upload the image...
				$this->load->library('upload',$config);

				/// do_upload is the function to upload the image in the folder...
				if($this->upload->do_upload('CategoryImage')){

					/// data() is the function to get all the details of the uploaded images...
					$imageData = $this->upload->data();
					/// WHERE for update......
					$where['CategoryId'] = $data['CategoryId'];
					/// data which we want to update....
					$updateData['CategoryName'] = $data['CategoryName'];
					$updateData['CategoryImage'] = $imageData['file_name'];
					/// update the data of the 'category' table....
					$this->db->where($where)->update('category',$updateData);
					/// redirect to the category management page...
					redirect(base_url('admin/manageCategory'));
				}else{
					/// show the error message...
					$error = array('error' => $this->upload->display_errors());
					/// load the category management page....
	  			$this->load->view('admin_view/manageCategory', $error);
				}
			}else{
				echo "not done";
			}
		}

		///========== End Category Related functions...
		///========== End Category Related functions...
		///========== End Category Related functions...













		///========= Subcategory Related functions...
		///========= Subcategory Related functions...
		///========= Subcategory Related functions...


		/// function to load the subcategory page...
		public function manageSubcategory(){
			/// load the subcategory management page....
			$this->load->view('admin_view/manageSubcategory');
		}

		/// function to add the subcategory in database.....
		public function addSubcategory(){
			/// retrive the data using the POST request....
			$data = $this->input->post();

			/// upload_path : specify the path where to upload the file...
			$config['upload_path'] = 'assets/assets_subcategory_images';
			/// allowed_types : specify file types allowed to upload....
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			/// load the library to upload the file....
			$this->load->library('upload',$config);

			/// do_upload is the function to upload the files...
			if($this->upload->do_upload('SubcategoryImage')){
				/// data() : returns the details of the file uploaded...
				$imageData = $this->upload->data();
				/// data to insert in the table...
				$insert['CategoryName'] = $data['SubcategoryName'];
				$insert['CategoryImage'] = $imageData['file_name'];
				$insert['ParentCategoryId'] = $data['CategoryId'];
				/// insert the data in the category table...
				$this->db->insert('category',$insert);
				/// load the subcategory management page....
				$this->load->view('admin_view/manageSubcategory');
			}else{
				$error = array('error' => $this->upload->display_errors());
  				$this->load->view('admin_view/manageSubcategory', $error);
			}
		}


		/// function to delete the subcategory...
		public function deleteSubcategory($c_id,$c_image){
			/// specify the file name to delete...
			$fileName = 'assets/assets_subcategory_images/'.$c_image;
			// echo $fileName;
			/// unlink is the function to delete the files...
			$delete = unlink($fileName);
			if($delete){
				/// query to delete the data from the 'caetgory' table...
				$this->db->query('delete from `category` where CategoryId = '.$c_id.' or ParentCategoryId = '.$c_id);
				/// redirect to the subcategory management page..
				redirect(base_url('admin/manageSubcategory'));
			}else{
				echo "not done";
			}
		}

		/// function to make the dropdown of the subcategory to use in jQuery...
		public function getSubcategory($c_id){
			/// data of where parameter....
			$where['ParentCategoryId'] = $c_id;
			/// retrive the data from the 'category' table where matches data...
			$result = $this->db->where($where)->get('category')->result_array();
			/// returnt the option dropdown.....
			foreach ($result as $r) {
			?><option value="<?php echo $r['CategoryId'];?>"><?php echo $r['CategoryName'];?></option><?php
			}
		}


		/// function to make the table of the subcategory ...
		public function getSubcategoryTable($c_id){
			/// data of where parameter....
			$where['ParentCategoryId'] = $c_id;
			/// retrive the data from the 'category' table where matches data...
			$result = $this->db->where($where)->get('category')->result_array();
			/// return the table row and columns with data
			foreach ($result as $r) {
			?>
			<tr>
				<td><img width="70" height="70" src="<?php echo base_url('assets/assets_subcategory_images/');?><?php echo $r['CategoryImage'];?>"></td>
				<td><?php echo $r['CategoryName'];?></td>
				<td>
					<a href="" data-toggle="modal" data-target="#editSubcategoryModel" data-name="<?=$r['CategoryName']?>" data-id="<?=$r['CategoryId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a>
				</td>
				<td>
					<a href="<?=base_url('admin/deleteSubcategory/');?><?php echo $r['CategoryId'];?>/<?=$r['CategoryImage'];?>" class="fa fa-trash btn btn-danger"></a>
				</td>
			</tr>
			<?php
			}
		}


		/// function to edit the subcategory
		public function editSubcategory(){
			/// retrive data using POST request...
			$data = $this->input->post();

			$where['CategoryId'] = $data['CategoryId'];
			$records = $this->db->where($where)->get('category')->result_array();
			// print_r($records);
			$fileName = 'assets/assets_subcategory_images/'.$records[0]['CategoryImage'];
			// echo $fileName;
			$delete = unlink($fileName);
			if($delete){

				/// set the file PATH and TYPES allowed to upload....
				$config['upload_path'] = 'assets/assets_subcategory_images';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				/// load the library...
				$this->load->library('upload',$config);

				if($this->upload->do_upload('CategoryImage')){
					$imageData = $this->upload->data();

					$where['CategoryId'] = $data['CategoryId'];

					$updateData['CategoryName'] = $data['CategoryName'];
					$updateData['CategoryImage'] = $imageData['file_name'];
					$this->db->where($where)->update('category',$updateData);

					redirect(base_url('admin/manageSubcategory'));

				}else{
					$error = array('error' => $this->upload->display_errors());
	  				$this->load->view('admin_view/manageSubcategory', $error);
				}

			}else{
				echo "not done";
			}

		}



		///========== End subcategory Related function...
		///========== End subcategory Related function...
		///========== End subcategory Related function...













		///========== Country Related function...
		///========== Country Related function...
		///========== Country Related function...




		/// function to load the country page..
	 	public function manageCountry() {
			$this->load->view('admin_view/manageCountry');
		}


		/// function to add the new contry in the database..
		public function addCountry(){
			$data = $this->input->post();
			$insert['CountryName'] = $data['CountryName'];

			$this->db->insert('country',$insert);
			$this->load->view('admin_view/manageCountry');
		}


		/// function to delete the country from the database...
		public function deleteCountry($country_id){
			$this->db->query('delete from `country` where CountryId ='.$country_id);
			redirect(base_url('admin/manageCountry'));
		}


		/// this is the function to edit the country...
		public function editCountry(){
			$data = $this->input->post();
			$record = $this->db->get('country')->result_array();

			$updateData['CountryName'] = $data['CountryName'];
			$where['CountryId'] = $data['CountryId'];

			$this->db->where($where)->update('country',$updateData);
			redirect(base_url('admin/manageCountry'));
		}

		///============ End Country Related functions....
		///============ End Country Related functions....
		///============ End Country Related functions....













		///=========== State Related functions....
		///=========== State Related functions....
		///=========== State Related functions....




		/// function to load the State page...
		public function manageState() {
			$this->load->view('admin_view/manageState');
		}


		/// function to add new state in the database...
		public function addState(){
			$data = $this->input->post();
			$insert['StateName'] = $data['StateName'];
			$insert['CountryId'] = $data['CountryId'];

			$this->db->insert('state',$insert);
			$this->load->view('admin_view/manageState');
		}


		/// function to make the dropdown for jQuery of state...
		public function getState($country_id){
			$where['CountryId'] = $country_id;
			$result = $this->db->where($where)->get('state')->result_array();
			foreach ($result as $r) {
			?><option value="<?php echo $r['StateId'];?>"><?php echo $r['StateName'];?></option><?php
			}
		}


		/// function to make the table of the State to use in jQuery...
		public function getStateTable($country_id){
			$where['CountryId'] = $country_id;
			$result = $this->db->where($where)->get('state')->result_array();
			foreach ($result as $r) {
			?><tr>
				<td><?php echo $r['StateName'];?></td>
				<td><a href="" data-toggle="modal" data-target="#editStateModel" data-name="<?=$r['StateName']?>" data-id="<?=$r['StateId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a></td>
				<td><a href="<?=base_url('admin/deleteState/');?><?php echo $r['StateId'];?>" class="fa fa-trash btn btn-danger"></a></td>
				</tr><?php
			}
		}


		/// this is the function to edit the state in the database....
		public function editState(){
			$data = $this->input->post();
			$record = $this->db->get('state')->result_array();

			$updateData['StateName'] = $data['StateName1'];
			$where['StateId'] = $data['StateId1'];

			$this->db->where($where)->update('state',$updateData);
			redirect(base_url('admin/manageState'));
		}


		/// function to delete the state from the database...
		public function deleteState($state_id){
			$this->db->query('delete from `state` where StateId ='.$state_id);
			redirect(base_url('admin/manageState'));
		}




		///======== End State Related functions...
		///======== End State Related functions...
		///======== End State Related functions...














		///======== City related functions....
		///======== City related functions....
		///======== City related functions....


		/// function to load the city page...
		public function manageCity() {
			$this->load->view('admin_view/manageCity');
		}


		/// function to add the city in the database...
		public function addCity(){
			$data = $this->input->post();
			$insert['CityName'] = $data['CityName'];
			$insert['StateId'] = $data['StateId'];

			$this->db->insert('city',$insert);
			$this->load->view('admin_view/manageCity');
		}


		/// function to delete the city from the database...
		public function deleteCity($city_id){
			$this->db->query('delete from `city` where CityId ='.$city_id);
			redirect(base_url('admin/manageCity'));
		}


		/// function to make the dropdown list tage of city to use in the jQuery....
		public function getCity($state_id){
			$where['StateId'] = $state_id;
			$result = $this->db->where($where)->get('city')->result_array();
			foreach ($result as $r) {
			?><option value="<?php echo $r['CityId'];?>"><?php echo $r['CityName'];?></option><?php
			}
		}


		/// function to make the table tag of city to use in the jQuery...
		public function getCityTable($state_id){
			$where['StateId'] = $state_id;
				$result = $this->db->where($where)->get('city')->result_array();
				foreach ($result as $r) {
				?><tr>
					<td><?php echo $r['CityName'];?></td>
					<td><a href="" data-toggle="modal" data-target="#editCityModel" data-name="<?=$r['CityName']?>" data-id="<?=$r['CityId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a></td>
					<td><a href="<?=base_url('admin/deleteCity/');?><?php echo $r['CityId'];?>" class="fa fa-trash btn btn-danger"></a></td>
					</tr><?php
				}
		}


		/// this is the function to edit the city in the database....
		public function editCity(){
			$data = $this->input->post();
			$record = $this->db->get('city')->result_array();

			$updateData['CityName'] = $data['CityName1'];
			$where['CityId'] = $data['CityId1'];

			$this->db->where($where)->update('city',$updateData);
			redirect(base_url('admin/manageCity'));
		}




		///======== End City Related functions...
		///======== End City Related functions...
		///======== End City Related functions...















		///======== Area Related functions....
		///======== Area Related functions....
		///======== Area Related functions....




		/// function to load the area page...
		public function manageArea() {
			$this->load->view('admin_view/manageArea');
		}


		/// function to add the area in the database...
		public function addArea(){
			$data = $this->input->post();
			$insert['AreaName'] = $data['AreaName'];
			$insert['CityId'] = $data['CityId'];

			$this->db->insert('area',$insert);
			$this->load->view('admin_view/manageArea');
		}


		/// function to delete the area from the database....
		public function deleteArea($area_id){
			$this->db->query('delete from `area` where AreaId ='.$area_id);
			redirect(base_url('admin/manageArea'));
		}


		/// functino to make the table of the area to use in jQuery...
		public function getAreaTable($city_id){
			$where['CityId'] = $city_id;
				$result = $this->db->where($where)->get('area')->result_array();
				foreach ($result as $r) {
				?><tr>
					<td><?php echo $r['AreaName'];?></td>
					<td><a href="" data-toggle="modal" data-target="#editAreaModel" data-name="<?=$r['AreaName']?>" data-id="<?=$r['AreaId']?>" class="open-EditCategoryModel fa fa-edit btn btn-success"></a></td>
					<td><a href="<?=base_url('admin/deleteArea/');?><?php echo $r['AreaId'];?>" class="fa fa-trash btn btn-danger"></a></td>
					</tr><?php
				}
		}


		///this is the functino to get area drop down
		public function getArea($city_id){
			$where['CityId'] = $city_id;
			$result = $this->db->where($where)->get('area')->result_array();
			foreach ($result as $r) {
			?><option value="<?php echo $r['AreaId'];?>"><?php echo $r['AreaName'];?></option><?php
			}
		}

		/// this is the function to edit the area in the database....
		public function editArea(){
			$data = $this->input->post();
			$record = $this->db->get('area')->result_array();

			$updateData['AreaName'] = $data['AreaName1'];
			$where['AreaId'] = $data['AreaId1'];

			$this->db->where($where)->update('area',$updateData);
			redirect(base_url('admin/manageArea'));
		}






		///======= End Area Related functions...
		///======= End Area Related functions...
		///======= End Area Related functions...
















		///======= Registered User in Admin side.....
		///======= Registered User in Admin side.....
		///======= Registered User in Admin side.....






		/// this function use to get all the user related details from the userdetails table..
		public function manageUsers($page=1){


			$this->load->library('pagination');
			$config['per_page'] = 12;
			$config['base_url'] = base_url('admin/manageUsers');
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = true;
			$config['attributes'] = array('class' =>'btn');
			$config['num_rows'] = 2;
			$config['cur_tag_open'] = '<span class="btn btn-dark">';
			$config['cur_tag_close'] = '</span>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			// $config['first_tag_open'] = '<span class="btn btn-dark">';
			// $config['first_tag_close'] = '</span>';
			// $config['last_tag_open'] = '<sapn class="btn btn-dark">';
			// $config['last_tag_close'] = '</span>';
			// $config['next_tag_open'] = '<span class="btn btn-dark">';
			// $config['next_tag_close'] = '</span">';
			// $config['prev_tag_open'] = '<span class="btn btn-purple">';
			// $config['prev_tag_close'] = '</span">';
			// $config['num_tag_open'] = '<span class="btn-dark">';
			// $config['num_tag_close'] = '</span">';



			$config['total_rows']=$this->MAUser->getTotalUsers();
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['users'] = $this->MAUser->getUsersPerPage($page);
			$data['totalUsers'] = count($this->db->get('userdetails')->result_array());

			// print_r($data['users']);
			$this->load->view('admin_view/manageUser',$data);
		}


		public function manageUserDetails($UserId){

			$where['UserId'] = $UserId;
			$result = $this->db->where($where)->get('userdetails')->result_array();
			$data['userDetails'] = $result[0];
			$data['review'] = $this->MReview->getTotalReviewsOfUser($UserId);
			$this->load->view('admin_view/manageUserDetails',$data);
			// print_r($data['userDetails']);
		}

		public function changeUserAllow($UserId,$UserAllow){


			$where['UserId'] = $UserId;

			if($UserAllow == 1){
				$updateData['UserAllow'] = 0;
			}else{
				$updateData['UserAllow'] = 1;
			}

			$this->db->update('userdetails',$updateData);
			redirect(base_url('admin/manageUserDetails/'.$UserId));
		}


















		///======= End Registered User in Admin side.....
		///======= End Registered User in Admin side.....
		///======= End Registered User in Admin side.....






		///======= Add SponsorPlan in Admin side....
		///======= Add SponsorPlan in Admin side....
		///======= Add SponsorPlan in Admin side....


		public function SponsorPlanPage(){
			$this->load->view('admin_view/addSubscriptionPlan');
		}

		public function deletePlan($spid){
			$this->db->where(array('SponsorPlanId' => $spid))->delete('sponsorplans');
			redirect(base_url('admin/SponsorPlanPage'));

		}

		public function addPlan(){
			$data = $this->input->post();

			$insertPlan['PlanName'] = $data['PlanName'];
			$insertPlan['PlanPrice'] = $data['PlanPrice'];
			$insertPlan['PlanDuration'] = $data['PlanDuration'];

			$this->db->insert('sponsorplans', $insertPlan);
			redirect(base_url('admin/SponsorPlanPage'));
		}

		public function editPlan(){
			$data = $this->input->post();
			// print_r($data);

			$updateSponsorWhere['SponsorPlanId'] = $data['PlanId'];

			$updateSponsorPlan['PlanName'] = $data['PlanName'];
			$updateSponsorPlan['PlanDuration'] = $data['PlanDuration'];
			$updateSponsorPlan['PlanPrice'] = $data['PlanPrice'];

			$this->db->where($updateSponsorWhere)->update('sponsorplans', $updateSponsorPlan);
			redirect(base_url('admin/SponsorPlanPage'));
		
		}


		///======= End Add SponsorPlan in Admin side....
		///======= End Add SponsorPlan in Admin side....
		///======= End Add SponsorPlan in Admin side....



		///======== Add Packages in Admin side......
		///======== Add Packages in Admin side......
		///======== Add Packages in Admin side......



		public function packagesPage(){
			$this->load->view('admin_view/addPackages');
		}

		public function addPackage(){
			$data = $this->input->post();

			$insert['PackageName'] = $data['PackageName'];
			$insert['PackagePrice'] = $data['PackagePrice'];
			$insert['PackageDuration'] = $data['PackageDuration'];
			$insert['PackageDescription'] = $data['PackageDescription'];
			$insert['TotalOffers'] = $data['TotalOffers'];

			$this->db->insert('package',$insert);
			redirect(base_url('admin/packagesPage'));
		}

		public function editPackage(){
			$data = $this->input->post();

			$where['PackageId'] = $data['PackageId'];

			$update['PackageName'] = $data['PackageName'];
			$update['PackagePrice'] = $data['PackagePrice'];
			$update['PackageDuration'] = $data['PackageDuration'];
			$update['PackageDescription'] = $data['PackageDescription'];
			$update['TotalOffers'] = $data['TotalOffers'];

			$this->db->where($where)->update('package',$update);

			redirect(base_url('admin/packagesPage'));

		}

		public function deletePackage($PackageId){
			$this->db->delete('package',array('PackageId'=>$PackageId));
			redirect(base_url('admin/packagesPage'));
		}




		/// package end
		/// package end
		/// package end








		/// Manage Business related
		/// Manage Business related
		/// Manage Business related





		public function manageBusiness($page=1){


			$this->load->library('pagination');
			$config['per_page'] = 12;
			$config['base_url'] = base_url('admin/manageBusiness');
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = true;
			$config['attributes'] = array('class' =>'btn');
			$config['num_rows'] = 2;
			$config['cur_tag_open'] = '<span class="btn btn-dark">';
			$config['cur_tag_close'] = '</span>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			// $config['first_tag_open'] = '<span class="btn btn-dark">';
			// $config['first_tag_close'] = '</span>';
			// $config['last_tag_open'] = '<sapn class="btn btn-dark">';
			// $config['last_tag_close'] = '</span>';
			// $config['next_tag_open'] = '<span class="btn btn-dark">';
			// $config['next_tag_close'] = '</span">';
			// $config['prev_tag_open'] = '<span class="btn btn-purple">';
			// $config['prev_tag_close'] = '</span">';
			// $config['num_tag_open'] = '<span class="btn-dark">';
			// $config['num_tag_close'] = '</span">';



			$config['total_rows']=$this->MABusiness->getTotalBusiness();
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['business'] = $this->MABusiness->getBusinessPerPage($page);
			$data['totalBusiness'] = count($this->db->get('businessdetails')->result_array());

			// print_r($data['users']);
			$this->load->view('admin_view/manageBusiness',$data);


		}


		public function manageBusinessDetails($BusinessId){

			$where['BusinessId'] = $BusinessId;
			$result = $this->db->where($where)->get('businessdetails')->result_array();
			$data['businessDetails'] = $result[0];
			// print_r($data['businessDetails']);
			$this->load->view('admin_view/manageBusinessDetails',$data);
		}



		public function getOffersOfBusiness($BusinessId, $Page=1){

			$this->load->library('pagination');
			$config['per_page'] = 3;
			$config['base_url'] = base_url('admin/getOffersOfBusiness').$BusinessId;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = true;
			$config['attributes'] = array('class' =>'btn');
			$config['num_rows'] = 2;
			$config['cur_tag_open'] = '<span class="btn btn-dark">';
			$config['cur_tag_close'] = '</span>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			// $config['first_tag_open'] = '<span class="btn btn-dark">';
			// $config['first_tag_close'] = '</span>';
			// $config['last_tag_open'] = '<sapn class="btn btn-dark">';
			// $config['last_tag_close'] = '</span>';
			// $config['next_tag_open'] = '<span class="btn btn-dark">';
			// $config['next_tag_close'] = '</span">';
			// $config['prev_tag_open'] = '<span class="btn btn-purple">';
			// $config['prev_tag_close'] = '</span">';
			// $config['num_tag_open'] = '<span class="btn-dark">';
			// $config['num_tag_close'] = '</span">';



			$config['total_rows']=$this->MABusiness->getTotalOffersOfBusiness($BusinessId);
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['offers'] = $this->MABusiness->getOffersOfBusinessPerPage($BusinessId, $Page);
			$data['totalOffers'] = count($this->db->query('select * from `offers` where BusinessId='.$BusinessId)->result_array());
			$where['BusinessId'] = $BusinessId;
			$result = $this->db->where($where)->get('businessdetails')->result_array();
			$data['businessDetails'] = $result[0];


			$data['review']=NULL;

			foreach ($data['offers'] as $d) {
				$whereForReview['OfferId'] = $d['OfferId'];
				// $asd = $this->db->query('SELECT * FROM `review` WHERE OfferId='.$d['OfferId'])->result_array();
				$countReview = $this->MReview->getAllReviewForBusiness($d['OfferId']);
				// print_r($countReview);

				if($countReview != 0){
					$testReview = $this->db->where($whereForReview)->get('review')->result_array();
					if($testReview[0]['Review'] != ""){
						$data['review'] = $testReview;
					}
				}else{
				}
			}



			if($data['review'] != NULL){
				$config['total_rows']=count($data['review']);
			}else{
				$config['total_rows']=0;
			}


			$data['linksReview']=$this->pagination->create_links();


			// print_r($data);
			// print_r($data['businessDetails']);
			// $this->load->view('admin_view/manageBusinessDetails',$data);
			// print_r($data['users']);
			// print_r($data);
			$this->load->view('admin_view/manageBusinessDetails',$data);

		}



		public function sendMessageToBusiness(){
			$data['msg'] = $this->input->post();
			/// here, we can set the timezone so we can get exact curent time..
			date_default_timezone_set('Asia/Kolkata');
			$date['time'] = date('H:i:s',time());
			$date['date'] = date('Y-m-d',time());
			$datetime = date('Y-m-d H:i:s', time());
			// print_r($date);
			// print_r($data);


			$insertMsg['date'] = $date['date'];
			$insertMsg['time'] = $date['time'];
			// $insertMsg['time'] = $datetime;
			$insertMsg['BusinessId'] = $data['msg']['BusinessId'];
			$insertMsg['Message'] = $data['msg']['Message'];

			$this->db->insert('adminbusinesschat', $insertMsg);
			redirect(base_url('admin/manageBusiness'));
		}












		/// End Manage Business related
		/// End Manage Business related
		/// End Manage Business related




		public function manageMessageFromUsers(){

			$data['userInquiry'] = $this->db->query('SELECT * FROM `userinquiry`')->result_array();

			$this->load->view('admin_view/manageMessageFromUsers',$data);
		}


		public function manageMessageFromBusiness(){
			$data['businessInquiry'] = $this->db->query('SELECT * FROM `adminbusinesschat` ')->result_array();
			$i = 0;
			foreach ($data['businessInquiry'] as $bi) {
				if(!empty($bi['FromBusiness'])){
					$data['mainRecord'][$i] = $bi;
					$i++;
				}
			}

			$this->load->view('admin_view/manageMessageFromBusiness',$data);
		}


		public function deleteMessageFromUsers(){
			$this->db->query('delete from `userinquiry`');
			redirect(base_url('admin/manageMessageFromUsers'));
		}

		public function deleteMessageFromBusiness(){
			$this->db->query('delete from `adminbusinesschat` where FromBusiness != \'null\'');
			redirect(base_url('admin/manageMessageFromBusiness'));	
		}


		
		/// manage security related .... 
		/// manage security related .... 
		/// manage security related .... 
		


		public function manageSecurityQuestion(){
			$data = $this->input->post();

			$data['retrive'] = $this->db->query('select * from `admindetails` where AdminId = '.$data['AdminId'])->result_array();
			// print_r($data);
			
			if(count($data['retrive']) <= 0){
				$this->session->set_flashdata('SQMsg', 'record not found!!');
				redirect(base_url('admin/admin_home'));
			}else{
				if($data['retrive'][0]['SecurityQuestion'] == null && $data['retrive'][0]['Answer'] == null){
					$insert['SecurityQuestion'] = $data['SecurityQuestion'];
					$insert['Answer'] = $data['Answer']; 
					$where['AdminId'] = $data['AdminId'];
					$this->db->where($where)->update('admindetails',$insert);
					$this->session->set_flashdata('SQMsgSusscess', 'Question Set Successfully!! ');
					redirect(base_url('admin/admin_home'));
				}else{
					$update['SecurityQuestion'] = $data['SecurityQuestion'];
					$update['Answer'] = $data['Answer']; 
					$updateWhere['AdminId'] = $data['AdminId'];
					$this->db->where($updateWhere)->update('admindetails',$update);
					$this->session->set_flashdata('SQMsgSusscess', 'Question Update Successfully!!');
					redirect(base_url('admin/admin_home'));
				}
			}

		}


		public function changePassword(){
			$data = $this->input->post();
			// print_r($data);

			$state = $this->db->query('select * from `admindetails` where AdminPassword = \''. $data['oldPassword'].'\' OR AdminPassword = \''. md5($data['oldPassword']).'\' ')->result_array();

			// print_r($state);

			if(count($state) <= 0){
				$this->session->set_flashdata('changePasswordMsg', 'Password doesn\'t matched.... Password has been not changed!!');
				redirect(base_url('admin/admin_home'));
			}else{
				if($data['newPassword'] != $data['confirmPassword']){
					$this->session->set_flashdata('changePasswordMsg', 'Confirm password not matched... Password has been not changed!!');
					redirect(base_url('admin/admin_home'));	
				}else{
					$update['AdminPassword'] = md5($data['newPassword']);
					$where['AdminId'] = $data['AdminId'];
					$this->db->where($where)->update('admindetails', $update);

					$this->session->set_flashdata('changePasswordSuccessMsg', 'Password has been changed successfully!!');
					redirect(base_url('admin/admin_home'));	
				}
			}
		}






















		public function forgotPasswordPage(){
			$this->load->view('admin_view/forgotPassword');
		}

		public function verifyName(){
			$data = $this->input->post();
			

			$data['details'] = $this->db->query('select * from `admindetails` where AdminName = \''.$data['AdminName'].'\'')->result_array();
			

			if(count($data['details']) <= 0){
				$this->session->set_flashdata('AdminNameNotFound','Name not valid.....');
				redirect(base_url('admin/forgotPasswordPage'));
			}else{
				$this->load->view('admin_view/SQverify.php',$data);
			}

		}


		public function checkSequrityQuestion(){
			$data = $this->input->post();
			// print_r($data);

			$data['details'] = $this->db->query('select * from `admindetails` where AdminId =\''.$data['AdminId'] .'\'')->result_array();
			
			if($data['details'][0]['Answer'] != $data['Answer'] ){
				$this->session->set_flashdata('SecurityQuestionMsg','Answer is not valid..');
				$this->load->view('admin_view/SQverify.php',$data);
			}else{
				$this->load->view('admin_view/resetPassword.php',$data);
			}

		}	

		public function resetPassword(){
			$data = $this->input->post();
		
			$data['details'] = $this->db->query('select * from `admindetails` where AdminId =\''.$data['AdminId'] .'\'')->result_array();
			// print_r($data);


			if($data['Password'] != $data['ConfirmPassword']){
				$this->session->set_flashdata('resetPasswordMsg','Password Does not match...');
				$this->load->view('admin_view/resetPassword.php',$data);
			}else{
				$update['AdminPassword'] = md5($data['Password']);
				$where['AdminId'] = $data['AdminId'];

				$this->db->where($where)->update('admindetails', $update);
				redirect(base_url('admin/index'));
			}
		}




		public function raferalCodeGenerator(){

        	///str_shuffle is the function to shuffle the string ...
	        function random_strings($length_of_string)
	        {
	              $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
	              return substr(str_shuffle($str_result), 0, $length_of_string);
	        }
	        return random_strings(3).random_strings(2).random_strings(1);
   		}

		/// end manage security related .... 
		/// end manage security related .... 
		/// end manage security related .... 



   		/// request for the payment .... 
   		/// request for the payment .... 
   		/// request for the payment .... 

   		public function paymentRequest(){

   			$data['businesstransactiondetails'] = $this->db->query('select * from `businesstransactiondetails` Where RequestStatus = \'Requested\'')->result_array();
   			$data['totalRequests'] = count($data['businesstransactiondetails']);
   			$this->load->view('admin_view/admin_paymentRequest', $data);

   		}



   		public function paymentDone($BusinessReqId, $BusinessId){
   			
   			$where['BusinessId'] = $BusinessId;
   			$where['BusinessTransactionId'] = $BusinessReqId;

   			$update['RequestStatus'] = 'Payed';


   			$this->db->where($where)->update('businesstransactiondetails', $update);

   			redirect(base_url('admin/paymentRequest'));

   		}


   		/// End request for the payment .... 
   		/// End request for the payment .... 
   		/// End request for the payment .... 




   		public function searchUserByNameAjax($userName){

   			if($userName == "" || $userName == " "){
   				$userDetails = $this->db->query('SELECT * FROM `userdetails`')->result_array();
   			}else{
   				$userDetails = $this->db->query('SELECT * FROM `userdetails` WHERE UserName LIKE \'%'.$userName.'%\'')->result_array();
   			}


   			foreach ($userDetails as $user) {
   				echo '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12"><div class="card card-figure"><figure class="figure"><div class="figure-img"><img width="100%" height="150" class="img-fluid" src="'.base_url('assets/assets_user_images').'/'.$user['UserImage'].'" alt="Card image cap"><div class="figure-description"><h4 class="figure-title">'.$user['UserName'].'</h4><p> '.$user['JoinDate'].'</p><p> '.$user['UserPhone'].' </p></div><div class="figure-tools"><a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a></div><div class="figure-action"><a href="'.base_url('admin/manageUserDetails').'/'.$user['UserId'].'" class="btn btn-block btn-sm btn-primary">Profile</a></div></div><figcaption class="figure-caption"><ul class="list-inline d-flex text-muted mb-0"><li class="list-inline-item mr-auto"><span class="oi oi-paperclip">'.$user['UserName'].'</span></li><li class="list-inline-item"><span class="oi oi-calendar">'.$user['UserGender'].'</span></li></ul></figcaption></figure></div></div>';
   			}

   		}


   		public function searchBusinessByNameAjax($businessName){



   			if($businessName == '' || $businessName== ' ' || $businessName== '  ' || $businessName == null){
   				$business = $this->db->query('SELECT * FROM `businessdetails`')->result_array();
   			}else{
   			   	$business = $this->db->query('SELECT * FROM `businessdetails` WHERE CompanyName LIKE \'%'.$businessName.'%\'')->result_array();
   			}


   			foreach($business as $user){
                        
               	$Location = $this->MLocation->getLocation($user['AreaId']);
                
                $Category = $this->MCategory->getCategoryForAdmin($user['CategoryId']);
                    
                $Offers = $this->MOffers->getOfferesOfBusinessOffers($user['BusinessId']);
				
				$totalReview = 0;
                foreach ($Offers as $o) {
                    $review = $this->MReview->getAllReviewForBusiness($o['OfferId']);
                    $totalReview = $totalReview + $review;
                }
                        



                echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><div class="card"><div class="card-body"><div class="row align-items-center"><div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12"><div class="user-avatar float-xl-left pr-4 float-none"><img width="120" height="120" src="'.base_url('assets/assets_business_images').'/'.$user['BusinessImage'].'" alt="User Avatar" class="rounded-circle"></div><div class="pl-xl-3"><div class="m-b-0"><div class="user-avatar-name d-inline-block"><a href="'.base_url("admin/getOffersOfBusiness").'/'.$user['BusinessId'].'"><h2 class="font-24 m-b-10">'.$user['CompanyName'].'</h2></a></div><div class="rating-star d-inline-block pl-xl-2 mb-2 mb-xl-0"><p class="d-inline-block text-dark">'.$totalReview.' Reviews </p></div></div><div class="user-avatar-address"><p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>'.$Location['AreaDetails'][0]['AreaName'].', '.$Location['CityDetails'][0]['CityName'].', '.$Location['StateDetails'][0]['StateName'].', '.$Location['CountryDetails'][0]['CountryName'].'</p><div class="mt-3"><a href="" class="mr-1 badge badge-light">'.$Category[0]['CategoryName'].'</a></div></div></div></div><div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12"><div class="float-xl-right float-none mt-xl-0 mt-4"><a id="'.$user['BusinessId'].'" href="" data-target="#SendMsgToBusiness" data-toggle="modal" class="btn btn-secondary btnSendMsg">Send Messages</a></div></div></div></div></div></div>';
   			}

   		}


   		public function activateBusiness($businessId){
   			$updateState['activeStatus'] = 1;

   			$this->db->where(array('businessId' => $businessId))->update('businessdetails', $updateState);
   			redirect(base_url('admin/getOffersOfBusiness').'/'.$businessId);
  		}

  		public function deactivateBusiness($businessId){
   			$updateState['activeStatus'] = 0;

   			$this->db->where(array('businessId' => $businessId))->update('businessdetails', $updateState);
   			redirect(base_url('admin/getOffersOfBusiness/').'/'.$businessId);
  		}	


	}
?>
