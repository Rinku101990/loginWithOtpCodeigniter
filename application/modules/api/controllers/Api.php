<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api extends REST_Controller {
    
	/**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() 
    {
        parent::__construct();	
		$this->load->library('Authorization_Token');
        $this->load->library("security");
        $this->load->helper('common');
        $this->load->model("Api_model","API");
        /*--- FOR MASTER TABLE ---*/
        $this->fld_mid='mst_id';		
		$this->fld_email="mst_email";	
		$this->fld_password="mst_password";	
		$this->master="tbl_master"; 	 
        /* --- FOR DOCUMENTS TABLE --- */ 			
        $this->bnrid="slr_id";	
        $this->documents="tbl_documents";	

    }
	
	/**
     * USER LOGIN API
     * -------------
     * @param: username or email
     * @param: password
     * -------------
     * @method: POST
     * @link: api/login
    */ 
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[12]');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array()
            );

            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            // Load Login Function
            $mail = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $output = $this->API->user_login($mail,$password,$this->master);
            //print_r($output);die;
            
            if(!empty($output) AND $output != FALSE)
            {
                if($output->mst_status=='active'){
                    $return_data = [
                        'mst_id' => $output->mst_id,
                        'mst_name' => $output->mst_name,
                        'mst_email' => $output->mst_email,
                        'mst_mobile_number' => $output->mst_mobile_number,
                        'mst_status' => $output->mst_status,
                        'mst_created' => $output->mst_created,
                        'mst_updated' => $output->mst_updated
                    ];
                    $tokenData = $this->authorization_token->generateToken($return_data);
                    // Login Success
                    $message = [
                        'access_token' => $tokenData,
                        'token_type' => 'bearer',
                        'expire_in' => 3600,
                        'user' => $return_data
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                     // Login Error
                    $message = [
                        'status' => FALSE,
                        'message' => 'Invalid Username or Password'
                    ];
                    $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
            else
            {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => 'Invalid Username or Password'
                ];
                $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }

    /**
     * SEND OTP API
     * -------------
     * @param: sendcode
     * -------------
     * @method: POST
     * @link: api/sendcode
    */ 

    public function sentcode_post()
    {
        header("Access-Control-Allow-Origin: *");
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            $mobile = $this->input->post('mobile');
            $output = $this->API->sentcode($mobile,$this->master);
            if(!empty($output) AND $output->mst_status=='active')
            {
                $otp = mt_rand(100000,999999);
                $otpData = array(
                    'mst_otp'=>$otp
                );
                $mstid = $output->mst_id;
                $updated = $this->API->update($mstid,$otpData,$this->master);

                if($output->mst_status=='active'){
                    $return_data = [
                        'mst_mobile_number' => $output->mst_mobile_number,
                        'mst_otp'=>$otp
                    ];
                    $tokenData = $this->authorization_token->generateToken($return_data);
                    // Login Success
                    $message = [
                        'message'=> 'otp send on registered mobile number',
                        'otp' => $return_data
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    $message = [
                        'status' => FALSE,
                        'message' => 'Invalid Mobile Number'
                    ];
                    $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
            else
            {
                $message = [
                    'status' => FALSE,
                    'message' => 'Invalid Mobile Number'
                ];
                $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }

    /**
     * VERIFY OTP API
     * -------------
     * @param: sendcode
     * -------------
     * @method: POST
     * @link: api/verifyotp
    */ 

    public function verifyotp_post()
    {
        header("Access-Control-Allow-Origin: *");
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('otp', 'One Time Password', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            $mobile = $this->input->post('mobile');
            $otp = $this->input->post('otp');
            $output = $this->API->checkotp($mobile,$otp,$this->master);
            if(!empty($output) AND $output->mst_status=='active')
            {
                $otpData = array(
                    'mst_otp'=>$otp.'_v'
                );
                $mstid = $output->mst_id;
                $updated = $this->API->update($mstid,$otpData,$this->master);

                if($output->mst_status=='active'){
                    $return_data = [
                        'mst_id' => $output->mst_id,
                        'mst_name' => $output->mst_name,
                        'mst_email' => $output->mst_email,
                        'mst_mobile_number' => $output->mst_mobile_number,
                        'mst_status' => $output->mst_status,
                        'mst_created' => $output->mst_created,
                        'mst_updated' => $output->mst_updated
                    ];
                    $tokenData = $this->authorization_token->generateToken($return_data);
                    // Login Success
                    $message = [
                        'access_token' => $tokenData,
                        'token_type' => 'bearer',
                        'expire_in' => 3600,
                        'user' => $return_data
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    $message = [
                        'status' => FALSE,
                        'message' => 'Invalid Mobile Number and otp'
                    ];
                    $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
            else
            {
                $message = [
                    'status' => FALSE,
                    'message' => 'Invalid Mobile Number and otp'
                ];
                $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }
    
    /**
     * User Signup
     * -----------
     * @method: POST
     * @return Response
    */
    public function register_post() 
    {
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[12]');

        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array()            
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            // CHECK IF GIVEN EMAIL ID EXISTS
            $email=$this->input->post('email');
            $check = $this->API->check_email($this->fld_email,$email,$this->master);
            if(!empty($check)){
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'email address already in use.'
                );
                $this->response($message, REST_Controller::HTTP_CONFLICT);

            }else{
                $user = $this->API->single_list($this->master);
                $LastInsertedID = substr($user->mst_ref_id, 3,5);
                $reffrence = 'MST'.str_pad($LastInsertedID+1, 5,'0',STR_PAD_LEFT);                           
                // Insert user data
                $secureData1 = array(
                    'mst_ref_id' => $reffrence, 
					'mst_name' =>$this->input->post('name'),
					'mst_email' => $this->input->post('email'), 
					'mst_mobile_number' => $this->input->post('phone'),
					'mst_role' => '1', 
					'mst_status' => 'active',			
					'mst_updated' => date('Y-m-d H:i:s'),
					'mst_created' => date('Y-m-d H:i:s')
                );
                $secureData2 = array(
                    'mst_password' => md5($this->input->post('password')),
                );

                $savedData = array_merge($secureData1,$secureData2);

                $saved = $this->API->save($savedData, $this->master);
                /*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
                if($saved){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'User registered successfully.',
                        'user' => $secureData1
                    );
                    $this->response($message, REST_Controller::HTTP_CREATED);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Internal Server Error'
                    );
                    $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }
    
    /**
     * Profile Detail
     * -----------
     * @method: GET
     * @return Response
    */

    public function profile_get() 
    {
        $email=$this->input->get('email');
        $result = $this->API->get_profile($email,$this->master);
        if($result){
            // Set the response and exit
            $message = array(
                'status' => TRUE,
                'data' => $result
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            $message = array(
                'status' => FALSE,
                'message' => 'Invalid request.'
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }

    /**
     * Get All Document from this method.
     *
     * @return Response
    */
    
    public function documents_get()
    {
        $data = $this->API->getUsersList($this->bnrid,$this->documents);
        if(!empty($data)){
            $arrayData=array();
            foreach($data as $bnrsvalue){
                $arrayData[]=array(
                    'slr_id'=>$bnrsvalue->slr_id,
                    'slr_img'=>base_url('uploads/documents/').$bnrsvalue->slr_img,
                );
            }
            $dataReturn=$arrayData;
            $this->response($dataReturn, REST_Controller::HTTP_OK);
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'users not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }

    /**
     * Upload Document from this method.
     *
     * @return Response
    */
    public function documents_post()
    {
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array()            
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }else{ 

            $path=FCPATH . 'uploads/documents';
            $image_name='file';		
            $img=$this->API->images_upload($image_name,$path);		   	
            $savedData = array(
                'slr_name' =>$this->input->post('name'),
                'slr_img' =>$img,		
                'slr_created' =>date('Y-m-d H:i:s')
            );

            $returnData = array(
                'slr_name' =>$this->input->post('name'),
                'slr_img' =>base_url('uploads/documents/').$img,		
                'slr_created' =>date('Y-m-d H:i:s')
            );

            $saved = $this->API->save($savedData, $this->documents);
            if($saved){
                // Set the response and exit
                $message = array(
                    'status' => TRUE,
                    'message' => 'Document uploaded successfully.',
                    'docs' => $returnData
                );
                $this->response($message, REST_Controller::HTTP_CREATED);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Internal Server Error'
                );
                $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Upload Document from this method.
     *
     * @return Response
    */
    public function logout_get(){
        session_destroy();
        $this->output->set_output(json_encode(array('status'=>true,'msg'=>'log Out successfully')));
      }

    // CREATING TOKEN
    public function verify_post()
	{  
		$headers = $this->input->request_headers(); 
		$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

		$this->response($decodedToken);  
	}
    
    
}