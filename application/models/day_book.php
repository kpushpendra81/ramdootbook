<?php
class Day_book extends CI_Model{
	
	function insert($data){
		$this->db->insert("day_book",$data);
	}
	
	function getAll(){
		return $this->db->get("day_book");
	}
	
	function getById($id){
		$this->db->where("id",$id);
		return $this->db->get("day_book");
	}
	
	function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("day_book");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("day_book",$data);
	}
}