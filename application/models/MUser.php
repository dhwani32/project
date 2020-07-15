<?php 
    
    /// this is the model to controll the user related task and functions...
    class MUser extends CI_Model{

        /// get all the user details from the database...
        public function getUserDetails($userDetails){

            $where['UserName'] = $userDetails['UserName'];
			$where['UserPassword'] = md5($userDetails['UserPassword']);

            return $this->db->where($where)->get('userdetails')->result_array();
            
        }

        /// this is the function to insert the user details in the database...
        public function insertUserDetails($userDetails){
            
			$insert['UserName'] = $userDetails['UserName'];
			$insert['UserEmail'] = $userDetails['UserEmail'];
			$insert['UserPhone'] = $userDetails['UserPhone'];
			$insert['UserPassword'] = md5($userDetails['UserPassword']);
            $insert['UserGender'] = $userDetails['UserGender'];
            $insert['JoinDate'] = date("Y/m/d");
            $insert['ReferalPoints'] = 0;
            $insert['UserAllow'] = 1;
            $insert['AreaId'] = $userDetails['AreaDropDown'];
            if($userDetails['UserGender']=='male'){
                $insert['UserImage'] = 'defaultforMen.png';
            }else{
                $insert['UserImage'] = 'defaultforWomen.png';
            }
            $insert['ReferalCode'] = $this->raferalCodeGenerator();

			$this->db->insert('userdetails', $insert);
        }





        /// this is the function to generate the unique raferal code...
        public function raferalCodeGenerator(){

            ///str_shuffle is the function to shuffle the string ...
            function random_strings($length_of_string) 
            { 
                  $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$%^&*()_-+{}[]\|abcdefghijklmnopqrstuvwxyz'; 
                  return substr(str_shuffle($str_result), 0, $length_of_string); 
            }   
            return random_strings(6).random_strings(4).random_strings(2);
        }


        public function offerNotification(){
            date_default_timezone_set('Asia/Kolkata');
              $CurrDate = date("Y-m-d",time());

            $count = $this->db->query('SELECT * FROM `subscriptiondetails` WHERE UserId='.$_SESSION['userDetails'][0]['UserId'])->result_array();

            $notification = 0;
            if(count($count) > 0){
                foreach ($count as $c) {
                    $businessDetails =  $this->db->query('SELECT * FROM `businessDetails` WHERE BusinessId='.$c['BusinessId'])->result_array();
                    // print_r($count);
                    foreach($businessDetails as $bd){
                        $offers = $this->db->query('SELECT * FROM `offers` WHERE BusinessId='.$bd['BusinessId'].' AND StartDate=\''.$CurrDate.'\'')->result_array();

                        if(count($offers) > 0){
                            $notification++;
                        }
                    }
                }
            }else{
                return 0;
            }
            return $notification;

        }


    }
