<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Documents_model",'Docs');
		/* ========FOR MASTER TABEL=========== */ 			
		$this->fld_email="mst_email";	
		$this->fld_password="mst_password";	
		$this->table_master="tbl_master";	 
		/* ========FOR BANNERS TABEL=========== */ 			
		$this->fld_slr_id="slr_id";	
		$this->documents="tbl_documents";
    }

  	public function index() 
	{    	
       	$content['admin']=admin_profile($this->login->mst_email);	     
       	$content['documents']=  $this->Docs->get_list('slr_id',$this->documents);
	   	$content['subview']="documents";
		$this->load->view('layout', $content);
	}

	public function add()
	{
        $content['admin']=admin_profile($this->login->mst_email);	
	    $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
			$check = $this->Docs->check('slr_name',$this->input->post('slr_name'),$this->documents);
			if(empty($check)){		
				$path=FCPATH . 'uploads/documents';
				$image_name='slr_img';		
				$img=$this->Docs->images_upload($image_name,$path);		   	
				$data=array(
					'slr_name' =>$this->input->post('slr_name'),
					'slr_img' =>$img,		
					'slr_created' =>date('Y-m-d H:i:s')
				);
		    	$result = $this->Docs->save($data,$this->documents);
		   		if($result){
					$this->session->set_flashdata('msg',array('message' => 'Document saved successfully.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
					redirect('documents/add'); 
				}else{
					$this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					redirect('documents/add');  
				}
			}else{
				$this->session->set_flashdata('msg',array('message' => "Document name exist.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					redirect('documents/add');  
			}
   		}
	    $content['subview']="add_document";
		$this->load->view('layout', $content);
	}

  	public function remove() 
	{  
       	$slr_id=$this->uri->segment(3);    
       	$banner = $this->Docs->single_record($this->fld_slr_id,$slr_id,$this->documents);
        $path=FCPATH . 'uploads/documents';	
        $slr_img= $path.'/'. $banner->slr_img;  
		if (!unlink($slr_img)) {} else { }	     
       	$result = $this->Docs->delete($this->fld_slr_id,$slr_id,$this->documents);
	   	$this->session->set_flashdata('msg',array('message' => 'Document removed successfully.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   	redirect('documents'); 
			
	}
	
}
