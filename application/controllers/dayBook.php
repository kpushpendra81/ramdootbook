<?php
class DayBook extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->is_login();
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	
	public function dbook(){	
		$data['subPage'] = 'Day Book';
		$data['smallTitle'] = 'Day Book Detail';
		$data['pageTitle'] = 'Day Book Detail';
		$data['title'] = 'Pain Clinic | Day Book';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'dayBook';
	
		$this->load->view("include/template", $data);
	}
	
	public function dailyExpence(){
		$data['subPage'] = 'Day Book';
		$data['smallTitle'] = 'Daily Expence';
		$data['pageTitle'] = 'Daily Expence';
		$data['title'] = 'Pain Clinic | Daily Expence';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'dailyExpense';
	
		$this->load->view("include/template", $data);
	}
	
	function saveRef(){
		$dat = array(
			"name" => $this->input->post("name"),
			"dis" => $this->input->post("dis"),
			"clinic_id" => $this->session->userdata("clinic_id"),
			"date" => date("Y-m-d")
		);
		$this->db->insert("ref",$dat);
		redirect(base_url()."home/ref.jsp");
	}
	function editRef(){
		$dat = array(
				"name" => $this->input->post("name"),
				"dis" => $this->input->post("dis"),
				"clinic_id" => $this->session->userdata("clinic_id"),
				"date" => date("Y-m-d")
		);
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("ref",$dat);
		redirect(base_url()."home/ref.jsp");
	}
	function delRef(){
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete("ref");
		redirect(base_url()."home/ref.jsp");
	}
	function rSaleList(){
		$data['subPage'] = 'Day Book';
		$data['smallTitle'] = 'Refrance List';
		$data['pageTitle'] = 'Refrance List';
		$data['title'] = 'Pain Clinic | Refrance List';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'rSaleList';
		if(strlen($this->input->post("sdt")) > 0){
			$sdt = date("Y-m-d",strtotime($this->input->post("sdt")));
			$edt = date("Y-m-d",strtotime($this->input->post("edt")));
			$id = $this->input->post("refId");
			$list = $this->db->query("SELECT SUM(product_quantity) as quant,`company_name` FROM product_sale WHERE ref='$id' AND date >= '$sdt' AND date <= '$edt' GROUP BY product_id");
			$data['list'] = $list;
			$this->db->where("id",$id);
			$val = $this->db->get("ref");
			if($val->num_rows()>0){
			$val=$val->row()->dis;
			
			$data['val'] = $val;
			}
			$data['val'] = 0;
			$data['isPost'] = true;
		}else{
			$data['isPost'] = false;
		}
		$this->load->view("include/template", $data);
	}
}