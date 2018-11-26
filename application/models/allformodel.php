<?php
class Allformodel extends CI_Model{
	public function updateImage($new_img,$id){
		$this->db->where("clinic_id",$id);
		$query = $this->db->update("general_settings",$new_img);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function updateLogo($new_img,$id){
		$this->db->where("clinic_id",$id);
		$query = $this->db->update("general_settings",$new_img);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateProfile($new_data,$id){
		$this->db->where("clinic_id",$id);
		$query = $this->db->update("general_settings",$new_data);
		return true;
	}
	
	public function addImage($new_img){
		$query = $this->db->insert("general_settings",$new_img);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function addLogo($new_img){
		$query = $this->db->insert("general_settings",$new_img);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function addProfile($new_data){
		$query = $this->db->insert("general_settings",$new_data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function getNewId(){
		$id = $this->db->query("SELECT clinic_id FROM general_settings ORDER BY id DESC LIMIT 1")->row()->clinic_id;
		$newId = $id + 1;
		return $newId;
	}
}