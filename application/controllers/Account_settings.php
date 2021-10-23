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
 * Account Settings Class
 *
 * @package		RCD
 * @category	Controller
 */
class Account_settings extends General {

	// set class variabes
	private $index_page_title = 'Account Settings';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());    

		// set the active menu in sidebar
		$this->data['active_menu'] = 'account_settings';

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

	}

	public function index()
	{	
		// Set page title 
		$this->data['page_title'] = $this->index_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function validate_email()
	{
		// Validate if email address is already existing
		$data = array(
				'edit'		=>	(isset($_POST['id']) AND $_POST['id'] != '') ? array('id',$this->input->post('id')) : FALSE,
				'table'		=>	'users',
				'fields'	=>	array('email' => $this->input->post('email')),
		);

		// If existing display error message
		if(General::validateFields($data) === TRUE) {
			
			// Error message 
			$this->form_validation->set_message( __FUNCTION__ , 'Email Address Already Exists.');

			return FALSE;
		} else {
			// Else email address is not existing
			return TRUE;
		}
	}

	public function save_profile() 
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {

			// Load user model
			$this->load->model('user_model');

			// Set form validation rules
			$this->form_validation->set_rules("firstname", 'First Name' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("lastname", 'Last name' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("email", 'Email Address' ,"trim|xss_clean|required|valid_email|callback_validate_email");
			$this->form_validation->set_rules("phone", 'Phone Number' ,"trim|xss_clean");
			$this->form_validation->set_error_delimiters("","<br />");

			if ($this->form_validation->run()) 
			{
				// Declare array storage for image upload
				$upload_data = array();

				// If image is set then do the upload
				if (!empty($_FILES['profile_picture']['name']))
				{		
					// Generate unique signature filename
					$filename = 'profile-'.rand(0,99999).'-'.strtotime(date("His"));

					// Set upload validation rules
					$config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		realpath('assets/images/users'),
						'max_size'			=>		2000,
						'file_name'			=>		$filename,
						'overwrite'			=>		TRUE
					);

					// Load upload library
					$this->load->library('upload', $config);

					// Upload image and callback if success
					if ($this->upload->do_upload('profile_picture')) {

						// Get uploaded image data
			            $upload_data = $this->upload->data();
			        } else {
			        	// Set response value
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 

				// Save changes user's information
				$result = $this->user_model->saveProfile($upload_data);

				// Success changes
	            if($result){

	            	// Re-declare session value
	            	$this->session->set_userdata('email', $_POST['email']);

	            	// Set response value
	            	$data = array('success' => TRUE, 'message' => $this->lang->line('account_settings_text_17'));
	            } else {
	            	// Set response value
	            	$data = array('success' => FALSE, 'message' => $this->lang->line('account_settings_text_18'));
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


	public function save_password()
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load user model
			$this->load->model('user_model');

			// Set form validation rules
			$this->form_validation->set_rules("current_password",$this->lang->line('account_settings_text_11'),"trim|xss_clean|required");
			$this->form_validation->set_rules("new_password",$this->lang->line('account_settings_text_12'),"trim|xss_clean|required|min_length[6]");
			$this->form_validation->set_rules("repeat_password",$this->lang->line('account_settings_text_13'),"trim|xss_clean|required|matches[new_password]");
			$this->form_validation->set_error_delimiters("<br />","");

			if ($this->form_validation->run()) 
			{	
				// Get user details by user id
				$rsUserDetails = $this->user_model->getUserDetails('', $this->input->post('id'));

				// Validate current password and password saved to database
				$passwordMatched = $this->password->check_password($this->input->post('current_password'), $rsUserDetails->password);
				
				// Success password matched
				if( $passwordMatched ) {

					// Create password hash
					$hashPassword = $this->password->hash($this->input->post('new_password'));
					
					// Save new hash password
					$result = $this->user_model->save_password($hashPassword);

					// Password successfully changed
		            if($result){

		    //         	// Set email arguments
						// $params['newpassword'] = $this->input->post('new_password');
						// $params['email_template'] = 'email_template/password_changed';
						// $params['from_email'] = parent::FROM_EMAIL;
						// $params['from_name'] = parent::SHORT_SYS_TITLE;
						// $params['subject'] = parent::SHORT_SYS_TITLE . ' - Password Changed';

						// // Send the email the template
						// $isSend = $this->bims->send_mail($params);
		            	
		            	// Set response value
		            	$data = array('success' => TRUE, 'message' => 'Password has been changed.');
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => 'There was an error in changing your pasword. Please try again!');
		            }

				} else {
					// Set response value
					$data = array('success' => FALSE, 'message' => 'Current password did not match.');
				}
	            
			} else {
				// Set response value
				$data = array('success' => FALSE, 'message' => validation_errors());
			}

		} catch(Exception $e) {
			// Set response value
			$data = array("success" => FALSE, "message" => $e->getMessage());
		}
		
		// json return value
        die(json_encode($data));
	}

	public function change_avatar()
	{
		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load user model
			$this->load->model('user_model');

			// Load upload library
			$this->load->library('upload');

			// If no image browse, show error message
			if (empty($_FILES['profile_picture']['name'])) {

				// Set error message
				$data = array('success' => FALSE, 'message' => 'You must browse a picture');
			} else {

				$filename = 'profile-'.$this->bims->generateRandomString(8).strtotime(date('His'));

				// Set file config
				$config = array(
					'allowed_types'		=>		'jpg|gif|png',
					'upload_path'		=>		realpath('assets/images/users'),
					'max_size'			=>		3000,
					'file_name'			=>		$filename
					);

				// Init file upload library
				$this->upload->initialize($config);

				// if no picture selected
				if (!$this->upload->do_upload('profile_picture')) {

					// Show image errir
		            $upload_err = array('error' => $this->upload->display_errors());
		            $data = array('success' => FALSE, 'message' => implode("<br>", $upload_err));

		        } else {

		        	// Get upload data
		        	$upload_data = $this->upload->data();

		        	// Save new profile picture
		        	$result = $this->user_model->change_avatar($upload_data);

		        	// If success
		            if( $result ) {
		            	// Show message value
		            	$data = array('success' => TRUE, 'message' => $this->lang->line('account_settings_text_23'));
		            } else {
		            	// Show message value
		            	$data = array('success' => FALSE, 'message' => $this->lang->line('account_settings_text_24'));
		            }
		        }
			}

		} catch(Exception $e) {
			// Show message value
			$data = array("success" => FALSE, "message" => $e->getMessage());
		}
		
		// return json value
        die(json_encode($data));
	}
	

}
