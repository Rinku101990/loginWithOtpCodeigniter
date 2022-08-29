<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->library("security");			
		$this->load->helper("common");			
		$this->load->model("Login_Model");	
		/* ========FOR MASTER TABEL=========== */ 			
		$this->fld_email="mst_email";	
		$this->fld_password="mst_password";	
		$this->table_master="tbl_master"; 
    }
  
	// Change Method name if login using email and password-index
    // public function login_with_email_password() 
	// {	
	//     if(($this->session->userdata('logged_in_admin')!==NULL)){
	// 		  redirect('dashboard');
	// 	}else{
	// 		  $this->load->view('login');	
	// 	}
	// }
	// This method for login with email and password
	// public function verify()
	// {
	// 	$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
	// 	if($REQUESTMETHOD=='POST'){
			
	// 		$useremail=$this->input->post('email');
	// 		$userpassword=md5($this->input->post('password'));
	// 	    $email = $this->security->xss_clean($useremail);	
	// 	    $password = $this->security->xss_clean($userpassword);	
			
	// 		if(!empty($email) || !empty($password)){
	// 			$result =$this->Login_Model->login($email, $password,$this->table_master); 
	// 			if($result) {
	// 			  if($result->mst_status=="active"){					
	// 				$this->session->set_userdata('logged_in_admin',$result);
	// 				$this->session->set_flashdata('msg', array('message' => 'you have successfully logged in.','class' => 'success','type'=>'Congratulation !'));
	// 				redirect('dashboard');
	// 				} else {
	// 				   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode.Contact administrator.','class' => 'warning','type'=>'Oops!'));
	// 				   redirect('login');
	// 				}
	// 			}else{
	// 			    $this->session->set_flashdata('msg', array('message' => 'Please Enter Valid Email and Password.','class' => 'danger','type'=>'Oops!')); 
	// 				   redirect('login');
	// 			}			
	
	// 		}else{
    //             $this->session->set_flashdata('msg',array('message' => 'Please enter Email and Password.','class' => 'danger','type'=>'Oops!'));
	// 			redirect('login');
	// 		} 
	// 	} 
	// 	$this->load->view('login');
	// }

	public function index() 
	{	
	    if(($this->session->userdata('logged_in_admin')!==NULL)){
			  redirect('dashboard');
		}else{
			  $this->load->view('mobile');	
		}
	}

	public function sendotp()
	{
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){
			
			$usermobile=$this->input->post('mobile');
		    $mobile = $this->security->xss_clean($usermobile);		
			
			if(!empty($mobile)){
				$result =$this->Login_Model->sentcode($mobile,$this->table_master); 
				if($result){
				  if($result->mst_status=="active"){				
					
					$otp = mt_rand(100000,999999);
					$otpData = array(
						'mst_otp'=>$otp
					);
					$mstid = $result->mst_id;
					$updated = $this->Login_Model->update($mstid,$otpData,$this->table_master);
					$message = 'Your OTP is '.$otp;
					$this->session->set_flashdata('msg', array('message' => $message,'action'=>'1','class' => 'success','type'=>'Done !'));
					redirect('login');
					}else{
					   $this->session->set_flashdata('msg', array('message' => 'Mobile Number not found!','action'=>'0','class' => 'warning','type'=>'Oops!'));
					   redirect('login');
					}
				}else{
				    $this->session->set_flashdata('msg', array('message' => 'Invalid Mobile Number','action'=>'0','class' => 'danger','type'=>'Oops!')); 
					redirect('login');
				}			
			}else{
                $this->session->set_flashdata('msg',array('message' => 'Invalid Mobile Number','action'=>'0','class' => 'danger','type'=>'Oops!'));
				redirect('login');
			} 
		} 
		$this->load->view('login');
	}

	public function verifyotp()
	{
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){
			
			$usermobile=$this->input->post('mobile');
			$userotp=$this->input->post('otp');
		    $mobile = $this->security->xss_clean($usermobile);		
			$otp = $this->security->xss_clean($userotp);

			if(!empty($mobile) || !empty($otp)){
				$result =$this->Login_Model->checkotp($mobile,$otp,$this->table_master); 
				if($result){
				  if($result->mst_status=="active"){				
					
					$otpData = array(
						'mst_otp'=>$otp.'_v',
					);
					$mstid = $result->mst_id;
					$updated = $this->Login_Model->update($mstid,$otpData,$this->table_master);
					$this->session->set_userdata('logged_in_admin',$result);
					$this->session->set_flashdata('msg', array('message' => 'you have successfully logged in.','action'=>'1','class' => 'success','type'=>'Done !'));
					redirect('dashboard');
					}else{
					   $this->session->set_flashdata('msg', array('message' => 'Mobile Number not found!','action'=>'0','class' => 'warning','type'=>'Oops!'));
					   redirect('login');
					}
				}else{
				    $this->session->set_flashdata('msg', array('message' => 'Invalid Mobile Number','action'=>'0','class' => 'danger','type'=>'Oops!')); 
					redirect('login');
				}			
			}else{
                $this->session->set_flashdata('msg',array('message' => 'Invalid Mobile Number','action'=>'0','class' => 'danger','type'=>'Oops!'));
				redirect('login');
			} 
		} 
		$this->load->view('login');
	}
	
	public function logout()
	{  
	   	$this->login = $this->session->userdata('logged_in_admin');		
		$this->session->unset_userdata('logged_in_admin');
		$this->session->set_flashdata('msg', array('message' => 'You have successfully logout.','action'=>'0','class' => 'success','type'=>'Ok !'));
		redirect('login');
	}
	  
	
	 
}
