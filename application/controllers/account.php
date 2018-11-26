<?php
class Account extends CI_Controller{
	function dailyExpense(){
		$name = $this->input->post("name");
		$reason = $this->input->post("reason");
		$paid = $this->input->post("paid");
		$balance = $this->input->post("balance");
		
		$n = 1000 + $this->invoice_serial->graterId();
		$invoice_no = "PCV".$n;
		
		$clbalance = $balance - $paid;
		
		$in = array(
				"invoice_no" => $invoice_no,
				"reason" => $reason,
				"invoice_date" => date("Y-m-d")
		);
		$dayBook = array(
				"paid_to" => $name,
				"paid_by" => $this->session->userdata("username"),
				"reason" => "(dailyExpense) ".$reason,
				"dabit_cradit" => "dabit",
				"amount" => $paid,
				"closing_balance" => $clbalance,
				"pay_date" => date("Y-m-d"),
				"pay_mode" => "Cash",
				"clinic_id" => $this->session->userdata("clinic_id"),
				"invoice_no" => $invoice_no
		);
		
		$a = $this->invoice_serial->insert($in);
		$b = $this->opening_closing_balance->update($clbalance);
		$c = $this->day_book->insert($dayBook);
		
		if($a && $b && $c){
			redirect(base_url()."dayBook/dailyExpence/true");
		}else{
			redirect(base_url()."dayBook/dailyExpence/false");
		}
	}
	public function dayBookDetail(){
		$dt1 = date("Y-m-d", strtotime($this->input->post("sdt")));
		$dt2 =  date("Y-m-d", strtotime($this->input->post("edt")));
		$detailType = $this->input->post("detailType");
		$drCr = $this->input->post("drCr");
		$branchId = $this->input->post("branchId");
		if($branchId == 'all'){
			if($drCr == "all"):
				$a = $this->db->query("select * from day_book where pay_date >= '$dt1' AND pay_date <= '$dt2'");
				$track = "1";
			else:
				$a = $this->db->query("select * from day_book where dabit_cradit = '$drCr' AND pay_date >= '$dt1' AND pay_date <= '$dt2'");
				$track = "2";
			endif;
		}else{
			if($drCr == "all"):
				$track = "3";
				$a = $this->db->query("select * from day_book where pay_date >= '$dt1' AND pay_date <= '$dt2' AND clinic_id='$branchId'");
			else:
				$track = "4";
				$a = $this->db->query("select * from day_book where dabit_cradit = '$drCr' AND pay_date >= '$dt1' AND pay_date <= '$dt2' AND clinic_id='$branchId'");
			endif;
		}
		$b = $a->num_rows();
			$data['table'] = $a;
			$data['subPage'] = 'Day Book';
			$data['smallTitle'] = 'Day Book';
			$data['pageTitle'] = 'Day Book Detail';
			$data['title'] = 'Pain Clinic | Day Book';
			$data['headerCss'] = 'headerCss/patientCss';
			$data['footerJs'] = 'footerJs/patientJs';
			$data['mainContent'] = 'dayBookDetail';
			
			$this->load->view("include/template", $data);
	}
}