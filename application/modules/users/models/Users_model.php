<?php 
class Users_Model extends MY_Model{

	public function single_list($tabel){		
		$this->db->order_by('mst_id','DESC');		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);
		//echo $this->db->last_query($query)	 ;
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function get_all_user_list($fld_bid,$table)
	{
		$this->db->select('*');
		$this->db->order_by($fld_bid, 'DESC');
		$this->db->where('mst_role', '1');
		$query=$this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}
	}

	function get_user_single_record($fld_id,$id,$tabel)
	{	 
		$this->db->where($fld_id,$id);		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	function check_email($fld_email,$mail,$tabel)
	{	 
		$this->db->where($fld_email,$mail);		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	public function createThumbnail($source,$destination,$width,$height){

		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source;
		$config['new_image'] = $destination;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;

		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	// END OF THE UPLOADING RESIZE COMMENT ATTACHMENT //
	
    public function save_user($data,$table){
        $this->db->insert($table , $data);
        return $this->db->insert_id();
	}
	
	public function delete_single($fld_bid,$id,$table)
	{ 
	    $this->db->where($fld_bid,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	
}