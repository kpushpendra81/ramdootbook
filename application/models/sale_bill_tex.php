<?php
class Sale_bill_tex extends CI_Model{
	
	function insert($data){
		$this->db->insert("sale_bill_tex",$data);
	}
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$val= $this->db->get("sale_bill_tex");
		if($val)
		{
			return true;
		}else
		{
			return false;
		}
	}
	
	function getById($id){
		$this->db->where("s_no",$id);
		return $this->db->get("sale_bill_tex");
	}
	
	function delete($id){
		$this->db->where("s_no",$id);
		$this->db->delete("sale_bill_tex");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("salebill_no",$id);
		$this->db->update("sale_bill_tex",$data);
	}
}