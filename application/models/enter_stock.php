<?php
class Enter_stock extends CI_Model{
	
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("enter_stock1");
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get("enter_stock");
	}
	
	function getItemByName($name){
		$this->db->where("name",$name);
		return $this->db->get("enter_stock1");
	}
	
	function getItem($itemNo){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->where("item_no",$itemNo);
		return $this->db->get("enter_stock1");
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete("enter_stock");
		return true;
	}
	
	function update(){
		$stockData = array(
				"item_no" => $this->input->post("itemNo"),
				"name" => $this->input->post("itemName"),
				"company_name" => $this->input->post("itemCompanyName"),
				"prize_perunit" => $this->input->post("unitPrice"),
				"pRate" => $this->input->post("pRate"),
				"item_quantity" => $this->input->post("extraQuantity") + $this->input->post("itemQuantity"),
				"extraQuantity" => $this->input->post("extraQuantity"),
				"a_date" => date("Y-m-d"),
				"reff_bill_num" => $this->input->post("bill_no"),
				"clinic_id" => $this->session->userdata("clinic_id")
		);
		$this->db->where("item_no",$this->input->post("itemNo"));
		if($this->db->update("enter_stock",$stockData)){
			return true;
		}else{
			return false;
		}
	}
	
	function saleUpdate($data){
		$this->db->select("item_quantity");
		$this->db->where("name",$data['product_id']);
		$var = $this->db->get("enter_stock1");
		
		if($var->num_rows() > 0):
			$row = $var->row();
			$q = $row->item_quantity;
			$data1 = array(
				"item_quantity" => ($q - $data["product_quantity"])
			);
			$this->db->where("item_no",$data["product_id"]);
			if($this->db->update("enter_stock",$data1)){
				return true;
			}
			else{
				return false;
			}
		else:
			return false;
		endif;
	}
}