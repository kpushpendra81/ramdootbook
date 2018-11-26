<?php
class Customermodel extends CI_Model{
	function insert($data){
		$this->db->insert("customer",$data);
		return true;
	}
	
	function getAll(){
		return $this->db->get("customer");
	}
	
	function getById($id){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->where("c_id",$id);
		return $this->db->get("customer");
	}
	
	function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("customer");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("c_id",$id);
		$this->db->update("bill_info",$data);
		return true;
	}
}