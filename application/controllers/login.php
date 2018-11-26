<?php
class Login extends CI_Controller{
	function index(){
		if($this->session->userdata("is_login") == true){
			$this->logout();
		}
		$this->load->view("login");
	}
	
	function auth(){
		$data = $this->loginmodel->validate();
		if($data['is_login'] == 'true'){
			$this->session->set_userdata($data);
			redirect(base_url()."apanel");
		}else{
			redirect(base_url()."login/index/authFals");
		}
	}
	
	function unlock(){
		$query = $this->loginmodel->validateLock();
	
		if($query){  //if user Lock validation return true after validation
			$this->session->set_userdata('is_lock',true);
			redirect(base_url()."apanel");
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/lockPage/false");
		}
	}
	
	function logout()
	{
		$chatData = array("is_login" => false);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->update("chat",$chatData);
		
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url().'login/index.jsp');
	}
	
	function lockPage(){
		if($this->session->userdata("is_login") == false){
			redirect(base_url().'login/index.jsp');
		}
		$data['title'] = $this->session->userdata("name");
		$this->session->set_userdata('is_lock', false);
		$this->load->view("lockPage", $data);
	}
	
	function forgot(){
		$this->load->view("forgot");
	}
	
}