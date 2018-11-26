<?php
class opening_closing_balance extends CI_Model{
	function closing(){
		$this->db->where("closing_date",date("Y-m-d"));
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("opening_closing_balance")->row();
	}
	
	function update($amount){
		$a = array(
			"closing_balance" => $amount
		);
		$this->db->where("closing_date",date("Y-m-d"));
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		if($this->db->update("opening_closing_balance",$a)){
			return true;
		}else{
			return false;
		}
	}
}	