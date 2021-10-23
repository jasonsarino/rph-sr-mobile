<?php
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/General.php'; 

require FCPATH . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * General Class
 *
 * @package     RCD
 * @category    Controller
 */
class Manage_users extends General {

	// set db table
	public $db_table = 'users';
	private $index_page_title = 'Manage Users';
	private $add_page_title = 'Add New User';
	private $edit_page_title = 'Edit User';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.' . $this->data['moduleName']);
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

		// set the active menu in sidebar
		$this->data['active_menu'] = 'manage_users';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function datatable()
	{
		// Load user model
		$this->load->model('user_model');

		// Load users list
		$this->data['user_list'] = $result = $this->user_model->getUsers();

		// Render user datatable
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__, $this->data);

	}

	public function validate_email()
	{
		// Set array 
		$data = array(
				'edit'		=>	(isset($_POST['id']) AND $_POST['id'] != '') ? array('id',$this->input->post('id')) : FALSE,
				'table'		=>	'users',
				'fields'	=>	array('email' => $this->input->post('email')),
		);

		// Validate Email Address
		if(General::validateFields($data) === TRUE) {

			// Set error message
			$this->form_validation->set_message( __FUNCTION__ , 'Email Address Already Exists.');

			return FALSE;
		} else {

			// Email address success
			return TRUE;
		}
	}

	public function validate_piid()
	{
		// Set array 
		$data = array(
				'edit'		=>	(isset($_POST['id']) AND $_POST['id'] != '') ? array('id',$this->input->post('id')) : FALSE,
				'table'		=>	'users',
				'fields'	=>	array('piid' => $this->input->post('piid')),
		);

		// Validate Email Address
		if(General::validateFields($data) === TRUE) {

			// Set error message
			$this->form_validation->set_message( __FUNCTION__ , 'PIID Already Exists.');

			return FALSE;
		} else {

			// Email address success
			return TRUE;
		}
	}

	public function add() 
	{
		// Validate user rights
		General::validatePermission('add.' . $this->data['moduleName']);

		// If form is submit
		if(isset($_POST['firstname'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {
				// Load user model
				$this->load->model('user_model');

				// Set form validation rules
				$this->form_validation->set_rules("piid", 'PIID' ,"trim|xss_clean|required|callback_validate_piid");
				$this->form_validation->set_rules("firstname", 'First Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("lastname", 'Last Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("email", 'Email Address' ,"trim|xss_clean|valid_email|required|callback_validate_email");
				$this->form_validation->set_rules("group_id", 'User Group' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("position_id", 'Position' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("phone", 'Mobile Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("address", 'Address' ,"trim|xss_clean");
				$this->form_validation->set_rules("dob", 'Date of Birth' ,"trim|xss_clean");
				$this->form_validation->set_rules("accre_number", 'Accreditation Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("accre_exp_date", 'Accreditation Exp. Date' ,"trim|xss_clean");
				$this->form_validation->set_rules("dhsud_number", 'DHSUD Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("designated_broker", 'Designated Broker' ,"trim|xss_clean");

				if( $this->input->post('group_id') == 7) {
					$this->form_validation->set_rules("division_id", 'Division' ,"trim|xss_clean|required");
				}

				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) {

					// Generate Random Strings
					$password = $this->bims->generateRandomString(6);
					// $password = $this->input->post('password');

					// Hash password
					$hashPassword = $this->password->hash($password);

					// Set upload array
					$upload_data = array();

					// If image is set
					if (!empty($_FILES['profile_picture']['name'])) {	

						// Generate image filename
						$filename = 'profile-'.$this->bims->generateRandomString(8).strtotime(date('His'));

						// Set upload config
						$config = array(
							'allowed_types'		=>		'jpg|jpeg|png',
							'upload_path'		=>		realpath('assets/images/users'),
							'max_size'			=>		2000,
							'file_name'			=>		$filename,
							'overwrite'			=>		TRUE
						);

						// Load upload library
						$this->load->library('upload', $config);

						// Upload image
						if ($this->upload->do_upload('profile_picture')) {

							// Get upload data image
				            $upload_data = $this->upload->data();
				        } else {
				        	//  Set no error
				        	$error = TRUE;

				        	// Set response value
				        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
				        }
					} 

					// Save user
					$result = $this->user_model->save('insert', $hashPassword, $upload_data);

					// If success
		            if( $result ) {

		            	// Set email arguments
						$this->data['firstname'] = $this->input->post('firstname');
						$this->data['to'] = $this->input->post('email');
						$this->data['password'] = $password;
						$subject = parent::SHORT_SYS_TITLE . ' - Your Account Login Credentials';
						$body_email = $this->load->view('email_template/new_user', $this->data, TRUE);

						// $headers = "MIME-Version: 1.0" . "\r\n";
						// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						// $headers .= 'From: '.parent::SHORT_SYS_TITLE.' <'.parent::FROM_EMAIL.'>' . "\r\n";

					 //  	mail($this->data['to'], $subject, $body_email, $headers, "-fsales@rcdpearlhomes.com");

					  	$mail = new PHPMailer();
					  	$mail->setFrom(parent::TO_EMAIL_SR, parent::FROM_MAIL_NAME);
					    $mail->addAddress($this->input->post('email'), $this->input->post('firstname')); 
					    $mail->addReplyTo(parent::TO_EMAIL_SR, parent::FROM_MAIL_NAME);
					    $mail->isHTML(true);    
					    $mail->Subject = $subject;
					    $mail->Body = $body_email;
					    // $mail->send();

		            	// Record activity log
						$log = 'New user with id#'.$result.' has been inserted by ';
						General::log('MANAGE USERS', 'INSERT', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => $this->lang->line('user_text_13'));
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => $this->lang->line('user_text_14'));
		            }
				} else {
					// Set response value
					$data = array('success' => FALSE, 'message' => validation_errors());
				}

			} catch(Exception $e) {
				// Set response value
				$data = array("success" => FALSE, "message" => $e->getMessage());
			}
			
			// Return json value
            die(json_encode($data));
		}

		// Load group model
		$this->load->model('group_model');

		// Load position model
		$this->load->model('position_model');

		// Load division model
		$this->load->model('division_model');

		// Set page title
		$this->data['page_title'] = $this->add_page_title;

		// Get specific asset files in Assets Resources library
		$this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Set active menu in sidebar
		$this->data['active_menu'] = 'add_new_user';
		
		// Load user group list
		$this->data['user_group_list'] = $this->group_model->getData(TRUE);

		// Load position list
		$this->data['position_list'] = $this->position_model->getAll();

		// Load division list
		$this->data['division_list'] = $this->division_model->getAll();

		// Render base page
		$this->load->view('page', $this->data);
	}


	public function edit($id = null)
	{
		// Validate user rights
		General::validatePermission('edit.' . $this->data['moduleName']);

		// Load user model
		$this->load->model('user_model');

		// If form is submit
		if(isset($_POST['firstname'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {

				$this->form_validation->set_rules("piid", 'PIID' ,"trim|xss_clean|required|callback_validate_piid");
				$this->form_validation->set_rules("firstname", 'First Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("lastname", 'Last Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("email", 'Email Address' ,"trim|xss_clean|valid_email|required|callback_validate_email");
				$this->form_validation->set_rules("group_id", 'User Group' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("position_id", 'Position' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("phone", 'Mobile Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("address", 'Address' ,"trim|xss_clean");
				$this->form_validation->set_rules("dob", 'Date of Birth' ,"trim|xss_clean");
				$this->form_validation->set_rules("accre_number", 'Accreditation Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("accre_exp_date", 'Accreditation Exp. Date' ,"trim|xss_clean");
				$this->form_validation->set_rules("dhsud_number", 'DHSUD Number' ,"trim|xss_clean");
				$this->form_validation->set_rules("designated_broker", 'Designated Broker' ,"trim|xss_clean");

				if( $this->input->post('group_id') == 7) {
					$this->form_validation->set_rules("division_id", 'Division' ,"trim|xss_clean|required");
				}

				$this->form_validation->set_error_delimiters("", "<br>");

				if ($this->form_validation->run()) {

					// Set upload array
					$upload_data = array();

					// If image is set
					if (!empty($_FILES['profile_picture']['name'])) {

						// Generate image filename	
						$filename = 'profile-'.$this->bims->generateRandomString(8).strtotime(date('His'));

						// Set config array
						$config = array(
							'allowed_types'		=>		'jpg|jpeg|png',
							'upload_path'		=>		realpath('assets/images/users'),
							'max_size'			=>		2000,
							'file_name'			=>		$filename,
							'overwrite'			=>		TRUE
						);

						// Load upload library
						$this->load->library('upload', $config);

						// Upload image
						if ($this->upload->do_upload('profile_picture')) {

							// Get data image upload 
				            $upload_data = $this->upload->data();
				        } else {

				        	// Set no error
				        	$error = TRUE;

				        	// Set response value
				        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
				        }
					} 

					// Save user
					$result = $this->user_model->save('update', '' ,$upload_data);

					// If success
		            if($result){

		            	// Record activity log
						$log = 'New user with id#'.$result.' has been updated by ';
						General::log('MANAGE USERS', 'UPDATE', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => $this->lang->line('user_text_15'));
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => $this->lang->line('user_text_16'));
		            }
				} else {
					// Set response value
					$data = array('success' => FALSE, 'message' => validation_errors());
				}

			} catch(Exception $e) {
				// Set response value
				$data = array("success" => FALSE, "message" => $e->getMessage());
			}
				
			//return json value
            die(json_encode($data));
		}

		// If id is not set
		if(!isset($id)) {
			die("Invalid id");
		}

		// Load group model
		$this->load->model('group_model');

		// Load position model
		$this->load->model('position_model');

		// Load division model
		$this->load->model('division_model');

		// Set page title
		$this->data['page_title'] = $this->edit_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';
		
		// Load user group list
		$this->data['user_group_list'] = $this->group_model->getData(TRUE);

		// Get user details
		$this->data['user_details'] = $result = $this->user_model->getUserDetails('', $id);

		// Load position list
		$this->data['position_list'] = $this->position_model->getAll();

		// Load division list
		$this->data['division_list'] = $this->division_model->getAll();

		// Set active menu sidebar
		$this->data['active_menu'] = 'manage_users';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function delete($id, $table = null, $permission = null) {
        parent::delete($id, $this->db_table, 'delete.' . $this->data['moduleName']);
    }

    public function validatepiid() {

    	// Set response header to json
		$this->bims->addJSONResponseHeader();

		// Load user model
		$this->load->model('user_model');

		// Validate PIID
		$result = $this->user_model->validate_piid();

		$data = ( $result ) ? ['success' => TRUE, 'message' => 'PIID already exists. Owned by ' . $result->firstname.' '.$result->lastname] : ['success' => FALSE];

		die( json_encode($data) );

    }
	

}
