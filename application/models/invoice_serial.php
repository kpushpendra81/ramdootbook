<?php
class Invoice_serial extends CI_Model{
	function insert($data){
		$this->db->insert("invoice_serial",$data);
		return true;
	}
	function graterId(){
		return $this->db->query("SELECT id FROM invoice_serial ORDER BY id DESC LIMIT 1")->row()->id;
	}
}