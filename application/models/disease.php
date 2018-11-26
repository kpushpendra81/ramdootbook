<?php
class Disease extends CI_Model{	
	public function getAll(){
		return $this->db->get("disease");
	}
	
	public function save($data){
		if($this->db->insert("disease",$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit($id,$data){
		$this->db->where("id",$id);
		if($this->db->update("disease",$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function getById($id){
		$this->db->where("id",$id);
		$data['val'] = $this->db->get("disease");
		if($data['val']->num_rows() > 0){
			$data['isFound'] = true;
			return $data;
		}else{
			$data['isFound'] = false;
			return $data;
		}
	}
	
	public function delete($id){
		$this->db->where("id",$id);
		if($this->db->delete("disease")){
			return true;
		}else{
			return false;
		}
	}
}