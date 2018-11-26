<?php
class User extends CI_Model{
	
	function insert($data){
		$this->db->insert("user",$data);
	}
	
	function getAll(){
		return $this->db->get();
	}
	
	function getById($id){
		$this->db->where("id",$id);
		return $this->db->get();
	}
	
	function getByIdPassword($id,$password){
		$this->db->where("email_id",$id);
		$this->db->where("password",$password);
		$data = $this->db->get("user");
		return $data;
	}
	
	function delete($id){
		$this->db->where("id",$id);
		$this->db->delete();
		return true;
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("user",$data);
	}
}