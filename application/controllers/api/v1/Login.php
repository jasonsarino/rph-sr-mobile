<?php
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

/**
 * API Login Class
 *
 * @package		RCD
 * @category	Controller
 */
class Login extends API_Controller {

	function __construct(){

		// init __construct from parent class
		parent::__construct();	  

	}

	// Validate login
	public function validate() {

		header("Access-Control-Allow-Origin: *");

		// API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        // Load models
        $this->load->model('login_model');
        $this->load->model('general_model');
        $this->load->model('user_model');

        $this->form_validation->set_rules("username","Username","trim|xss_clean|required");
		$this->form_validation->set_rules("password","Password","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters("<br />","<br />");

		if ($this->form_validation->run()) 
		{
			// Get user password by email
			$userResults = $this->login_model->validateEmailAddress();

			if ($userResults) 
			{

				// Validate password using phppass library
				$passResult = $this->password->check_password($this->input->post('password'), $userResults->password);

				if( $passResult ) {

					$this->session->set_userdata('user_id', $userResults->id);

					// Get logged in user details
        			$rsUserDetails = $this->user_model->getUserDetails( $this->input->post('username'), $this->session->userdata('user_id'));

        			 $payload = [
			            'token_id' 	=> $this->bims->generateTokenID($rsUserDetails),
			            'firstname' => $rsUserDetails->firstname,
			            'lastname' 	=> $rsUserDetails->lastname,
			        ];

			        // Load Authorization Library or Load in autoload config file
        			$this->load->library('authorization_token');

        			// generate a token
       				$token = $this->authorization_token->generateToken($payload);

					// Record activity log
			    	$this->general_model->log('Mobile App - Login', 'Login', $rsUserDetails->firstname.' '.$rsUserDetails->lastname . ' logged in to the mobile app');

			    	$return = ['status' => true, 'result' => ['message' => 'Access Granted! Redirecting to your account...', 'token' => $token]];
					$return_http = parent::HTTP_OK;

				} else {
					$return = ['status' => false, 'result' => ['message' => 'Invalid Login']];
					$return_http = parent::HTTP_UNAUTHORIZED;
				}

			} else {
				$return = ['status' => false, 'result' => ['message' => 'We can\'t find anyone with ' . $this->input->post('username')]];
				$return_http = parent::HTTP_UNAUTHORIZED;
			}

		} else {
			$return = ['status' => false, 'result' => ['message' => validation_errors()]];
			$return_http = parent::HTTP_UNAUTHORIZED;
		}

		// return data
        $this->api_return( $return, $return_http );


	}

}