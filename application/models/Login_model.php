<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Login Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class Login_model extends CI_Model{
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

	public function updateToken($tokenID, $sessionID) {
		// Update user tokenID and sessionID.
		$this->data = array(
			'token_id'			=>		$tokenID,
			'session_id'		=>		$sessionID
		);	
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->update("users",$this->data);
		return ($result > 0) ? TRUE : FALSE;
	}
	
	public function validateEmailAddress() {
		// Validate login email address
		$this->db->where(" (email = '".$this->input->post('username')."' OR piid = '".$this->input->post('username')."') AND nStatus=1 AND isEnabled=1");
        $query = $this->db->get('users');
        return ($query->num_rows() == 1) ? $query->row() : FALSE;
	}

	public function updateUserFPToken($token_id) {
		$this->data = array('token_id' => $token_id);
		$this->db->where('email',$this->input->post('email_address'));
		return $this->db->update("users",$this->data);
	}

	public function validateToken($user_id, $token_id) {
		// Validate forgot password token as user id
		 $this->db->where(array(
                'id'      		=>      $user_id,
                'token_id'      =>      $token_id,
				'nStatus'		=>		1
        ));
        $query = $this->db->get('users');
        return ($query->num_rows() == 1) ? $query->row() : false;
	}

	public function register($password) {
		// Add Company
		$subscriber = 0;
		if(isset($_REQUEST['subscriber'])) {
			$subscriber = 1;
		}
		$this->db->query("INSERT INTO `company`(`name`,`subscriber`) VALUES('".$this->input->post('company_name')."', '".$subscriber."')");
		$company_id = $this->db->insert_id();

		// Add user group
		$this->db->query("INSERT INTO `user_group`(`company_id`,`group_name`,`privileges`,`isFixed`) VALUES('".$company_id."','Administrator','FULL-ACCESS',1)");
		$group_id = $this->db->insert_id();

		$this->data = array(
			'company_id'		=>		$company_id,
			'group_id'			=>		$group_id,
			'firstname'			=>		$this->input->post('firstname'),
			'lastname'			=>		$this->input->post('lastname'),
			'email'				=>		$this->input->post('email'),
			'password'			=>		$password,
			'isAdmin'			=>		1,
			'nStatus'			=>		0
		);	
		
		$result = $this->db->insert("users",$this->data);
		return $result ? $this->db->insert_id() : FALSE;
	}

	public function validate_company_name() {
		// Validate company name if exists
		$this->db->select("name");
		$this->db->where(array(
			'name'			=>		$this->input->post('company_name'),
			'nStatus'		=>		1
		));	
		$query = $this->db->get("company");
		return ($query->num_rows() == 1) ? TRUE : FALSE;	
	}
	
}