<?php
class Product_sale extends CI_Model{
	
	function insert($data){
		$this->db->insert("product_sale",$data);
	}
	
	function getAll(){
		return $this->db->get();
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get();
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete();
		return true;
	}
	
	
}