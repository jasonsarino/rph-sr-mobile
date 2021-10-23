<?php
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/General.php'; 

/**
 * Forgot Password Class
 *
 * @package		Amaalah
 * @category	Controller
 */
class Forgot_password extends General {

	// set class variabes
	private $forgot_page_title = 'Forgot Password';
	private $reset_page_title = 'Reset Password';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	

	}

	public function index()
	{

		// Set page title 
		$this->data['page_title'] = $this->forgot_page_title;

		// Render forgot password page
		$this->load->view("forgot_password",$this->data);

	}

	public function password($token)
	{
		// Load login model
		$this->load->model('login_model');

		// Set page title
		$this->data['page_title'] = $this->reset_page_title;

		// Truncate url code xyzabc to get user id and actual reset password token {user_id}xycabc{token}
		$explode = explode("xyzabc", $token);

		// Get user id
		$user_id = $explode[0];

		// Get actual reset password token
		$token = $explode[1];

		// Validate if token is valid for the user id
		$validateToken = $this->login_model->validateToken($user_id, $token);

		// If validate set and get user id and token
		if ($validateToken) {	

			// Get and display user id
			$this->data['id'] = $validateToken->id;

			// Get and display token
			$this->data['token'] = $token;

			// Render reset password page
			$this->load->view('reset_password', $this->data);
		} else {

			// Display that the token is invalid or already used
			die("Invalid Token.");
		}
	}

	public function validateEmailAddress()
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try
		{
			// Load login model
			$this->load->model('login_model');

			// Generate random string forgot password link
			$fpTokenID = $this->bims->generateRandomString(50);

			// Validate email address
			$result = $this->login_model->validateEmailAddress();

			// Email Address found
			if($result)
			{
				// Update user fpTokenID 
				$this->login_model->updateUserFPToken($fpTokenID);

				// Generated URL token for reset password
				$urltoken = $result->id."xyzabc".$fpTokenID;


				$subject = parent::SHORT_SYS_TITLE . ' - Reset your Password';
				$this->data['firstname'] = $result->firstname;
				$this->data['urltoken'] = $urltoken;
				$body_email = $this->load->view('email_template/forgot_password', $this->data, TRUE);

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: '.parent::SHORT_SYS_TITLE.' <'.parent::FROM_EMAIL.'>' . "\r\n";

			  	$isSend = mail($this->input->post('email_address'), $subject, $body_email, $headers, "-fsales@rcdpearlhomes.com");

				// If email sent
				if ($isSend)  {
					// Set response value
					$data_arr['success'] = TRUE;
					$data_arr['message'] = 'An email has been sent to '.$this->input->post('email'). ' with instructions on how to reset your password. Please check your "Spam" or "Junk" email folders if you do not see the email within the next 10 minutes.';
				}
				else {
					// Set response value
					$data_arr['success'] = FALSE;
					$data_arr['message'] = "There was an error in sending verification code to your email. Please try again.";
				}
			}
			else {
				// Set response value
				$data_arr['success'] = FALSE;
				$data_arr['message'] = 'Email Address not found in database.';
			}
		} catch(Exception $e) {
			// Set response value
			$data_arr = array("success" => FALSE, "message" => $e->getMessage());
		}
		
		// return json value
		die(json_encode($data_arr));
	}

	public function resetpassword()
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load user model
			$this->load->model('user_model');

			// Form set rules
			$this->form_validation->set_rules("new_password","New Password","trim|xss_clean|required|min_length[6]");
			$this->form_validation->set_rules("repeat_password","Repeat Password","trim|xss_clean|required|matches[new_password]");
			$this->form_validation->set_error_delimiters("<br />","");

			if ($this->form_validation->run()) 
			{	
				// Get user details by user id
				$rsUserDetails = $this->user_model->getUserDetails('', $this->input->post('id'));
				
				// Hash password
				$hashPassword = $this->password->hash($this->input->post('new_password'));

				// Save new password
				$result = $this->user_model->save_password($hashPassword);

				// Success save new password
	            if($result){

					$subject = parent::SHORT_SYS_TITLE . ' - Password Changed';
					$this->data['newpassword'] = $this->input->post('new_password');
					$this->data['firstname'] = $rsUserDetails->firstname;
					$body_email = $this->load->view('email_template/password_changed', $this->data, TRUE);

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: '.parent::SHORT_SYS_TITLE.' <'.parent::FROM_EMAIL.'>' . "\r\n";

				  	$isSend = mail($rsUserDetails->email, $subject, $body_email, $headers, "-fsales@rcdpearlhomes.com");


					// Set response value
	            	$data = array('success' => TRUE, 'message' => 'Your password has been changed. Back to login to proceed to your account.');
	            } else {
	            	// Set response value
	            	$data = array('success' => FALSE, 'message' => 'There was an error in saving your password. Please try again!');
	            }
	            
			} else {
				// Set response value
				$data = array('success' => FALSE, 'message' => validation_errors());
			}

		} catch(Exception $e) {
			// Set response value
			$data = array("success" => FALSE, "message" => $e->getMessage());
		}
		
		// return json value
        die(json_encode($data));
	}

}
