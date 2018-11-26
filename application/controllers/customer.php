<?php
class Customer extends CI_Controller{
	function cAdd(){
		$data['title'] = "New Customer";
		$data['smallTitle'] = "Customer / New Customer";
		$data['bigTitle'] = "New Customer";
		$data['body'] = "newCustomer";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/mainContent",$data);
	}
	
	function newCustomer(){
			$c_id = 1000 + $this->db->count_all("invoice_serial");
			
			$invoice = array(
					"invoice_no" => $c_id,
					"reason" => "New Customer",
					"invoice_date" => date("Y-m-d")
			);
			
			$this->db->insert("invoice_serial");
			
			$data=array(
					"c_id"=>$c_id,
					"c_name"=>$this->input->post("c_name"),
					"address"=>$this->input->post("address"),
					"mobile"=>$this->input->post("mobile"),
					"company_name"=>$this->input->post("company_name"),
					"email"=>$this->input->post("email")
			);
			$var=$this->customermodel->insert($data);
			if($var)
				redirect(base_url()."customer/cAdd/success");
	}
	
	function cSearch(){
		$data['title'] = "Search Customer";
		$data['smallTitle'] = "Customer / Search Customer";
		$data['bigTitle'] = "Search Customer";
		$data['body'] = "searchCustomer";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$this->load->view("include/mainContent",$data);
	}
	
	function deleteCustomer(){
		$id = $this->uri->segment(3);
		if($this->customermodel->delete($id)){
			redirect(base_url()."customer/cSearch");
		}
		else{
			echo '<font color="red">Somthing going wrong. Please contact developer.</font>';
		}
	}
	
	function cDetail(){
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['bigTitle'] = "Product Sale";
		$data['body'] = "saleProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/mainContent",$data);
	}
	
//--------------------------------------------------------Ajax Function For Customers ------------------------------------------------

	function cDetailAjax(){
		$cid = $this->input->post("customer_id");
		//echo $cid;
		$data['isReguler'] = true;
		$data['isReturn'] = false;
		$data['cDetail'] = $this->customermodel->getById($cid);
		$this->load->view("ajax/billCustomerDetail",$data);
	}
	
	function pBalanceAjax(){
		$cid = $this->input->post("customer_id");
		$val = $this->db->query("SELECT balance FROM sale_bill WHERE customar_id='$cid' ORDER BY s_no DESC LIMIT 1");
		if($val->num_rows() > 0){
			$v = $val->row();
			echo $v->balance;
		}else{
			echo 0;
		}
	}
	
	function returnBillAjax(){
		$billNo = $this->input->post("billNo");
		//echo $billNo;
		
		$this->db->where("salebill_no",$billNo);
		$billDetail = $this->db->get("sale_bill");
		if(($billDetail->num_rows() > 0)){
			$this->db->where("c_id",$billDetail->row()->customar_id);
			$cDetail = $this->db->get("customer");
			if(($billDetail->num_rows() > 0) && ($cDetail->num_rows() > 0)){
				$data['isReguler'] = true;
				$data['isReturn'] = true;
				$data['billDetail'] = $billDetail->row();
				$data['cDetail'] = $cDetail;
				$this->load->view("ajax/billCustomerDetail",$data);
			}elseif($billDetail->num_rows() > 0){
				$data['isReguler'] = false;
				$data['isReturn'] = true;
				$data['billDetail'] = $billDetail->row();
				$this->load->view("ajax/billCustomerDetail",$data);
			}
		}
		//$data['cDetail'] = $this->customermodel->getById($cid);
		//$this->load->view("ajax/billCustomerDetail",$data);
	}
	
	function pBalanceReturnAjax(){
		$billNo = $this->input->post("billNo");
		$this->db->where("salebill_no",$billNo);
		$billDetail = $this->db->get("sale_bill");
		if($billDetail->num_rows() > 0){
			echo $billDetail->row()->balance;
		}else{
			echo "0";
		}
	}	
}