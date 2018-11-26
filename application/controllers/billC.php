<?php
class BillC extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}
	
	function isLogin(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	
	function interBillInfo(){
		if($this->bill_info->insert()){
			redirect(base_url()."home/pBillEntry/success");
		}else{
			redirect(base_url()."home/pBillEntry/fail");
		}
	}
}