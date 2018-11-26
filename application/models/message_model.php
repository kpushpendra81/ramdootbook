<?php
class message_model extends CI_Model{
	function getInbox(){
		$this->db->where("reciever_id",$this->session->userdata("username"));
		return $this->db->get("message");
	}
	function getSent(){
		$this->db->where("sender_id",$this->session->userdata("username"));
		return $this->db->get("message");
	}
	function getById($id){
		$this->db->where("id",$id);
		return $this->db->get("message");
	}
}