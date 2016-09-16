<?php
/* Class Mailing
{
	public function smtp_mail($to_mail='',$subject='',$body='') 
	{
		 $config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'xxx',
		'smtp_pass' => 'xxx',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'); 
		
	    $this->load->library('email',$config);
	    //$this->load->library('email');
		
		$this->email->set_newline("\r\n");

		$this->email->from('saran.saladi570@gmail.com', 'Admin');
				 $this->email->to($to_mail); 
				 $this->email->subject($subject);
				 $this->email->message($body);	
		$result= $this->email->send();
		if($result)
		{
			return 1;
		}
		else
		{
			//show_error($this->email->print_debugger());
			echo 0; die;
		}
	}


} */