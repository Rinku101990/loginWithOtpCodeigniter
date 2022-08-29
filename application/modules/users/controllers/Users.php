<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Users_model",'Users');	
      	/* ========FOR MASTER TABEL=========== */ 	
		$this->fld_mid='mst_id';		
		$this->fld_email="mst_email";	
		$this->fld_password="mst_password";	
		$this->table_master="tbl_master"; 	
	}
	

	public function index()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['users'] = $this->Users->get_all_user_list($this->fld_mid,$this->table_master);
		$content['subview']="users/users_list";
		$this->load->view('layout', $content);
	}

	public function add()
	{	
		$content['users']=$this->Users->single_list($this->table_master);		
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){ 		
			$check_email=$this->Users->check_email($this->fld_email,$this->input->post('mst_email'),$this->table_master);
			if(empty($check_email)){
				$data = array(
					'mst_ref_id' => $this->input->post('mst_ref_id'), 
					'mst_name' =>$this->input->post('mst_name'),
					'mst_email' => $this->input->post('mst_email'), 
					'mst_password' => md5($this->input->post('mst_password')),
					'mst_mobile_number' => $this->input->post('mst_mobile_number'),
					'mst_role' => '1', 
					'mst_status' => $this->input->post('mst_status'),			
					'mst_updated' => date('Y-m-d H:i:s'),
					'mst_created' => date('Y-m-d H:i:s')
				);
				// echo "<pre>";
				// print_r($data);die;
				$result = $this->Users->save_user($data,$this->table_master);
				if($result){
					$this->session->set_flashdata('msg',array('message' => 'User added successfully.','class' => 'success','type'=>'Ok!'));
					redirect('users/add');
				}else{
					$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
					redirect('users/add');
				} 
			}else{
				$this->session->set_flashdata('msg',array('message' => 'email address already used .','class' => 'danger','type'=>'Oops!'));
					redirect('users/add');
			}
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="users/user_add";
		$this->load->view('layout', $content);
	}

	public function remove($id=null)
	{   
		if(!empty($id)){			
			$Action = $this->Users->delete_single($this->fld_mid,$id,$this->table_master);
			if($Action){
				$this->session->set_flashdata('msg',array('message' => 'User deleted successfully.','class' => 'success','type'=>'Ok!'));
				redirect('users');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('users');
			}
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
		    $content['subview']="users/badrequest";
		    $this->load->view('layout', $content);
		}
	}

	
}
