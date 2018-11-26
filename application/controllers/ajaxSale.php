<?php
class AjaxSale extends CI_Controller{
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
	
	public function calVatSat(){
		$total = $this->input->post("total");
		$itemName = $this->input->post("itmeNo");
		$quantity = $this->input->post("quantity");
		
		
		
		//getting data from database table(enter_stock1) according to product name
		$this->db->where("name",$itemName);
		$this->db->limit(1);
		$result = $this->db->get("enter_stock1")->row();
		
		
		if($result->vat == 0 || $result->sat == 0):
		
			$this->db->where("reff_bil_num",$result->reff_bill_num);
			$this->db->limit(1);
			$billResult = $this->db->get("bill_info")->row();
			
			if(count($billResult) > 0):
			
				$sat = $billResult->satper;
				$vat = $billResult->vatper;
				
			else:
			
				$sat = 0;
				$vat = 0;
				
			endif;
			
			$caVat = (( $total * $vat  ) / 100);
			$caSat = (( $total * $sat ) / 100) ;
			
			$roundFigure = $total - ($caVat + $caSat);
			if(($quantity != "") && ($quantity > 0)):
			$roundFigure = $roundFigure / $quantity;
			endif;
			$data = array(
					"sat" => $sat,
					"vat" => $vat,
					"round" => $roundFigure
			);
			echo json_encode($data);
			
		else:
			
			$caVat = (( $total * $result->vat ) / 100) ;
			$caSat = (( $total * $result->sat ) / 100) ;;
			
			$roundFigure = $total - ($caVat + $caSat);
			if(($quantity != "") && ($quantity > 0)):
			$roundFigure = $roundFigure / $quantity;
			endif;
			$data = array(
					"sat" => $result->vat,
					"vat" => $result->sat,
					"round" => $roundFigure
			);
			echo json_encode($data);
			
		endif;
	}
	
	function checkStock(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("itemNo");
		
		$this->db->where("item_no",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("enter_stock");
		
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
				"msg" => "",
				"itemName" => $row->name,
				"company_name" => $row->company_name,
				"discription" => $row->discription,
				"packing" => $row->packing,
				"size_power" => $row->size_power,
				"prize_perunit" => $row->prize_perunit,
				"pRate" => $row->pRate,
				"batch_no" => $row->batch_no,
				"mf_date" => $row->mf_date,
				"exp_date" => $row->exp_date,
				"free" => $row->free,
				"item_quantity" => $row->item_quantity,
				"extraQuantity" => $row->extraQuantity,
				"a_date" => $row->a_date,
				"reff_bill_num" => $row->reff_bill_num
			);
		}
		else{
			$itemData = array(
				"itemName" => '',
				"company_name" => '',
				"size_power" => '',
				"packing" => '',
				"prize_perunit" => '',
				"pRate" => '',
				"batch_no" => '',
				"mf_date" => '',
				"exp_date" => '',
				"free" => '',
				"item_quantity" => '',
				"extraQuantity" => '',
				"a_date" => '',
				"reff_bill_num" => '',
				"clinic_id" => '',
				"msg" => $msg
			);
		}
	
