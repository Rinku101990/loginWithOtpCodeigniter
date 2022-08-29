<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/*! Common Helper
	* ================
	* Common Helper application file for All Common function . 
	* This fileshould be included in all pages.  
	* @Author  :  Rinku Vishwakarma
	* @Created :  27-08-2022
	*/
	
	
	function date_formate($date){
		   
		 return date_format(date_create($date),'d-M-Y ,h:i:s A');
		 
	} 	
	function admin_profile($email)
	{ 
		$ci=get_instance();		
		$ci->db->where('mst_email', $email);
        $query = $ci->db->get('tbl_master');
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result()[0];
		}
	}
?>