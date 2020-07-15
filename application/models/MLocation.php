<?php 

    /// this is the model for location controll and all the location related task / functions..
    class MLocation extends CI_Model{

        /// function to get the country from database...
        public function getCountry(){
            $country = $this->db->get('country')->result_array();
            return $country;
        }




        /// function to find the State form the database....
        public function getState($CountryId){
            $where['CountryId'] = $CountryId;
            $state = $this->db->where($where)->get('state')->result_array();
            return $state;
        }



        public function getLocation($AreaId){
            $data['AreaDetails'] = $this->db->query('select * from `area` where AreaId = '.$AreaId)->result_array();
            // print_r($data);
            $data['CityDetails'] = $this->db->query('select * from `city` where CityId = '.$data['AreaDetails'][0]['CityId'])->result_array();
            $data['StateDetails'] = $this->db->query('select * from `state` where StateId = '.$data['CityDetails'][0]['StateId'])->result_array();
            $data['CountryDetails'] = $this->db->query('select * from `country` where CountryId = '.$data['StateDetails'][0]['CountryId'])->result_array();

            // print_r($data);

            return $data;
        }


        public function getLocationCountry($AreaId){
            $data['AreaDetails'] = $this->db->query('select * from `area` where AreaId = '.$AreaId)->result_array();
            // print_r($data);
            $data['CityDetails'] = $this->db->query('select * from `city` where CityId = '.$data['AreaDetails'][0]['CityId'])->result_array();
            $data['StateDetails'] = $this->db->query('select * from `state` where StateId = '.$data['CityDetails'][0]['StateId'])->result_array();
            $data['CountryDetails'] = $this->db->query('select * from `country` where CountryId = '.$data['StateDetails'][0]['CountryId'])->result_array();

            // print_r($data);


            return $data['CountryDetails'][0]['CountryName'];
        }

        public function selectAllCountry(){
            return $this->db->get('country')->result_array();
        }


    }
?>