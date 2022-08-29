<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{	

	function __construct() 
	{
		parent::__construct();		
		$this->_hmvc_fixes();
		$this->load->model("MY_Model");
		/* ========FOR WEBSITE =========== */
		$this->fld_wid="web_id";	 			
		$this->table_website="tbl_website_info";
		
		$Websitedata=$this->MY_Model->get_website($this->fld_wid,$this->table_website);
	    $this->website=$Websitedata; 
	    $this->set_timezone($this->website->web_timezone);
       
	}
	
	public function set_timezone($id)
	{ 
        $this->db->select('zone_name');
        $this->db->from( 'tbl_timezone');
        $this->db->where('zone_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            date_default_timezone_set($query->row()->zone_name);
        }else {
            return false;
        }
    }
	
	function _hmvc_fixes()
	{		
		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		
	}
	
	
	 

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
