<?php
class treatment_model extends CI_Model{
	public function saveDetail($data){
		if($this->db->insert("treatement",$data)){
			return true;
		}else{
			return false;
		}
	}
}