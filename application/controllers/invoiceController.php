<?php
class InvoiceController extends CI_Controller{
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
	
	function texin(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$data['info'] = $this->db->get("general_settings")->row();
		//---------------------------------------------------is Retail Customer Checking starts ---------------
		$this->db->where("salebill_no",$this->uri->segment(3));
		$is = $this->db->get("sale_bill_tex")->row();
		$data['total_info'] = $is;
		
		
		$this->db->where("patient_id",$is->customar_id);
		$val = $this->db->get("patient");
		if($val->num_rows() > 0){
			$data['is_customer'] = true;
			$data['c_detail'] = $val->row();
		}else{
			$data['is_customer'] = false;
		}
		//---------------------------------------------------is Retail Customer Checking End ---------------
		
		
		$this->db->where("bill_no",$this->uri->segment(3));
		$data['pro_detail'] = $this->db->get("product_sale")->result();
		
		$this->load->view("invoice/texinvoice",$data);
		
		
	}
	
	
	public function iFrameBill(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$data['info'] = $this->db->get("general_settings")->row();
		 //---------------------------------------------------is Retail Customer Checking starts ---------------
		$this->db->where("salebill_no",$this->uri->segment(3));
		$is = $this->db->get("sale_bill")->row();
		$data['total_info'] = $is;
		
		
		$this->db->where("patient_id",$is->customar_id);
		$val = $this->db->get("patient");		
		if($val->num_rows() > 0){
			$data['is_customer'] = true;
			$data['c_detail'] = $val->row();
		}else{
			$data['is_customer'] = false;
		}
		  //---------------------------------------------------is Retail Customer Checking End ---------------
		
		
		$this->db->where("bill_no",$this->uri->segment(3));
		$data['pro_detail'] = $this->db->get("product_sale")->result();
		
		$this->load->view("invoice/saleInvoice",$data);
	}
	
	public function iFrameBill1(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$data['info'] = $this->db->get("general_settings")->row();
		//---------------------------------------------------is Retail Customer Checking starts ---------------
		$this->db->where("salebill_no",$this->uri->segment(3));
		$is = $this->db->get("sale_bill_tex")->row();
		$data['total_info'] = $is;
	
	
		$this->db->where("patient_id",$is->customar_id);
		$val = $this->db->get("patient");
		if($val->num_rows() > 0){
			$data['is_customer'] = true;
			$data['c_detail'] = $val->row();
		}else{
			$data['is_customer'] = false;
		}
		//---------------------------------------------------is Retail Customer Checking End ---------------
	
	
		$this->db->where("bill_no",$this->uri->segment(3));
		$data['pro_detail'] = $this->db->get("product_sale")->result();
	
		$this->load->view("invoice/texinvoice",$data);
	}
	
	public function iReturnFrameBill(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$data['info'] = $this->db->get("general_settings")->row();
		//---------------------------------------------------is Retail Customer Checking starts ---------------
		$this->db->where("salebill_no",$this->uri->segment(3));
		$is = $this->db->get("return_bill")->row();
		$data['total_info'] = $is;
		
		
		$this->db->where("patient_id",$is->customar_id);
		$val = $this->db->get("patient");
		if($val->num_rows() > 0){
			$data['is_customer'] = true;
			$data['c_detail'] = $val->row();
		}else{
			$data['is_customer'] = false;
		}
		//---------------------------------------------------is Retail Customer Checking End ---------------
		
		
		$this->db->where("bill_no",$this->uri->segment(3));
		$data['pro_detail'] = $this->db->get("product_return")->result();
		
		$this->load->view("invoice/returnInvoice",$data);
	}
	
	
	public function texinvoice(){
		$data['billNo'] = $this->input->post("billdetail");
		$data['subPage'] = "Reciept";
		$data['title'] = "Tax Reciept";
		$data['smallTitle'] = "Sale / Text Reciept";
		$data['pageTitle'] = "Product Sale Reciept";
		$data['mainContent'] = "textprintfr";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	
	
	
	public function patientReport(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$data['info'] = $this->db->get("general_settings")->row();
		//---------------------------------------------------is Retail Customer Checking starts ---------------
		$this->db->where("patient_id",$this->uri->segment(3));
		$p_info = $this->db->get("patient")->row();
		$data['p_info'] = $p_info;
		$this->db->where("patient_id",$this->uri->segment(3));
		$val = $this->db->get("patient");
		if($val->num_rows() > 0){
			$data['is_customer'] = true;
			$data['c_detail'] = $val->row();
		}else{
			$data['is_customer'] = false;
		}
	 	$data['invoiceid']=	$this->uri->segment(4);
				
		$this->load->view("invoice/patientReport",$data);
	}
	
	public function printSaleReciept(){
		$data['is_return'] = false;
		$data['billNo'] = $this->uri->segment(3);
		$data['subPage'] = "Reciept";
		$data['title'] = "Sale Reciept";
		$data['smallTitle'] = "Sale / Sale Reciept";
		$data['pageTitle'] = "Product Sale Reciept";
		$data['mainContent'] = "printSaleReciept";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	public function printSaleReciept1(){
		$data['is_return'] = false;
		$data['billNo'] = $this->uri->segment(3);
	
		$data['subPage'] = "Reciept";
		$data['title'] = "Sale Reciept";
		$data['smallTitle'] = "Sale / Sale Reciept";
		$data['pageTitle'] = "Product Sale Reciept";
		$data['mainContent'] = "printSaleReciept1";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	
	public function printPurchaseReciept(){
		$data['billNo'] = $this->uri->segment(3);
		$data['subPage'] = "Reciept";
		$data['title'] = "Sale Reciept";
		$data['smallTitle'] = "Sale / Sale Reciept";
		$data['pageTitle'] = "Product Sale Reciept";
		$data['mainContent'] = "printPurchaseReciept";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
		}
		public function printPurchase(){
			$this->db->where("reff_bil_num",$this->uri->segment(3));
			$detail = $this->db->get("bill_info")->row();
			$data['det'] = $detail;
			$this->load->view("invoice/purInvoice",$data);
		}
	
	
	public function printReturnReciept(){
		$data['is_return'] = true;
		$data['billNo'] = $this->uri->segment(3);
		
		$data['subPage'] = "Reciept";
		$data['title'] = "Return Reciept";
		$data['smallTitle'] = "Sale / Return Reciept";
		$data['pageTitle'] = "Product Retrun Reciept";
		$data['mainContent'] = "printSaleReciept";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function editBillDetail(){
		$cDetail = array();
		$billNo = $this->input->post("billNo");
		
		$data['subPage'] = "Bill";
		$data['title'] = "Edit Bill";
		$data['smallTitle'] = "Sale / Edit Bill";
		$data['pageTitle'] = "Edit Bill - $billNo";
		$data['mainContent'] = "editBillDetail";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/editBillJs";
		
		
		
		$this->db->where("bill_no",$billNo);
		$billDetail = $this->db->get("product_sale");
		
		if($billDetail->num_rows() > 0){
			$data['rows'] = $billDetail->num_rows();
			$data['billDetail'] = $billDetail;
			
			$this->db->where("salebill_no",$billNo);
			$billDetail = $this->db->get("sale_bill");
			if(($billDetail->num_rows() > 0)){
				$this->db->where("patient_id",$billDetail->row()->customar_id);
				$cDetail = $this->db->get("patient");
			}
			$data['cDetail'] = $cDetail;
			$data['billNo'] = $billNo;
			
			$this->load->view("include/template",$data);
		}else{
			redirect(base_url()."home/editBill/false/$billNo");
		}
	}
}