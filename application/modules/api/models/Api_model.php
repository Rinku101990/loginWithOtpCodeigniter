<?php 
class Api_model extends MY_Model{
    
    public function getUsersList($id,$table){
        $this->db->select('slr_id,slr_img');
		$this->db->order_by($id,"asc");
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
    
    
	/*--- USER SIGNUP AND LOGIN API MODEL ---*/ 
	public function check_email($cemail,$mail,$table)
	{	
	    $this->db->select('mst_id,mst_ref_id,mst_name,mst_email,mst_status');
		$this->db->where($cemail,$mail);		 
		$this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function single_list($table){		
		$this->db->order_by('mst_id','DESC');		 
		$this->db->limit(1);		
		$query=$this->db->get($table); ;
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
	}

	public function user_login($mail,$password,$table)
	{
		$this->db->select('mst_id,mst_name,mst_email,mst_mobile_number,mst_status,mst_created,mst_updated');		
		$this->db->where('mst_email',$mail);		
		$this->db->where('mst_password',$password);
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}

	public function get_profile($email,$table)
	{
	    $this->db->select('mst_id,mst_name,mst_email,mst_mobile_number,mst_status,mst_created,mst_updated');
		$this->db->where('mst_email',$email);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	function images_upload($image_name,$path) 
	{	
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|webp',
			'upload_path' => $path,
			'file_name' => date('YmdHms').'_'.rand(1,999999),
			'max_size' => 200000
		);		 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
		if($this->upload->do_upload($image_name))
		{
			$uploaded = $this->upload->data();
			$arr[$image_name] = $uploaded['file_name'];
		}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=@$arr[$image_name]; 	    
        
	}

	public function sentcode($mobile,$table)
	{
		$this->db->select('mst_id,mst_name,mst_email,mst_mobile_number,mst_status,mst_created,mst_updated');		
		$this->db->where('mst_mobile_number',$mobile);		
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}

	public function checkotp($mobile,$otp,$table)
	{
		$this->db->select('mst_id,mst_name,mst_email,mst_mobile_number,mst_status,mst_created,mst_updated');		
		$this->db->where('mst_mobile_number',$mobile);
		$this->db->where('mst_otp',$otp);		
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}

	public function update($otp,$data,$table) {
        $this->db->where('mst_id', $otp);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 
	
}
?>