<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	
	Class Test extends MX_Controller 
	{
 	    
		/* public function __construct() {

          parent::__construct();
          $this->load->model('user_model');
        
    } */
	/* public function index()
	{
	    $data['pagecontent'] = 'login';
		
        $this->load->view('common/page-layout',$data);	
		
	}
	public function register()
	{		
		$data['pagecontent'] = 'user_registration';
		
		if($this->input->post('sub_reg'))
		{
			$fname=$this->input->post('fname')?$this->input->post('fname'):'';
			$lname=$this->input->post('lname')?$this->input->post('lname'):'';
			$email=$this->input->post('email')?$this->input->post('email'):'';
			$phone=$this->input->post('phone')?$this->input->post('phone'):'';
			$gender=$this->input->post('gender')?$this->input->post('gender'):'';
			$password=$this->input->post('password')?md5($this->input->post('password')):'';
			
			$data =  array('first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'phone_number'=>$phone,'gender'=>$gender, 
						   'password'=>$password);
			$table ='sm_users';			   
			$insert_val=$this->user_model->dynamic_inserting_data($table,$data);
			
			if($insert_val == 1)
			{
				$this->session->set_flashdata('user_sc', 'User Successfully Registered!!!');
				redirect("user?e_string=".$email);
				
			}
			else
			{
				$this->session->set_flashdata('user_fail', 'User Registration Failed.');
				redirect('user/register');
			}
			
		}
		
		$this->load->view('common/page-layout',$data);
	}
	
	public function email_check_ajax()
	{
		 $email=$this->input->post('email');
		 $user_id=$this->input->post('user_id');
		
		$email_condition=$this->user_model->email_exist_or_not($email,$user_id);
		if($email_condition ==10)
		{
			echo 10; die;
			
		}
		
		
	}
	public function phone_check_ajax()
	{
		 $phone=$this->input->post('phone');
		 $user_id=$this->input->post('user_id');
		
		$email_condition=$this->user_model->phone_exist_or_not($phone,$user_id);
		if($email_condition ==30)
		{
			echo 30; die;
			
		}
		
		
	} */
	public function smtp_mail($to_mail='',$subject='',$body='') 
		{
			echo 'test'; die;
			
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "smtp.1and1.com";
			$config['smtp_port'] = 587;
			$config['smtp_user'] = "senthil.kumar@wenso.co.uk"; 
			$config['smtp_pass'] = "Senthil7$";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";

			$ci->email->initialize($config);
			$ci->email->from("senthil.kumar@wenso.co.uk", "Social Media");
			$ci->email->to($to_mail);
			$this->email->reply_to("saran.kumar@wenso.co.uk","Social Media");
			$ci->email->subject($subject);
			$ci->email->message($body);
			if($ci->email->send())
			{
				return 1;
			}
			else
			{
				//show_error($this->email->print_debugger()); die;
				return 0;
			}
		}
	
	
}
	