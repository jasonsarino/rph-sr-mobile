<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * User Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class User_model extends CI_Model{

	private $db_table = 'users';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

	public function getUserDetails($email, $user_id = '', $api_token = '') {
		// Get user details
		$this->db->select('A.isAdmin, A.company_id, A.group_id, A.job_title, A.id, A.firstname, A.lastname, A.email, A.phone, A.profile_picture, 
			A.tl_sd, A.isEnabled, A.tl_sd, A.token_id, A.session_id, A.username, A.password, B.privileges, B.group_name, A.phone, A.piid, A.position_id, 
			A.hasDivision, A.division_id, A.dob, A.address, A.accre_number, A.accre_exp_date, A.dhsud_number, A.designated_broker, C.position, D.division');
		if($user_id != '') {
			$this->db->where('A.id', $user_id);	
		} 

		if($email != '') {
			$this->db->where('A.email', $email);	
		}

		if($api_token != '') {
			$this->db->where('A.api_token', $api_token);	
		}
		
		$this->db->join('user_group B', 'B.id = A.group_id', 'LEFT OUTER');
		$this->db->join('positions C', 'C.id = A.position_id', 'LEFT OUTER');
		$this->db->join('divisions D', 'D.id = A.division_id', 'LEFT OUTER');
		$query = $this->db->get($this->db_table ." A");
		return $query->row();
	}

	public function getUsers() {
		// Get all user
		$this->db->select('A.isEnabled, A.profile_picture,B.group_name,A.job_title, A.username, A.firstname, A.lastname, A.email, A.id, A.nStatus, A.isAdmin, A.phone');
		$this->db->join('user_group B', 'B.id = A.group_id', 'LEFT OUTER');
		$this->db->where(array('A.company_id' => $this->session->userdata('company_id'), 'A.nStatus' => 1));
		$query = $this->db->get($this->db_table . ' A');
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}

	public function inactivate($id) {
		// Set user as inactive
		$query = $this->db->query('UPDATE `users` SET `nStatus` = 0 WHERE `id` = ' . $id);
		return $query;
	}

	public function change_avatar($upload_data) {
		// Change user avatar
		$this->data = array(
            'profile_picture'          =>      $upload_data['file_name']
        );  
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->db_table,$this->data);
        $result = $this->db->affected_rows();
        return $result;
	}

	public function save_password($hashPassword) {
		// Save user password
		$this->data = array(
			'password'			=>		$hashPassword
		);	
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->db_table,$this->data);
		$result = $this->db->affected_rows();
		return $result;
	}

	public function saveProfile($upload_data = array()) {
		// Save user profile
		$this->data = array(
			'firstname'			=>		$this->input->post('firstname'),
			'lastname'			=>		$this->input->post('lastname'),
			'email'				=>		$this->input->post('email'),
			'phone'				=>		$this->input->post('phone'),
			// 'profile_picture'	=>		(!empty($_FILES['profile_picture']['name'])) ? $upload_data['file_name'] : $this->input->post('old_image'),
		);	
		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update($this->db_table,$this->data);
		return $result;
	}

	public function save($action, $password = '', $upload_data = array()) {
		// Save and update user

		$hasDivision = 0;

		if( $this->input->post('group_id') == 7 ) {
			$hasDivision = 1;
		}

    	if($action == "insert") {
    		$this->data = array(
    			'company_id'		=>		$this->session->userdata('company_id'),
				'piid'				=>		$this->input->post('piid'),
				'firstname'			=>		$this->input->post('firstname'),
				'lastname'			=>		$this->input->post('lastname'),
				'group_id'			=>		$this->input->post('group_id'),
				'email'				=>		$this->input->post('email'),
				'phone'				=>		$this->input->post('phone'),
				'username'			=>		$this->input->post('username'),
				'position_id'		=>		$this->input->post('position_id'),
				'address'			=>		$this->input->post('address'),
				'dob'				=>		date("Y-m-d", strtotime($this->input->post('dob'))),
				'accre_number'		=>		$this->input->post('accre_number'),
				'accre_exp_date'	=>		date("Y-m-d", strtotime($this->input->post('accre_exp_date'))),
				'dhsud_number'		=>		$this->input->post('dhsud_number'),
				'designated_broker'	=>		$this->input->post('designated_broker'),
				'hasDivision'		=>		$hasDivision,
				'division_id'		=>		( isset($_POST['division_id']) AND !empty($_POST['division_id'])) ? $this->input->post('division_id') : "",
				'createdByUserID'	=>		$this->session->userdata('user_id'),
				'profile_picture'	=>		(!empty($_FILES['profile_picture']['name'])) ? $upload_data['file_name'] : '',
				'password'			=>		$password
			);	
			$this->db->insert($this->db_table,$this->data);
			$result = $this->db->affected_rows();
			return ($result) ? $this->db->insert_id() : FALSE;
    	} 
    	else if($action == "update") {
    		$this->data = array(
    			'piid'				=>		$this->input->post('piid'),
				'firstname'			=>		$this->input->post('firstname'),
				'lastname'			=>		$this->input->post('lastname'),
				'group_id'			=>		$this->input->post('group_id'),
				'email'				=>		$this->input->post('email'),
				'phone'				=>		$this->input->post('phone'),
				'position_id'		=>		$this->input->post('position_id'),
				'address'			=>		$this->input->post('address'),
				'dob'				=>		date("Y-m-d", strtotime($this->input->post('dob'))),
				'accre_number'		=>		$this->input->post('accre_number'),
				'accre_exp_date'	=>		date("Y-m-d", strtotime($this->input->post('accre_exp_date'))),
				'dhsud_number'		=>		$this->input->post('dhsud_number'),
				'designated_broker'	=>		$this->input->post('designated_broker'),
				'hasDivision'		=>		$hasDivision,
				'division_id'		=>		( isset($_POST['division_id']) AND !empty($_POST['division_id'])) ? $this->input->post('division_id') : "",
				'profile_picture'	=>		(!empty($_FILES['profile_picture']['name'])) ? $upload_data['file_name'] : $this->input->post('old_image'),
				'modifiedByUserID'	=>		$this->session->userdata('user_id')
			);	
			$this->db->where('id', $this->input->post('id'));
			$result = $this->db->update($this->db_table,$this->data);
			return $result;
    	} else {
    		return FALSE;
    	}
    	
    }

    public function change_password($password, $reset = FALSE) {
		if($reset === TRUE) {
			$this->data = array(
				'password'	=>		$password,
				'fpTokenID' =>		''
			);	
			$this->db->where('id', $this->input->post('user_id'));
		} else {
			$this->data = array(
				'password'	=>		$password
			);	
			$this->db->where('id', $this->session->userdata('user_id'));
		}
		
		$result = $this->db->update($this->db_table,$this->data);
		return $result;
    }

    public function validate_piid() {
    	if( isset($_POST['user_id']) ) {
    		$this->db->where('id !='. $_POST['user_id']);
    	}
    	$query = $this->db->get_where($this->db_table, ['piid' => $this->input->post('piid'), 'nStatus' => 1]);
    	return ( $query->num_rows() == 1 ) ? $query->row() : FALSE;
    }

    public function update_api_token($token) {
    	$this->data = array(
			'api_token'				=>		$token
		);	
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->update($this->db_table,$this->data);
		return $result;
    }
	
	
}