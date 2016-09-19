<?php  if( ! defined('BASEPATH')) exit('Not a valid request!');
/**
 * This class includes all the functions responsible for user leave Information.
 * 
 * @version     0.0.1
 * @since       v0.0.1
 * @access      public
 * @author      Naga Raju   <nagaraju@ahex.co.in>
 * 
 */
class login extends CI_Controller {

    //default construct
    public function __construct() {
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library('Facebook', array("appId" => "", "secret" => ""));
        $this->user = $this->facebook->getUser();
        $this->load->model('facebook/facebook_model', 'obj', TRUE);
    }

    // ------------------------------------------------------------------------
    public function index() {

        if ($this->user) {
            try {
                $user_profile = $this->facebook->api('/me');
                 $friends = $this->facebook->api('/me/friends');
                 //----------------
                // Get the current access token
                $access_token = $this->facebook->getAccessToken(); 
                echo $access_token;
                //------------------
                // here we are lgoin through the facebook.
//                echo $user_profile['email'];
//      *********************************************************
//      Data come from facebook are stored in databse 
                
                 echo "<pre>";
                  print_r($user_profile);
                  print_r($friends);

                  die();

                $return_value = $this->obj->facebook_insert($user_profile);
                if ($return_value) { 
                    redirect('user_page');
                } else {
                    $this->arr_response['status'] = '400';
                }
                echo json_encode($this->response);
                redirect('login');
            } catch (FacebookApiException $e) {
                print_r($e);
                //  $user = null;
                // if user fails to ligin he will be redirected to login page
                //  redirect('login');
            }
        }
        if ($this->user) {
            $logout = $this->facebook->getLogouturl(array("next" => base_url() . "facebook/login/logout"));
            echo "<a href='$logout'>Logout</a>";
        } else {
            $data['url'] = $login = $this->facebook->getLoginUrl(array("scope" => "email"));
            $this->load->view('login', $data);
        }
    }

    //----------------------------------------------------------------------------
    // This is face book session destroy

    public function logout() {
        session_destroy();
        redirect(base_url() . 'login');
    }

}

/**
 * End of class Login
 * End of File Login
 * Path controller/fb/login
 * 
 */