<?php
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/General.php'; 

/**
 * Logout Class
 *
 * @package     RCD
 * @category    Controller
 */
class Logout extends General {

	function __construct() {
		// init __construct from parent class
		parent::__construct();	
	}

	public function index()
	{
		// Load login model
		$this->load->model('login_model');

		// Set blank default
		$tokenID = '';
		$sessionID = '';

		// Update sessionID and tokenID
		$this->login_model->updateToken($tokenID, $sessionID);


		// Unset all session menus variables
		$this->session->unset_userdata(array(
                'user_id'          	=>      '',
                'email'      		=>      '',
                'isLoggedAdminIN'      	=>      FALSE,
                'group_id'      	=>      '',
                'company_id'      	=>      '',
                'token_id'      	=>      '',
                'session_id'      	=>      ''
        ));
        $this->session->sess_destroy();    

		redirect(base_url());

	}

}
