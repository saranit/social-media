<?php  class Social extends CI_Controller {
 
 
  public function __construct() {
     parent::__construct();
       $this->load->library('session','TwitterOAuth');
        $this->load->helper('url');
        $this->load->model('Social_model');
	}//end __construct()
	public function index()
	{
 
	      $this->load->view('login');
	}
 
    public function session($provider) { 
 
    	 $this->load->helper('url_helper');
		//echo YOUR_CONSUMER_KEY; die;
		 $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET);
		 //print_r($twitteroauth); die;
         //$request_token = $twitteroauth->getRequestToken('http://w3code.in/index.php/social/getTwitterData');
     $request_token = $twitteroauth->getRequestToken('http://localhost/social/social-media/user/social/getTwitterData'); 
		 //'http://localhost/social_media/user/social'
		 //print_r($request_token); die; 
         $_SESSION['oauth_token'] = $request_token['oauth_token'];
		 //print_r($_SESSION['oauth_token']); die;
         $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
         $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
		 
		 //print_r($url); die;
          header('Location: ' . $url);
 
		}
    function getTwitterData()
    {
    
              if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
           // We've got everything we need
              $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
       // Let's request the access token
              $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
       // Save it in a session var
           $_SESSION['access_token'] = $access_token;
       // Let's get the user's info
           $user_info = $twitteroauth->get('account/verify_credentials');
		
		   $common_function=new common_function();
		   $authentication_key = $common_function->generateOneTimePassword();
		   $twitter_id=$user_info->id; 
		   $name=$user_info->name; 
		   $screen_name=$user_info->screen_name; 
		   $location=$user_info->location; 
		   $descrption=$user_info->description; 
		   $image_url=$user_info->profile_image_url; 
		   $followers_count=$user_info->followers_count; 
		   $friends_count=$user_info->friends_count;  
		   $login_type = "TWITTER";
		   
		   $values = array('first_name'=>$name,'register_type'=>$login_type,'twitter_id'=>$twitter_id,'user_authentication_key'=>$authentication_key);
		   $table_name = 'sm_users';
		   $selected ='twitter_id';
		   $where=array('twitter_id'=>$twitter_id);
		   
		   $twitter_id_check = $this->Social_model->get_row($table_name,$where,$selected);
		   
		   if(count($twitter_id_check) <= 0)
		   {
				
				$twitter_table='sc_twitter_data';
				
				$user_id = $this->Social_model->dynamic_inser_and_get_inserted_id($table_name,$values);
				
				$twitter_data=array('screen_name'=>$screen_name,'location'=>$location,'descrption'=>$descrption,'image_url'=>$image_url,'followers_count'=>$followers_count,'friends_count'=>$friends_count,
				'user_id'=> $user_id);
				
				$twitter_info = $this->Social_model->dynamic_inserting_data($twitter_table,$twitter_data); 
                			
				
				redirect('user/social/email_authentication');
				//die;
				
		   }
		   else
		   {
			   $this->session->set_userdata('user_data',$user_id);
		       redirect('user/dashboard');
			   
		   }
		   
		   if (isset($user_info->error)) {
               // Something's wrong, go back to square 1  
               header('Location: login-twitter.php');
           } else {
			   
           $data = array('uid'=>$user_info->id,
                     'name'=>$user_info->name,
                     'follower'=>'',
 
           );
 
                 $this->Social_model->insertTwitterData($data);
           }
       }  
    }
	public function twitter_search()
	{
		$this->load->view('linked_search');
				
	}
	public function email_authentication()
	{
		if($this->input->post('submit_email'))
		{
			$email = $this->input->post('email')?trim($this->input->post('email')):'';
			
			$table_name = 'sm_users';
			$where=array('email' => $email);
			$columns = 'email';
			$email_check = $this->Social_model->dinamically_check_data($table_name,$where,$columns)
			if($email_check == 1)
			{
				$this->session->set_flashdata('user_fail', 'Email exists in our system');
				redirect('user/social/email_authentication');
			}
			
			
		}
		
		$this->load->view('twitter_more_authentication_login');
	}
    
}