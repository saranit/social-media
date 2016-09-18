<?php
Class User_model Extends CI_Model
{
	public function user_login($email,$password)
	{
		
		
		$query="select * from sm_users  where  email='$email' AND password = '$password'";
		$res=$this->db->query($query);
		if($res->num_rows() == 1)
		{
			return $res->row();
		}
		else
		{
			return array();
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
	public function email_exist_or_not($email,$user_id)
	{
		if($user_id !=0)
		{
			$user_cond =" and user_id not in($user_id) " ;
			              
		}
		else
		{
			$user_cond= '';
		}
		$query="select user_id,email from sm_users where email = '$email'  $user_cond ";
		$res=$this->db->query($query);
		if($res->num_rows()>0)
		{
			return 10;
		}
		else
		{
			return 20;
		}
		
		
	}
    public function phone_exist_or_not($phone,$user_id)
	{
		if($user_id !=0)
		{
			$user_cond =" and user_id not in($user_id) " ;
			              
		}
		else
		{
			$user_cond= '';
		}
		$query="select user_id,phone_number from sm_users where phone_number = '$phone'  $user_cond ";
		$res=$this->db->query($query);
		if($res->num_rows()>0)
		{
			return 30;
		}
		else
		{
			return 40;
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