		echo (json_encode($itemData));
	}
	function checkStockByName(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("name");
		
		$this->db->where("name",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("enter_stock");
		
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
					"msg" => "",
					"itemNo" => $row->item_no,
					"company_name" => $row->company_name,
					"discription" => $row->discription,
					"packing" => $row->packing,
					"size_power" => $row->size_power,
					"prize_perunit" => $row->prize_perunit,
					"pRate" => $row->pRate,
					"batch_no" => $row->batch_no,
					"mf_date" => $row->mf_date,
					"exp_date" => $row->exp_date,
					"free" => $row->free,
					"item_quantity" => $row->item_quantity,
					"extraQuantity" => $row->extraQuantity,
					"a_date" => $row->a_date,
					"reff_bill_num" => $row->reff_bill_num
			);
		}
		else{
			$itemData = array(
					"itemNo" => '',
					"company_name" => '',
					"size_power" => '',
					"packing" => '',
					"prize_perunit" => '',
					"pRate" => '',
					"batch_no" => '',
					"mf_date" => '',
					"exp_date" => '',
					"free" => '',
					"item_quantity" => '',
					"extraQuantity" => '',
					"a_date" => '',
					"reff_bill_num" => '',
					"clinic_id" => '',
					"msg" => $msg
			);
		}
		
		echo (json_encode($itemData));
	}
	function checkStockByName1(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("name");
	
		$this->db->where("name",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("enter_stock");
	
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
					"msg" => "",
					"itemNo" => $row->item_no,
					"company_name" => $row->company_name,
					"prize_perunit" => $row->prize_perunit,
					"pRate" => $row->pRate,
					"item_quantity" => $row->item_quantity,
					"extraQuantity" => $row->extraQuantity,
					"a_date" => $row->a_date,
					
			);
		}
		else{
			$itemData = array(
					"itemNo" => '',
					"company_name" => '',
					
					"prize_perunit" => '',
					"pRate" => '',
					
					"item_quantity" => '',
					"extraQuantity" => '',
					"a_date" => '',
					
					"clinic_id" => '',
					"msg" => $msg
			);
		}
	
		echo (json_encode($itemData));
	}
	
	function enterCompanyName(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("name");
	
		$this->db->where("product_company_name",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("bill_info");
	
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
					"msg" => "",
					"dealer_address" => $row->dealer_address,
					"dealer_email" => $row->dealer_email,
					"dealar_mobile1" => $row->dealar_mobile1,
					"dealar_mobile2" => $row->dealar_mobile2,
					"tin_no" => $row->tin_no
					
					
						
			);
		}
		else{
			$itemData = array(
					"dealer_address" => '',
					"dealer_email" => '',
						
					"dealar_mobile1" => '',
					"dealar_mobile2" => '',
					"tin_no" => '',
					
			);
		}
	
		echo (json_encode($itemData));
	}
	
	
	
	function getEnterStockData(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("name", "asc");
		$query = $this->db->get("enter_stock");
		foreach($query->result() as $row){
			$data[] = $row->name;
		}
		echo json_encode($data);
	}
	
	function getEnterbilldata(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("product_company_name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("product_company_name", "asc");
		$query = $this->db->get("bill_info");
		foreach($query->result() as $row){
			$data[] = $row->product_company_name;
		}
		echo json_encode($data);
	}
	
	function getData(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("name", "asc");
		$query = $this->db->get("enter_stock1");
		foreach($query->result() as $row){
			$data[] = $row->name;
		}
		echo json_encode($data);
	}
	
	function getItemData(){
		$tid = $this->input->post("name");
		$var = $this->enter_stock->getItemByName($tid);
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
				"company_name" =>$row->company_name,
					"hsn_sac" =>$row->hsn_sac,
					"product_code"=>$row->product_code
					
				
			);
			echo (json_encode($itemData));
			//echo "abc";
		}
	}
	
	function getSaleData(){
	$this->db->like("name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("name", "asc");
		$query = $this->db->get("enter_stock1");
		foreach($query->result() as $row){
			$data[] = $row->name;
		}
		echo json_encode($data);
	}
	
	function getSaleItemData(){
		$tid = $this->input->post("name");
		$var = $this->enter_stock->getItemByName($tid);
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
				"company_name" =>$row->company_name,
					"hsn_sac" =>$row->hsn_sac,
					"product_code"=>$row->product_code
					
				
			);
			echo (json_encode($itemData));
			//echo "abc";
		}
	
	}
	
	function checkQuantity(){
		$quant = $this->input->post("quant");
		$tid = $this->input->post("name");
		$billNo = $this->input->post("billNo");
		
		$this->db->where("product_id",$tid);
		$this->db->where("bill_no",$billNo);
		$product = $this->db->get("product_sale");
		
		if($product->num_rows() > 0){
			if($product->row()->product_quantity < $quant){
				echo "0";
			}
			else{
				echo $quant;
			}
		}
	}
	
}