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
 * Login Class
 *
 * @package		RCD
 * @category	Controller
 */
class Login extends General {

	// set class variabes
	private $index_page_title = 'Login';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
	}

	public function index()
	{
		// Load user model
		$this->load->model('user_model');

		// Set title page
		$this->data['page_title'] = $this->index_page_title;

		// Set default session active to FALSE
		$this->data['session_active'] = FALSE;

		// If user session existing, proceed to login to enter password
		if($this->bims->auth_session() === TRUE){
			$this->data['session_active'] = TRUE;
			$this->data['userDetails'] = $this->user_model->getUserDetails($this->session->userdata('user_id'));
		}  

		// render login page
		$this->load->view("login",$this->data);

	}

	public function validateLogin()
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {

			$this->load->model('login_model');

			$this->form_validation->set_rules("username","Username","trim|xss_clean|required");
			$this->form_validation->set_rules("password","Password","trim|xss_clean|required");
			$this->form_validation->set_error_delimiters("<br />","<br />");

			if ($this->form_validation->run()) 
			{
				// Get user password by email
				$rsUserDetails = $this->login_model->validateEmailAddress();

				if ($rsUserDetails) 
				{
					// Validate password using phppass library
					$result = $this->password->check_password($this->input->post('password'), $rsUserDetails->password);

					if ($result) 
					{
						// Generate tokenID and sessionID 
						$tokenID = $this->bims->generateTokenID($rsUserDetails);
						$sessionID = $this->bims->generateSessionID($rsUserDetails);

						// Set session value
						$this->session->set_userdata('user_id', $rsUserDetails->id);
						$this->session->set_userdata('email', $rsUserDetails->email);
						$this->session->set_userdata('isLoggedAdminIN', TRUE);
						$this->session->set_userdata('group_id', $rsUserDetails->group_id);
						$this->session->set_userdata('company_id', $rsUserDetails->company_id);
						$this->session->set_userdata('token_id', $tokenID);
						$this->session->set_userdata('session_id', $sessionID);

						// Update sessionID and tokenID
						$this->login_model->updateToken($tokenID, $sessionID);

						// Record activity log
						$log = General::getUserProfile()->firstname.' '.General::getUserProfile()->lastname . ' has been Login.';
						General::log('LOGIN', 'LOGIN', $log);

						// Set response value
						$data_arr = array("success" => TRUE, "message" => $this->lang->line('login_text_11'));
					} 
					else {
						// Set response value
						$data_arr = array("success" => FALSE, "message" => $this->lang->line('login_text_12'));
					}
				} 
				else {
					// Set response value
					$data_arr = array("success" => FALSE, "message" => $this->lang->line('login_text_13') . " <strong>" . $this->input->post('email_address') . "</strong>.");
				}
			} 
			else {
				// Set response value
				$data_arr = array("success" => FALSE, "message" => $this->lang->line('login_text_12'));
			}
		
		} catch(Exception $e) {
			// Set response value
			$data_arr = array("success" => FALSE, "message" => $e->getMessage());
		}

        die(json_encode($data_arr));
	}


}
