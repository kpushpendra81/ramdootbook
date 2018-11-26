<?php
class Bill_info extends CI_Model{
	
	function insert(){
		$data=array(
				
				"product_quantity"=>$this->input->post("product_quantity"),
				"tpcostin"=>$this->input->post("tpcostin"),
				"vatper"=>$this->input->post("vatper"),
				"satper"=>$this->input->post("satper"),
				"round_off"=>$this->input->post("roff"),
				"freight"=>$this->input->post("freight"),
				"discount"=>$this->input->post("satper"),
				"total_prize"=>$this->input->post("total_prize"),
				"dealar_mobile1"=>$this->input->post("mobile1"),
				"dealar_mobile2"=>$this->input->post("mobile2"),
				"dealer_email"=>$this->input->post("demail"),
				"dealer_address"=>$this->input->post("daddress"),
				"product_company_name"=>$this->input->post("companyName"),
				"reff_bil_num"=>$this->input->post("billNumber"),
				
				"amount_paid"=>$this->input->post("amount_paid"),
				"balance"=>$this->input->post("balance"),
				"pay_mode"=>$this->input->post("payMode"),
				"discription"=>$this->input->post("discription"),
				"date1"=>$this->input->post("billDate"),
				"tin_no"=>$this->input->post("tin"),
				"time1"=>$this->input->post("billTime"),
				"clinic_id"=> $this->session->userdata("clinic_id"),
				"Gst"=>$this->input->post("gst"),
				"statecode"=>$this->input->post("stcode"),
				"emailid"=>$this->input->post("emailid"),
				"hsn_sac"=>$this->input->post("hsn_sac")
		);
		
		$pq = $this->input->post("product_quantity");
		for($i=1;$i<$pq+1;$i++){
			$pcheckname = $this->input->post("itemName$i");
			$product_code = $this->input->post("product_code$i");
			if(strlen($product_code)<1){
			$this->db->distinct();
			$this->db->select("product_code");
			$this->db->where("name",$pcheckname);
			$checkpd = $this->db->get("enter_stock1");
			if($checkpd->num_rows()>0){
				$product_code=$checkpd->product_code;
			}
			else{
				$md = $this->db->query("select max(product_code) as maxnumber from enter_stock1")->row();
				$product_code = $md->maxnumber+1;
			}}
		$productData = array(
				"name" => $this->input->post("itemName$i"),
				"product_code"=>$product_code,
				"company_name" => $this->input->post("itemCompanyName$i"),
				"prize_perunit" => $this->input->post("unitPrice$i"),
				"pRate" => $this->input->post("pRate$i"),
				"extraQuantity" => $this->input->post("extraQuantity$i"),
				"vat" => $this->input->post("vat$i"),
				"sat" => $this->input->post("sat$i"),
				"discount" => $this->input->post("dis$i"),
				"a_date" => date("Y-m-d"),
				"reff_bill_num" => $this->input->post("billNumber"),
				"hsn_sac"	=>$this->input->post("hsn_sac".$i),
				"clinic_id" => $this->session->userdata("clinic_id")
		         
		);
		$eq = $this->input->post("extraQuantity".$i);
		$hsn_code = $this->input->post("hsn_sac".$i);
			for($j=1;$j<$eq+1;$j++){
				if($this->input->post("serial".$i.$j)){
					$serial =array(
							"product_code"=>$product_code,
							"product_name"=>$this->input->post("itemName$i"),
							"pro_serial"=>$this->input->post("serial$i$j"),
							"bill_number"=>$this->input->post("billNumber"),
							"purchase_date" =>date("Y-m-d"),
							"status"=>"instock",
							"hsn_sac"=>$hsn_code
					);
					$this->db->insert("stock_serial",$serial);
					
					
				}
				
			}
		$this->db->insert("enter_stock1",$productData);
		}
		
		$this->load->model("opening_closing_balance");
		$closing = $this->opening_closing_balance->closing();
		$cu_closing = $closing->opening_balance - $this->input->post("amount_paid");
		$this->opening_closing_balance->update($cu_closing);
		$daybook = array(
				'paid_to'		=>$this->input->post("companyName"),
				'paid_by'		=>"Zap Computers",
				'reason'		=>"Purchase ",
				'dabit_cradit'	=>"Debit",
				'total_amount'	=>$this->input->post("total_prize"),
				'paid_amount'	=>$this->input->post("amount_paid"),
				'balance'		=>$this->input->post("balance"),
				'closing_balance'=>$cu_closing,
				'pay_date'		=>date("Y-m'd"),
				'pay_mode'		=>$this->input->post("payMode"),
				'clinic_id'		=>$this->session->userdata("clinic_id"),
				'invoice_no'	=>$this->input->post("billNumber")
		);
		$this->db->insert("day_book",$daybook);
		if($this->db->insert("bill_info",$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("bill_info")->result();
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get("bill_info");
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete("bill_info");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("sno",$id);
		$this->db->update("bill_info",$data);
	}
}