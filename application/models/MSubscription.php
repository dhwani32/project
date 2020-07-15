<?php

class MSubscription extends CI_Model{

  public function getSubscriptionDetails($UserId, $BusinessId){
    return $this->db->query('SELECT * FROM `subscriptiondetails` WHERE UserId='.$UserId.' AND BusinessId='.$BusinessId)->result_array();
  }

  public function getTotalSubscribersOfBusiness($BusinessId){
  	return $this->db->query('SELECT * FROM `subscriptiondetails` WHERE BusinessId='.$BusinessId)->result_array();
  }

}





?>
