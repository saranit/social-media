<?php  class Social_model extends CI_Model {
 
 
  public function __construct() {
     parent::__construct();
 
 
	}
	public function insertTwitterData($data)
	{
	      // print_r($data); die;
		   $this->db->select('*');
	       $this->db->from('user');
	       $this->db->where('uid',$data['uid']);
	       $result = $this->db->get()->row();
	       if(!empty($result))
	       {
	              $this->db->where('uid',$data['uid']);
	              $this->db->update('user',$data);
	              echo "logged in success to dashboard";die;
	       }else{
	        $this->db->insert('user',$data); 
	         echo "logged in success to dashboard";die;
	       }
	}
	
	public function dynamic_inser_and_get_inserted_id($table,$values)
	{
		$res=$this->db->insert($table,$values);
		if($res)
		{
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		}
		
	}
	
	public function dynamic_inserting_data($table,$values)
	{
		$res=$this->db->insert($table,$values);
		if($res)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
	}
	public function get_row($table_name,$where,$selected)
	{
		//$res=$this->db->query($query);
		$this->db->where($where);
		$this->db->select($selected);
		$res=$this->db->get($table_name);
		if($res->num_rows()>0)
		{
			return $res->row();
		}
		else
		{
			return array();
		}
		
		
	}
	public function dinamically_check_data($table_name,$where,$columns)
	{
		$this->db->where($where);
		$this->db->select($columns);
		$res=$this->db->get($table_name);
		if($res->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function update_func($table_name,$update,$where)
	{
		$this->db->where($where);
		$this->db->update($table_name,$update);
		//$this->db->get();
		$res=$this->db->affected_rows();
		if($res)
		{
			return 1;
		}
		else{
			return 0;
		}
		
		
	}
	
}