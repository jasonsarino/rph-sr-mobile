<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * General Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class General_model extends CI_Model{
	
	public function __construct() {
        // init __construct from parent class
		parent::__construct();	
	} 

	public function getCompanyDetails() {
        // Get logged in company information
        $this->db->select("A.company_id, A.logo, A.name, A.address1, A.address2, A.city, A.state, A.country, A.zip_code, A.fax, A.phone1, A.phone2, 
            A.primary_email, A.default_timezone, A.nStatus");
        $this->db->where('A.company_id', $this->session->userdata('company_id'));
        $query = $this->db->get('company A');
        return $query->row();
    }

    public function validatePermission($module) {
        // Validate if the user has access permission in specific module
    	$query = $this->db->query("SELECT B.`privileges`, `B`.`isFixed` FROM `users` A INNER JOIN `user_group` B ON A.`group_id` = B.`id` WHERE A.`id` = " . $this->session->userdata('user_id') . " AND A.`company_id` = " . $this->session->userdata('company_id'));
    	if($query->num_rows() == 1) {
    		$row = $query->row();
    		if($row->privileges == 'FULL-ACCESS' OR $row->isFixed == 1){
    			return TRUE;
    		} else {
    			$privileges = unserialize($row->privileges);
    			return (isset($privileges[$module])) ? TRUE : FALSE;
    		}
    	} else {
    		return FALSE;
    	}
    }

	public function log($module, $event, $log) {
        // Save activity log
		$this->data = array(
			'user_id'				=>		$this->session->userdata('user_id'),
			'company_id'			=>		1,
			'module'				=>		$module,
			'event'					=>		$event,
			'ipaddress'				=>		$this->input->ip_address(),
			'log_description'		=>		$log
		);	
		$this->db->insert("activity_log",$this->data);
	}

	public function validateToken() {
        // Validate user token and session
		$this->db->select('token_id, session_id');
		$this->db->where(array(
			'company_id'	=>	$this->session->userdata('company_id'),
			'token_id'		=>	$this->session->userdata('token_id'),
			'session_id'	=>	$this->session->userdata('session_id'),
		));
		$query = $this->db->get('users');
		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}

    public function getSystemDefault($cCode) {
        // Get system default base on the code
        $this->db->where(array('cCode' => $cCode, 'company_id' => $this->session->userdata('company_id')));
        $query = $this->db->get('system_settings');
        return ($query->num_rows() == 1 ) ? $query->row() : FALSE;
    }

    public function getSystemParams($param_name) {
        // Get system default base on the code
        $this->db->where(array('param_name' => $param_name,  'nStatus' => 1, 'company_id' => $this->session->userdata('company_id')));
        $query = $this->db->get('system_parameters');
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getDeleteName($table, $whereField, $fieldName = '', $id) {
        // Get deleted value in table
        if($fieldName != '') {
            $this->db->select($fieldName);
        } 
        $this->db->where($whereField, $id);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function save_company($upload_data = array()) {
        // Save company information
        $this->data = array(
            'name'                  =>      $this->input->post('name'),
            'address1'              =>      $this->input->post('address1'),
            'city'                  =>      $this->input->post('city'),
            'state'                 =>      $this->input->post('state'),
            'country'               =>      $this->input->post('country'),
            'zip_code'              =>      $this->input->post('zip_code'),
            'registration_no'       =>      $this->input->post('registration_no'),
            'vat_registration_no'   =>      $this->input->post('vat_registration_no'),
            'primary_email'         =>      $this->input->post('primary_email'),
            'fax'                   =>      $this->input->post('fax'),
            'phone1'                =>      $this->input->post('phone1'),
            'phone2'                =>      $this->input->post('phone2'),
            'logo'                  =>      (!empty($_FILES['logo']['name'])) ? $upload_data['file_name'] : $this->input->post('old_logo'),
        );  
        $this->db->where('company_id', $this->session->userdata('company_id'));
        $result = $this->db->update("company",$this->data);
        return $result;
    }

    public function getCounties($where) {
        if( isset($_POST['new_selected']) ) {
            $ignore = explode(",", $_POST['new_selected']);
            $this->db->where_not_in('id', $ignore);
        }
        $query = $this->db->get_where('countries', $where);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function getParameters($where) {
        $query = $this->db->get_where('system_parameters', $where);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function getCities($where, $where_in = '') {
        if( $where_in != "" ) {
            $this->db->where_in('country_id', $where_in);
        }
        $query = $this->db->get_where('cities', $where);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function getSettings($cCode) {
        $query = $this->db->get_where('system_settings', array('cCode' => $cCode));
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function log_notification($param) {
        $this->db->insert('notifications',$param);
        $result = $this->db->affected_rows();
        return ($result) ? TRUE : FALSE;
    }

    public function getCityByName($city_id) {
        // $cityField = ( $_SESSION['language'] == "arabic" ) ? "state_arabic" : "state";
        $queryCity = $this->db->query("SELECT `state` as state FROM `cities` WHERE `id` = " . $city_id);
        return ( $queryCity->num_rows() == 1 ) ? $queryCity->row()->state : "";
    }
    
	
}