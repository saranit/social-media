<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller 
	{
 	    
		public function __construct() {

        parent::__construct();
        $this->load->model('user_model');
		  
		
        
    }
	 	
	 public function index()
	{
	    $data['pagecontent'] = 'login_social_media';
		
		if($this->session->userdata('user_data'))
		{
			redirect('user/dashboard');
		}
		
		
		
		if($this->input->post('login'))
		{
			$email=$this->input->post('email')?$this->input->post('email'):'';
			$password=$this->input->post('password')?md5($this->input->post('password')):''; 
			
			$user_row = $this->user_model->user_login($email,$password);
			
			if(count($user_row) == 1)
			{
				//echo 'SUCCESS'; die;
				$this->session->set_userdata('user_data',$user_row);
				 
				redirect('user/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error_msg', 'Invalid Username or Password');
				redirect('user');
			}
			
			
		}
		  $this->load->view('common/page-layout',$data);	
	}
	public function dashboard()
	{
		if(!$this->session->userdata('user_data'))
		{
			redirect('user');
		}
		$this->load->view('dashboard');
	}

	public function linkedin()
	{
    $config['callback_url'] ='http://localhost/social/social-media/user/linkedin';
	 $config['Client_ID'] = '81b0m5ddf6226a';
	$config['Client_Secret'] = 'VTBC2LtSxXwEHNpH';
    //echo 'test'; die;
if ($config['Client_ID'] === '' || $config['Client_Secret'] === '') {
  echo 'You need a API Key and Secret Key to test the sample code. Get one from <a href="https://www.linkedin.com/secure/developer">https://www.linkedin.com/secure/developer</a>';
  exit;
}
if(isset($_REQUEST['code']))
{
    //echo $_REQUEST['code']; die;
	$url    = 'https://www.linkedin.com/uas/oauth2/accessToken';
    
	$param  = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
    //print_r($url); die;
	$return = json_decode($this->post_curl($url,$param),true);
	
	//print_r($return); die;
	
    if(isset($return['error']) && $return['error'] !='')
    {
        echo 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
		redirect('user/linkedin');
    }
    else   
    {
      
      	//echo 'test'; die;
		$url    = 'https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token='.$return['access_token'];
        $User   = json_decode($this->post_curl($url));
		//print_r($User); die;
        $id             = isset($User->id) ? $User->id : '';
        $firstName      = isset($User->firstName) ? $User->firstName : '';
        $lastName       = isset($User->lastName) ? $User->lastName : '';
        $emailAddress   = isset($User->emailAddress) ? $User->emailAddress : '';
        $headline       = isset($User->headline) ? $User->headline : '';
        $pictureUrls    = isset($User->pictureUrls->values[0]) ? $User->pictureUrls->values[0] : '';
        $location       = isset($User->location->name) ? $User->location->name : '';
        $positions      = isset($User->positions->values[0]->company->name) ? $User->positions->values[0]->company->name : '';
        $positionstitle = isset($User->positions->values[0]->title) ? $User->positions->values[0]->title : '';
        $publicProfileUrl = isset($User->publicProfileUrl) ? $User->publicProfileUrl : '';
		
		$table_name='sm_users';
		$where= array('email'=>$emailAddress);
		$selected='*';
		$user_data = $this->user_model->get_row($table_name,$where,$selected);
        //print_r($user_data); die;
		if(count($user_data) <= 0)
		{
			
			// data insert into social media user table
			$common_function=new common_function();
		    $authentication_key = $common_function->generateOneTimePassword();
			$values=array('first_name'=>$firstName,'last_name'=>$lastName,'email'=>$emailAddress,'user_authentication_key'=>$authentication_key);
			$get_user_id = $this->user_model->dynamic_inser_and_get_inserted_id($table_name,$values);
            
			// data insert into linked table 
			if($get_user_id >0)
			{
				
				$linkedin_table='sc_linkedin_data';
				
				$linked_data = array('linked_user_id'=>$id,'first_name'=>$firstName,'last_name'=>$lastName,'email'=>$emailAddress,'headline'=>$headline,
                             'image_url'=>$pictureUrls,'location'=>$location,'positions'=>$positions,'positionstitle'=>$positionstitle,
                             'publicProfileUrl'	=>$publicProfileUrl,'user_id'=>	$get_user_id);
				$linked_data =$this->user_model->dynamic_inserting_data($linkedin_table,$linked_data);
				if($linked_data == 1 )
				{
					$this->session->set_userdata('user_data',$get_user_id);
				    redirect('user/dashboard');
				}
				else
				{
					redirect('user/linkedin');
				}
				
			}
			
		}
		// already login with linkedin account directly login
		else
		{
		   $this->session->set_userdata('user_data',$user_data);
		   redirect('user/dashboard');
		}
		/* echo "
        <table border='1' cellpadding='7' style='border-collapse: collapse;'>
            <tr style='text-align: center;'>
                <td colspan='2'><img src='".$pictureUrls."' width='100' /><br>".$headline."</td>
            </tr>
            <tr>
                <td>ID: </td>
                <td>".$id."</td>
            </tr>
            <tr>
                <td>First Name: </td>
                <td>".$firstName."</td>
            </tr>
            <tr>
                <td>last Name: </td>
                <td>".$lastName."</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>".$emailAddress."</td>
            </tr>
            <tr>
                <td>Job Position: </td>
                <td>".$positionstitle.": ".$positions."</td>
            </tr>
            <tr>
                <td>Location: </td>
                <td>".$location."</td>
            </tr>
            <tr>
                <td>Profile Link: </td>
                <td><a href='".$publicProfileUrl."' target='_blank'>".$publicProfileUrl."</a></td>
            </tr>
        </table>
		
		
        "; */
        /* $query = "INSERT INTO `test`.`users` 
    (`userid`, 
    `firstName`, 
    `lastName`, 
    `emailAddress`, 
    `position`, 
    `location`, 
    `profileURL`, 
    `pictureUrls`, 
    `headline`)
    
    VALUES
    
    ('$id', 
    '$firstName', 
    '$lastName', 
    '$emailAddress', 
    '$position', 
    '$location', 
    '$profileURL', 
    '$pictureUrls', 
    '$headline')"; */
        //mysqli_query($connection,$query);

        
    }
}
elseif(isset($_GET['error']))
{
    //echo 'Some error occured<br><br>'.$_GET['error_description'].'<br><br>Please Try again.';
	redirect('user/linkedin');
}
else
{
    echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress"><img src="./images/linkedin_connect_button.png" alt="Sign in with LinkedIn"/></a>';
}

}

function post_curl($url,$param="")
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    if($param!="")
        curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
        
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    
    return $result;
}
	
	public function register()
	{		
		$common_function=new common_function();
		
		$data['pagecontent'] = 'user_registration';
		
		if($this->input->post('sub_reg'))
		{
			$fname=$this->input->post('fname')?$this->input->post('fname'):'';
			$lname=$this->input->post('lname')?$this->input->post('lname'):'';
			$email=$this->input->post('email')?$this->input->post('email'):'';
			$phone=$this->input->post('phone')?$this->input->post('phone'):'';
			$gender=$this->input->post('gender')?$this->input->post('gender'):'';
			$password=$this->input->post('password')?md5($this->input->post('password')):'';
			
			$authentication_key = $common_function->generateOneTimePassword();
			
			$data =  array('first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'phone_number'=>$phone,'gender'=>$gender, 
						   'password'=>$password,'user_authentication_key'=>$authentication_key);
			$table ='sm_users';			   
			$insert_val=$this->user_model->dynamic_inserting_data($table,$data);
			
			if($insert_val == 1)
			{
				$this->smtp_mail($to_mail='',$subject='',$body='');
				
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
		
		
	}
	public function smtp_mail($to_mail,$subject,$body) 
	{
		
		//$to_mail ="saran.saladi@gmail.com";
		//$subject="sub";
		//$body ='body';
		
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
	public function forget_password()
	{
		$data['pagecontent'] = 'forget_password';
		if($this->input->post('forget'))
		{
			$email = $this->input->post('email')?trim($this->input->post('email')):'';
			
			$table_name='sm_users';
			$where= array('email'=>$email);
			$selected='*';
			$user_data = $this->user_model->get_row($table_name,$where,$selected);
			//print_r($user_data); die;
			if(count($user_data)> 0)
			{
				
				$url= base_url().'user/change_password_for_onetime/'.$user_data->user_authentication_key; 
				
				$to_mail=$email;
				$subject='Social Media Forget Password Login Link';
				$body="<p>Dear " .$user_data->first_name. "</p><p>Please Click the below link to change your password </p>
				<p>".$url."</p>";
				
				$this->smtp_mail($to_mail,$subject,$body);
				
				$this->session->set_flashdata('user_sc', 'Password change link sent to your email ');
				redirect('user/forget_password');
				
				
			}
			else
			{
				$this->session->set_flashdata('user_fail', 'Email does not exists in our system.');
				redirect('user/forget_password');
			}
			
		}
		
		$this->load->view('common/page-layout',$data);	
		
	}
	public function change_password_for_onetime($user_key)
	{
		
		$common_function=new common_function();
		
		$data['pagecontent'] = 'one_time_password_change';
		
		$table_name='sm_users';
		$where= array('user_authentication_key'=>$user_key);
		$selected='*';
		$user_data = $this->user_model->get_row($table_name,$where,$selected);
		//print_r($user_data); die;
		if(count($user_data) <= 0)
		{
			$this->session->set_flashdata('user_fail', 'Password Link expired so can not change your password.');
			redirect('user/forget_password');
		}
		if($this->input->post('change_password'))
		{
			$password = $this->input->post('password')?trim($this->input->post('password')):'';
			
			$update=array('password'=>md5($password));
			$user_update=$this->user_model->update_func($table_name,$update,$where);
			if($user_update == 1)
			{
				$user_id = $user_data->user_id;
				$authentication_key = $common_function->generateOneTimePassword();
				
				$update_con = array('user_authentication_key'=>$authentication_key);
				$where_con  = array('user_id'=>$user_id);
				$user_key=$this->user_model->update_func($table_name,$update_con,$where_con); 
				if($user_key == 1)
				{
					$this->session->set_flashdata('user_sc', 'Password Changed successfully.Please login');
			        redirect('user');
				}
				else
				{
					
					$this->session->set_flashdata('user_fail', 'Password Link expired so can not change your password.');
			        redirect('user/forget_password');
				}
				
			}
			else
			{
			  	//echo 'same'; die;
				$this->session->set_flashdata('user_fail', 'Your Password nothing has been changed.');
			    redirect('user/change_password_for_onetime/'.$user_key);
				
			}
			
		}
		
		
		
		$this->load->view('common/page-layout',$data);	
		
	}
	public function change_password()
	{
		if(!$this->session->userdata('user_data'))
		{
			redirect('user');
		}
		$data['pagecontent'] = 'change_password';
		$this->load->view('common/page-layout',$data);	
		
		if($this->input->post('change_password'))
		{
			
			$old_password = md5($this->input->post('oldpassword'));
			$new_password = md5($this->input->post('password'));
			
			$table_name='sm_users';
			$user_id = $this->session->userdata('user_data')->user_id;
			$where= array('password'=>$old_password);
			$selected='*';
			$user_data = $this->user_model->get_row($table_name,$where,$selected);
			
			if(count($user_data)<=0)
			{
				$this->session->set_flashdata('user_fail', 'Old Password not match.');
			    redirect('user/change_password');
				
			}
			
			$update_con = array('password'=>$new_password);
			$where_con  = array('user_id'=>$user_id);
			$user_password=$this->user_model->update_func($table_name,$update_con,$where_con); 
		    if($user_password == 1)
			{
				$this->session->set_flashdata('password_sc', 'Password changed succesfully.');
			    redirect('user/change_password');
				
			}
			else
			{
				$this->session->set_flashdata('password_fl', 'Nothis has been changed.');
			    redirect('user/change_password');
			}			
			
			
		}
	}
    public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
		
	}	
	
	
}
	