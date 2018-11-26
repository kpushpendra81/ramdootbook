<?php
class Sale_bill extends CI_Model{
	
	function insert($data){
		$this->db->insert("sale_bill",$data);
	}
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("sale_bill");
	}
	
	function getById($id){
		$this->db->where("s_no",$id);
		return $this->db->get("sale_bill");
	}
	
	function delete($id){
		$this->db->where("s_no",$id);
		$this->db->delete("sale_bill");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("salebill_no",$id);
		$this->db->update("sale_bill",$data);
	}
}