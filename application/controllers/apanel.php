<?php
class Apanel extends CI_Controller{
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
	
	function chat() {
		$data['subPage'] = 'Video Chat';
		$data['smallTitle'] = 'Chat';
		$data['pageTitle'] = 'Video Chat';
		
		$data['title'] = 'Ram Doot Sales & Services | Dashboard';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/messageJs';
		$data['mainContent'] = 'googleChat';
		$this->load->view("include/template", $data);
	}
	function chatBranch() {
		$data['subPage'] = 'Video Chat';
		$data['smallTitle'] = 'Chat';
		$data['pageTitle'] = 'Video Chat';
	
		$data['title'] = 'Ram Doot Sales & Services | Dashboard';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/messageJs';
		$data['mainContent'] = 'googleChatBranch';
		$this->load->view("include/template", $data);
	}
	
	function index(){
		// Opening balance closing balance code start
		$clinic_id = $this->session->userdata("clinic_id");
		$clo1 = $this->db->query("select * from opening_closing_balance WHERE clinic_id = '$clinic_id' ORDER BY id DESC LIMIT 1");
		$clo = $clo1->row();
		if($clo1->num_rows() <=0 ){
			$balance = array(
				"opening_balance" => 0,
				"closing_balance" => 0,
				"clinic_id" => $clinic_id,
				"opening_date" => date("Y-m-d"),
				"closing_date" => date("Y-m-d")			);
			$this->db->insert('opening_closing_balance',$balance);
		}else{
			$cl_date = $clo->closing_date;
			$cl_balance = $clo->closing_balance;
			$cr_date = date('Y-m-d');
			if($cl_date != $cr_date)
			{
				$balance = array(
						"opening_balance" => $cl_balance,
						"closing_balance" => $cl_balance,
						"clinic_id" => $clinic_id,
						"opening_date" => $cr_date,
						"closing_date" => $cr_date
				);
				$this->db->insert('opening_closing_balance',$balance);
			}
			// Opening balance closing balance code end
		}
		$data['subPage'] = 'Home';
		$data['smallTitle'] = 'Dashboard';
		$data['pageTitle'] = 'Overview of all Section';
		
		
		$data['title'] = 'Ram Doot Sales & Services | Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("include/template", $data);
	
	}
	
	function message(){
		$data['subPage'] = 'Inbox';
		$data['smallTitle'] = 'Message';
		$data['pageTitle'] = 'Inbox';
		
		$data['title'] = 'Ram Doot Sales & Services | Dashboard';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/messageJs';
		$data['mainContent'] = 'message';
		$this->load->view("include/template", $data);
	}
	
	function profile(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Profile';
		$data['pageTitle'] = 'Your Profile';
		$data['title'] = 'Ram Doot Sales & Services | Profile';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'profile';
		
		$this->load->view("include/template", $data);
	}
	
	function getSubject(){
		$class_id = $this->input->post("classid");
		$this->db->where("bookclass_id",$class_id);
		$vt = $this->db->get("booksubject");
		?><option value="">-Select Subject-</option>
											<?php 
											foreach($vt->result() as $v):?>
											<option value="<?php echo $v->id;?>"><?php echo $v->booksubject;?></option>
											<?php endforeach;
	}
	
	function addprofile(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'New Branch';
		$data['pageTitle'] = 'Add New Branch';
		$data['title'] = 'Ram Doot Sales & Services | New Branch';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'newBranch';
	
		$this->load->view("include/template", $data);
	}
	
	function branchList(){
		$data['subPage'] = 'Branch';
		$data['smallTitle'] = 'Branch List';
		$data['pageTitle'] = 'Branch List';
		$data['title'] = 'Ram Doot Sales & Services | Branch List';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'branchList';
		
		$data['branchList'] = $this->db->get("general_settings");
		$this->load->view("include/template", $data);
	}
	
	function newDisease(){
		$data['subPage'] = 'Service';
		$data['smallTitle'] = 'New Service';
		$data['pageTitle'] = 'Service';
		$data['title'] = 'Ram Doot Sales & Services | Service';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'newDisease';
		
		$this->load->view("include/template", $data);
	}
	
	function diseaseList(){
		$data['subPage'] = 'Service';
		$data['smallTitle'] = 'Service List';
		$data['pageTitle'] = 'Service List';
		$data['title'] = 'Ram Doot Sales & Services | Service List';
		$data['headerCss'] = 'headerCss/listCss';
		$data['footerJs'] = 'footerJs/listJs';
		$data['mainContent'] = 'diseaseList';
	
		$this->load->view("include/template", $data);
	}
		
	function changePass(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Change Password';
		$data['pageTitle'] = 'Change Password';
		$data['title'] = 'Ram Doot Sales & Services | Change Password';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'cPass';
	
		$data['branchList'] = $this->db->get("general_settings");
		$this->load->view("include/template", $data);
	}
	
	function test(){
		$this->load->view("test");
	}
}