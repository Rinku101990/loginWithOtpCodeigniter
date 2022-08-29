<?php 
class Documents_model extends MY_Model{
	
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
	  
	function get_list($fld_id,$table)
	{	
		$this->db->order_by($fld_id,"ASC");
		$query=$this->db->get($table);
		$this->db->last_query($query);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}

	function single_record($fld_id,$id,$tabel)
	{
		$this->db->order_by($fld_id,"desc");
		$this->db->where($fld_id,$id);	
		$this->db->limit(1);	
		$query=$this->db->get($tabel);
		if($query->num_rows()== 1){
		   return $query->row();
		}else{
			return false;
		}
		
	}

	function check($fld_name,$fld_id,$tabel)
	{
		$this->db->where($fld_name,$fld_id);
		$this->db->limit(1);		
		$query=$this->db->get($tabel);
		$this->db->last_query($query);
		if($query->num_rows()== 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}	   
	}

	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

	public function delete($fld_email,$email,$table) 
	{
        $this->db->where($fld_email, $email);
        $this->db->delete($table);
    } 
	
}