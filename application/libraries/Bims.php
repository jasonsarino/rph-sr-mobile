<?php
class Bims {

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateRandomNumber($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function addJSONResponseHeader() {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Content-Type: application/json");
    }

    public function generateTokenID($userDetails) {
        $token = md5($userDetails->email)."_".$userDetails->group_id."_".$userDetails->company_id."_".date('Y-m-d h:i:s')."".md5(self::generateRandomString(50));
        return md5($token);
    }

    public function generateSessionID($userDetails) {
        $token = date('Y-m-d h:i:s')."".md5(self::generateRandomString(50))."".md5($userDetails->email)."_".$userDetails->group_id."_".$userDetails->company_id."XYZ123".date('Y-m-d h:i:s');
        return md5($token);
    }

    public function getModuleName($table) {
        if($table == 'user_group') {
            $data = array('name' => 'User group', 'module_name' => 'MANAGE GROUPS');
        } else if($table == 'users') {
            $data = array('name' => 'user', 'module_name' => 'MANAGE USERS');
        } else if($table == 'client') {
            $data = array('name' => 'client', 'module_name' => 'CLIENTS');
        } else if($table == 'cities') {
            $data = array('name' => 'Cities', 'module_name' => 'CITIES');
        } else if($table == 'blog_categories') {
            $data = array('name' => 'Blog Categories', 'module_name' => 'BLOG CATEGORIES');
        } else if($table == 'manage_blogs') {
            $data = array('name' => 'Blog', 'module_name' => 'BLOGS');
        } else if($table == 'event_categories') {
            $data = array('name' => 'Event Categories', 'module_name' => 'EVENT CATEGORIES');
        } else if($table == 'manage_events') {
            $data = array('name' => 'Events', 'module_name' => 'EVENTS');
        } else if($table == 'sales_report') {
            $data = array('name' => 'Sales Report', 'module_name' => 'Sales Report');
        } else if($table == 'divisions') {
            $data = array('name' => 'Divisions', 'module_name' => 'Divisions');
        } else if($table == 'positions') {
            $data = array('name' => 'Positions', 'module_name' => 'Positions');
        } 
        return $data;
    }

    // Validate user session
    public function isLoggedIN() {
        return ($this->ci->session->userdata('isLoggedAdminIN') === TRUE AND $this->ci->session->userdata('company_id') != "") ? TRUE : FALSE;
    }

    // Validate user token and session to user table
    public function validateToken() {
        $this->ci->load->model('general_model');
        return $this->ci->general_model->validateToken();
    }

    public function auth_session() {
        if(self::isLoggedIN() === FALSE OR self::validateToken() === FALSE)
            return FALSE;
        return TRUE;   
    }

    public function send_mail($params = array()) {

        // If arguments has value, continue to mail function
        if( count($params) > 0) {
            $body_email = $this->ci->load->view($params['email_template'], $params, TRUE);
            $this->ci->email->set_mailtype("html");
            $this->ci->email->from($params['from_email'], $params['from_name']);
            $this->ci->email->to($params['to']);
            $this->ci->email->subject($params['subject']);
            $this->ci->email->message($body_email);
            return $this->ci->email->send();
        }
        return FALSE;

    } 


}