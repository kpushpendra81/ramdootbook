<?php
class patient_model extends CI_Model{
	public function maxId(){
		$query = $this->db->query("SELECT id FROM patient ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			return $query->row()->id;
		}else{
			return 0;
		}
	}
	public function saveNewPatient($data){
		if($this->db->insert("patient",$data)){
			return true;
		}else{
			return false;
		}
	}
	function getById($id){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->where("patient_id",$id);
		return $this->db->get("patient");
	}
}
