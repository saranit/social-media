<?php

if (!defined('BASEPATH'))
    exit('Not a valid request!');

/**
 * This class includes all the functions responsible for user leave Information.
 * 
 * @version     0.0.1
 * @since       v0.0.1
 * @access      public
 * @author      Naga Raju   <nagaraju@ahex.co.in>
 * 
 */
class Facebook_model extends CI_Model {

    //default construct
    public function __construct() {
        parent::__construct();
        //loadin a library
        $this->load->library('session');
    }

    //------------------------------------------------------------------------
    // Get the values from facebook data and insert into facebook table 
    public function facebook_insert($user_profile) {
//        print_r($user_profile);        
//        die();
        // check the user is exists in databse or not
        $this->db->where('id',$user_profile['id'] );
        $query = $this->db->get('facebook');
        if( $query->num_rows() < 0 ){ 
            
            
        $values = array(
            'facebook_id' => $user_profile['id'],
            'name' => $user_profile['name'],
            'email' => $user_profile['email'],
            'gender' => $user_profile['gender']
        );

        $insert_data = $this->db->insert('facebook', $values);
        if ($insert_data) {
            $this->session->set_userdata(array(
                'facebook_id' => $user_profile['id'],
                'name' => $user_profile['name'],
                'email' => $user_profile['email'],
                'gender' => $user_profile['gender']
            ));
            redirect('lists');
        } else {
            return FALSE;
        }
        
       } 
      else { 
//          return FALSE; 
          return TRUE;
      } 
        
    }
}



/**
 * End of File Facebook_model
 * End of Class Facebook_model
 * Path application/model/facebook/facebook_model.php
 * 
 */