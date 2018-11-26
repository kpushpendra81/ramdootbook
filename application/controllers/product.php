<?php
class Product extends CI_Controller{
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
	
	function saleProduct(){
		$dt = date("Y-m-d");
		$billno = "ZAPS".date("dmy",strtotime($dt)).(0 + $this->db->count_all("invoice_serial"));
		
		$invoiceData = array(
				"invoice_no" => $billno,
				"reason" => "Sale Product",
				"invoice_date" => date("Y-m-d")
		);
		
		if(strlen($this->input->post("regular")) > 0){
			$customer = $this->input->post("regular");
		}else{
			$customer = $this->input->post("retail");
		}
		
		$singleProductDataArray = Array();
		$totvat=	0;
		$totsat = 	0;
		$total= 0;
		for($i=1; $i<=30;$i++){
			
			if(strlen($this->input->post("item_name$i")) > 0){
				$total= $total + $this->input->post("total_price$i");
				$totvat = $totvat+$this->input->post("vat$i");
				$totsat = $totsat+$this->input->post("sat$i");
				$singleProductData = array(
					"company_name" => $this->input->post("item_name$i"),
					"prise_per_pro" => $this->input->post("item_price$i"),
					"product_quantity" => $this->input->post("item_quantity$i"),
					"discount" => $this->input->post("item_discount$i"),
					"discount_rate" => $this->input->post("discount$i"),
					"sub_total" => $this->input->post("sub_total$i"),
					"chalan_num"=>$this->input->post("chalan_num"),
						"sat" => $this->input->post("vat$i"),
						"vat" => $this->input->post("sat$i"),
						
					"total"=> $this->input->post("total_price$i"),
					"discount"=> $this->input->post("discount"),
					"bill_no" =>	$billno,
					"ref"=> $this->input->post("ref"),
					"date"=> date("Y-m-d"),
					"clinic_id" => $this->session->userdata("clinic_id")
				);	
				$itmq = $this->input->post("item_quantity$i");
				for($d=1;$d<$itmq+1;$d++){
					$upt=$this->input->post("serial$i$d");
					if($upt){
					$data=array(
							
							"status"=>"outstock",
							"sale_bill_number"=>$billno,
							"sale_date"=>date("Y-m-d")
					);
					$this->db->where("pro_serial",$upt);
					$this->db->update("stock_serial",$data);
					
				}
			}
				$singleProductDataArray[] = $singleProductData;
			}
		}
		$vatper = (($totvat*100)/$total);
		$satper = (($totsat*100)/$total);
		$rAmt = ($this->input->post("total") * $this->input->post("dis"))/100;
		$billTotalData = array(
				"customar_id" => $customer,
				"remark" => $this->input->post("remark"),
				"salebill_no" =>$billno,
				"chalan_num"=>$this->input->post("chalan_num"),
				"date"=> date("Y-m-d"),
				"pri_balance" => $this->input->post("p_balance"),
				"paid" => $this->input->post("paid"),
				"total" => $this->input->post("total"),
				"balance" =>  $this->input->post("balance"),
				"vat_per" =>$vatper,
				"vat_rs"=> $satper,
				"ref_id"=> $this->input->post("ref"),
				"discount"=> $this->input->post("discount"),
				"ref_amount"=> $rAmt,
				"clinic_id" => $this->session->userdata("clinic_id")
		);
		

		
		$data2 = array();
		if(strlen($this->input->post("regular"))>0){ // Customer Name
			$data2 = array(
					"customar_name"=>$this->input->post("regular")
			);
		}
		else if(strlen($this->input->post("retail"))>0){ // Customer ID
			$data2 = array(
					"customar_id"=>$this->input->post("retail")
			);
		}
		
		
		$daybook=array(
				"total_amount" => $this->input->post("paid"),
				"balance"	=> $this->input->post("balance"),
				"pay_date"=> date("Y-m-d"),
				"reason" =>"From sale Stock",
				"pay_mode"=>$this->input->post("pay_mode"),
				"dabit_cradit" => "cradit",
				"paid_by"=>$customer,
				"clinic_id" => $this->session->userdata("clinic_id"),
				"invoice_no" =>$billno
		);
		
		
		$this->db->where("opening_date",date('Y-m-d'));
		$clb = $this->db->get("opening_closing_balance")->row()->closing_balance;
		$clb = $clb + ($this->input->post("paid"));
		$balance = array(
				"closing_balance" => $clb
		);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->update('opening_closing_balance',$balance);
		
		/*
		
		foreach($singleProductDataArray as $dt):
			print_r($dt);
			echo "<br/><br/>";
		endforeach;
		
		*/
		
		$this->db->trans_begin(); // Query will be rolled back
		foreach($singleProductDataArray as $dt):
			$this->product_sale->insert($dt);
			//$this->product_sale->saleUpdate($dt->bill_no,$dt->company_name);
		endforeach;
		$this->sale_bill->insert($billTotalData);
		$this->day_book->insert($daybook);
		$this->invoice_serial->insert($invoiceData);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
		}
		else
		{
			$this->db->trans_commit();
			
			$val=$this->db->get("sms_setting")->row();
			$senderiD=$val->sender_id;
			$authkey=$val->auth_key;
			$this->db->where("c_id",$customer);
			$mnumber=$this->db->get("customer")->row();
			if($mnumber){
				$mn=$mnumber->mobile;
			$this->load->helper("sms");
			$msg =	"THANKS FOR purchasing from  Ram Doot Sales & Services ,with tha amount of ".$this->input->post("paid");
			
			sms($authkey,$msg,$senderiD,$mn);
			}
			else{
				$this->db->where("patient_id",$customer);
				$mnumber=$this->db->get("patient")->row();
				$mn=$mnumber->mobile;
				$this->load->helper("sms");
				$msg =	"THANKS FOR purchasing from  Ram Doot Sales & Services , with tha amount of ".$this->input->post("paid");
					
				sms($authkey,$msg,$senderiD,$mn);
			}
			
			redirect("invoiceController/printSaleReciept/$billno");
		}
		
	}
	
	function saleProduct1(){
	$dt = date("Y-m-d");
		$billno = "ZAPS".date("dmy",strtotime($dt)).(0 + $this->db->count_all("invoice_serial"));
		
		$invoiceData = array(
				"invoice_no" => $billno,
				"reason" => "Sale Product",
				"invoice_date" => date("Y-m-d")
		);
		
		if(strlen($this->input->post("regular")) > 0){
			$customer = $this->input->post("regular");
		}else{
			$customer = $this->input->post("retail");
		}
		
		$singleProductDataArray = Array();
		$totvat=	0;
		$totsat = 	0;
		$total= 0;
		$upt1="Serial no:-";
		for($i=1; $i<=30;$i++){
			if(strlen($this->input->post("item_name$i")) > 0){
				$itmq = $this->input->post("item_quantity$i");
				for($d=1;	$d<$itmq+1;	$d++){
					$rt=$this->input->post("serial$i$d");
					$upt1=$upt1.",".$rt;;
					$upt=$this->input->post("serial$i$d");
					if($upt){
						$data=array(
									
								"status"=>"outstock",
								"sale_bill_number"=>$billno,
								"sale_date"=>date("Y-m-d")
						);
						$this->db->where("pro_serial",	$upt);
						$this->db->update("stock_serial",	$data);
							
					}
				}
					$total= $total + $this->input->post("total_price$i");
				$totvat = $totvat+$this->input->post("vat$i");
				$totsat = $totsat+$this->input->post("sat$i");
				$singleProductData = array(
					"hsn_sac"=>$this->input->post("hsn_sac$i"),
						"product_code"=>$this->input->post("product_code$i"),
						"serial_number"=>$upt1,
						"company_name"=>$this->input->post("company_name$i"),
						"item_name" => $this->input->post("item_name$i"),
					"prise_per_pro" => $this->input->post("item_price$i"),
					"product_quantity" => $this->input->post("item_quantity$i"),
					"discount" => $this->input->post("item_discount$i"),
					"discount_rate" => $this->input->post("discount$i"),
					"sub_total" => $this->input->post("sub_total$i"),
					"chalan_num"=>$this->input->post("chalan_num"),
						
						"sat" => $this->input->post("vat$i"),
						"vat" => $this->input->post("sat$i"),
						
					"total"=> $this->input->post("total_price$i"),
					"discount"=> $this->input->post("discount"),
					"bill_no" =>	$billno,
					"ref"=> $this->input->post("ref"),
					"date"=> date("Y-m-d"),
					"clinic_id" => $this->session->userdata("clinic_id")
				);	
				
				
				$singleProductDataArray[] = $singleProductData;
			}
		}
		$vatper = (($totvat*100)/$total);
		$satper = (($totsat*100)/$total);
		$rAmt = ($this->input->post("total") * $this->input->post("dis"))/100;
		$billTotalData = array(
				"customar_id" => $customer,
				"remark" => $this->input->post("remark"),
				"salebill_no" =>$billno,
				"date"=> date("Y-m-d"),
				"pri_balance" => $this->input->post("p_balance"),
				"chalan_num"=>$this->input->post("chalan_num"),
				"paid" => $this->input->post("paid"),
				"total" => $this->input->post("total"),
				"balance" =>  $this->input->post("balance"),
				"vat_per" =>$vatper,
				"vat_rs"=> $satper,
				"ref_id"=> $this->input->post("ref"),
				"discount"=> $this->input->post("discount"),
				"ref_amount"=> $rAmt,
				"clinic_id" => $this->session->userdata("clinic_id")
		);
		

		
		$data2 = array();
		if(strlen($this->input->post("regular"))>0){ // Customer Name
			$data2 = array(
					"customar_name"=>$this->input->post("regular")
			);
		}
		else if(strlen($this->input->post("retail"))>0){ // Customer ID
			$data2 = array(
					"customar_id"=>$this->input->post("retail")
			);
		}
		
		
		$daybook=array(
				"total_amount" => $this->input->post("paid"),
				"balance"	=> $this->input->post("balance"),
				"pay_date"=> date("Y-m-d"),
				"reason" =>"From sale Stock",
				"pay_mode"=>"Cash, ".$billno,
				"pay_mode"=>$this->input->post("pay_mode"),
				"dabit_cradit" => "cradit",
				"paid_by"=>$customer,
				"clinic_id" => $this->session->userdata("clinic_id"),
				"invoice_no" =>$billno
		);
		
		
		$this->db->where("opening_date",date('Y-m-d'));
		$clb = $this->db->get("opening_closing_balance")->row()->closing_balance;
		$clb = $clb + ($this->input->post("paid"));
		$balance = array(
				"closing_balance" => $clb
		);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->update('opening_closing_balance',$balance);
		
		/*
		
		foreach($singleProductDataArray as $dt):
			print_r($dt);
			echo "<br/><br/>";
		endforeach;
		
		*/
		
		$this->db->trans_begin(); // Query will be rolled back
		foreach($singleProductDataArray as $dt):
			$this->product_sale->insert($dt);
			//$this->product_sale->saleUpdate($dt->bill_no,$dt->company_name);
		endforeach;
	$this->db->insert("sale_bill_tex",$billTotalData);
		$this->day_book->insert($daybook);
		$this->invoice_serial->insert($invoiceData);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
		}
		else
		{
		$this->db->trans_commit();
			
		/*	$val=$this->db->get("sms_setting")->row();
			$senderiD=$val->sender_id;
			$authkey=$val->auth_key;
			$this->db->where("c_id",$customer);
			$mnumber=$this->db->get("customer")->row();
			if($mnumber){
				$mn=$mnumber->mobile;
			$this->load->helper("sms");
			$msg =	"THANKS FOR purchasing from  Ram Doot Sales & ServicesS ,with tha amount of ".$this->input->post("paid");
			
			sms($authkey,$msg,$senderiD,$mn);
			}
			else{
				$this->db->where("patient_id",$customer);
				$mnumber=$this->db->get("patient")->row();
				$mn=$mnumber->mobile;
				$this->load->helper("sms");
				$msg =	"THANKS FOR purchasing from  Ram Doot Sales & ServicesS , with tha amount of ".$this->input->post("paid");
					
				sms($authkey,$msg,$senderiD,$mn);
			}*/
				
			redirect("invoiceController/printSaleReciept1/$billno");
		}
		
	}
		
	
	function returnProduct(){
		$dt = date("Y-m-d");
		$billno = $this->input->post("billNo");
		
		$this->db->where("salebill_no",$billno);
		$is_returned = $this->db->get("return_bill");
		
		if($is_returned->num_rows() <= 0){
			//----------------------------------------- Total Bill Detail -------------------------------------
			$billTotalData = array(
					"customar_id" => $this->input->post("c_id"),
					"remark" => $this->input->post("remark"),
					"salebill_no" =>$billno,
					"date"=> date("Y-m-d"),
					"pri_balance" => $this->input->post("p_balance"),
					"paid" => $this->input->post("paid"),
					"total" => $this->input->post("total"),
					"balance" =>  $this->input->post("balance"),
					"vat_per" => "0.00",
					"vat_rs"=> "0.00",
					"clinic_id" => $this->session->userdata("clinic_id")
			);
			$totalBill = $this->db->insert("return_bill",$billTotalData);
			
			//----------------------------------------- Day Book Detail -------------------------------------
			$daybook=array(
					"amount" => $this->input->post("paid"),
					"pay_date"=> date("Y-m-d"),
					"reason" =>"From Return Stock",
					"dabit_cradit" => "dabit",
					"pay_mode"=>"Cash, ".$billno,
					"paid_by"=>$this->input->post("c_id"),
					"paid_to" => $this->session->userdata("username"),
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" =>$billno
			);
			$daybook1 = $this->db->insert("day_book",$daybook);
			
			//----------------------------------------- Opening Closing Balance Update -------------------------------------
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
			$clb = $this->db->get("opening_closing_balance")->row()->closing_balance;
			$clb = $clb - ($this->input->post("paid"));
			$balance = array(
					"closing_balance" => $clb
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
			$clBalance = $this->db->update('opening_closing_balance',$balance);
			// Opening balance closing balance code end		
			
			//----------------------------------------- Items Detail -------------------------------------
			for($i=1; $i<=30;$i++){
				if(strlen($this->input->post("item_no$i")) > 0){
			
					$singleProductData = array(
							"product_id" => $this->input->post("item_no$i"),
							"company_name" => $this->input->post("item_comp$i"),
							"prise_per_pro" => $this->input->post("item_price$i"),
							"product_quantity" => $this->input->post("item_quantity$i"),
							"discount" => $this->input->post("item_discount$i"),
							"discount_rate" => $this->input->post("discount$i"),
							"sub_total" => $this->input->post("sub_total$i"),
							"total"=> $this->input->post("total_price$i"),
							"bill_no" =>$billno,
							"ref"=> $this->input->post("ref"),
							"date"=> date("Y-m-d"),
							"clinic_id" => $this->session->userdata("clinic_id")
					);
					$q = $this->input->post("item_quantity$i");
					$ino = $this->input->post("item_no$i");
					$this->db->query("UPDATE enter_stock SET item_quantity = item_quantity + $q WHERE item_no = '$ino'");
					
					$this->db->insert("product_return",$singleProductData);
				}
			}
			
			
			//----------------------------------------- Redirect Print Bill -------------------------------------
			if($totalBill && $daybook1 && $clBalance){
				redirect("invoiceController/printReturnReciept/$billno");
			}
		}else{
			echo "This bill ".$billno." already returned. Please check Bill return Detail. <a href='".base_url()."home/returnProduct'>Go Back</a>";
		}
		
	}
	
	public function editBill(){
		$dt = date("Y-m-d");
		$billNo = $this->input->post("billNo");
		
		$this->db->where("salebill_no",$billNo);
		$is_returned = $this->db->get("sale_bill");
		
		if($is_returned->num_rows() > 0){
			//----------------------------------------- Total Bill Detail -------------------------------------
			$billTotalData = array(
					"remark" => $this->input->post("remark"),
					"salebill_no" =>$billNo,
					"date"=> date("Y-m-d"),
					"pri_balance" => $this->input->post("p_balance"),
					"paid" => $this->input->post("paid"),
					"total" => $this->input->post("total"),
					"balance" =>  $this->input->post("balance")
			);
			$this->db->where("salebill_no",$billNo);
			$totalBill = $this->db->update("sale_bill",$billTotalData);
				
			//----------------------------------------- Day Book Detail -------------------------------------
			$daybook=array(
					"amount" => $this->input->post("paid"),
					"pay_date"=> date("Y-m-d"),
					"reason" =>"From Return Stock",
					"pay_mode"=>"Cash, ".$billNo,
					"dabit_cradit" => "dabit",
					"paid_by"=>$this->input->post("c_id"),
					"paid_to" => $this->session->userdata("username"),
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" =>$billno
			);
			$mode = "Cash, ".$billNo;
			$this->db->where("pay_mode",$mode);
			$daybook1 = $this->db->update("day_book",$daybook);
				
			//----------------------------------------- Opening Closing Balance Update -------------------------------------
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
			$clb = $this->db->get("opening_closing_balance")->row()->closing_balance;
			$clb = $clb - ($this->input->post("paid"));
			$balance = array(
					"closing_balance" => $clb
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
			$clBalance = $this->db->update('opening_closing_balance',$balance);
			// Opening balance closing balance code end
				
			//----------------------------------------- Items Detail -------------------------------------
			for($i=1; $i<=30;$i++){
				if(strlen($this->input->post("item_no$i")) > 0){
						
					$singleProductData = array(
							"product_id" => $this->input->post("item_no$i"),
							"company_name" => $this->input->post("item_comp$i"),
							"prise_per_pro" => $this->input->post("item_price$i"),
							"product_quantity" => $this->input->post("item_quantity$i"),
							"discount" => $this->input->post("item_discount$i"),
							"discount_rate" => $this->input->post("discount$i"),
							"sub_total" => $this->input->post("sub_total$i"),
							"total"=> $this->input->post("total_price$i"),
							"bill_no" =>$billNo,
							"ref"=> $this->input->post("ref"),
							"date"=> date("Y-m-d"),
							"clinic_id" => $this->session->userdata("clinic_id")
					);
					$q = $this->input->post("old_item_quantity$i") - $this->input->post("item_quantity$i");
					
					
					$ino = $this->input->post("item_no$i");
					$this->db->query("UPDATE enter_stock SET item_quantity = item_quantity + $q WHERE item_no = '$ino'");
						
					$this->db->where("product_id",$this->input->post("item_no$i"));
					$this->db->where("bill_no",$billNo);
					$this->db->update("product_sale",$singleProductData);
				}
			}
				
				
			//----------------------------------------- Redirect Print Bill -------------------------------------
			
				redirect("invoiceController/printSaleReciept/".$billNo."");
		}
	}
	
	public function deleteProduct(){
		$id = $this->uri->segment(3);
		if($this->enter_stock->delete($id)){
			redirect(base_url()."home/productDetail");
		}else{
			echo '<font color="red">Somthing going wrong. Plese contact to Gfinch.';
		}
	}
}