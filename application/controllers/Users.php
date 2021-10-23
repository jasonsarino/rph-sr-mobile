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
 * General Class
 *
 * @package     RCD
 * @category    Controller
 */
class Users extends General {

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
	}

	public function jobseekers() {
		// Set page title
		$this->data['page_title'] = "Jobseekers";

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['jobseekers']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['jobseekers']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['jobseekers']['jsextend'];
		$this->data['file'] = '/users/jobseekers.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'jobseekers';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function jobseeker_datatable() {
		// Load user model
		$this->load->model('customer_model');

		// Load users list
		$this->data['user_list'] = $result = $this->customer_model->getJobseekers();

		// Render user datatable
		$this->load->view('users/jobseeker_datatable', $this->data);
	}

	public function disableUser($id, $table = null, $permission = null) {
        parent::disableData($id, $table, 'disable.jobseeker');
    }

    public function enabledUser($id, $table = null, $permission = null) {
        parent::enabledUser($id, $table, 'enable.jobseeker');
    }

    public function deleteUser($id, $table = null, $permission = null) {
        parent::deleteUser($id, $table, 'delete.jobseeker');
    }





    public function clients() {
		// Set page title
		$this->data['page_title'] = "Clients";

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['clients']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['clients']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['clients']['jsextend'];
		$this->data['file'] = '/users/clients.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'clients';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function client_datatable() {
		// Load user model
		$this->load->model('customer_model');

		// Load users list
		$this->data['user_list'] = $result = $this->customer_model->getClients();

		// Render user datatable
		$this->load->view('users/client_datatable', $this->data);
	}




	public function agencies() {
		// Set page title
		$this->data['page_title'] = "Agencies";

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['agencies']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['agencies']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['agencies']['jsextend'];
		$this->data['file'] = '/users/agencies.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'agencies';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function agencies_datatable() {
		// Load user model
		$this->load->model('customer_model');

		// Load users list
		$this->data['user_list'] = $result = $this->customer_model->getAgencies();

		// Render user datatable
		$this->load->view('users/agencies_datatable', $this->data);
	}

	public function edit_jobseeker($id = '') 
	{
		if( !isset($id) ) 
			die("Invalid ID");

		$this->load->model('customer_model');

		$this->data['jobseekerDetails'] = $this->customer_model->getJobseekerDetails($id);
		$this->data['getCounties'] = parent::getCounties();
        $this->data['getNationalities'] = parent::getParameters('nationality');
        $this->data['getReligion'] = parent::getParameters('religion');
        $this->data['getOccupation'] = parent::getParameters('occupation');
        $this->data['getHasPassportFor'] = parent::getParameters('hasPassportFor');
        $this->data['getEducation'] = parent::getParameters('education');
        $this->data['getLanguage'] = parent::getParameters('languages');
        $this->data['getSkills'] = parent::getParameters('skills');
        $this->data['getHowDidYou'] = parent::getParameters('how_did_you_hear_about_amaalah');
        $this->data['getSalaryRange'] = parent::getSalaryRange();

        // Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['edit_jobseekers']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['edit_jobseekers']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['edit_jobseekers']['jsextend'];

		$this->data['page_title'] = "Edit Jobseeker";

		$this->data['file'] = '/users/edit_jobseeker.php';

        $this->load->view("page", $this->data);


	}

	public function save_jobseeker_edit() {

		$this->bims->addJSONResponseHeader();

		try {
			$this->load->model('customer_model');
			$this->form_validation->set_rules("firstname", $this->lang->line("registration_text062") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("lastname", $this->lang->line("registration_text063") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("country", $this->lang->line("client_text004") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("city", $this->lang->line("registration_text014") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("nationality", $this->lang->line("client_text003") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("religion", $this->lang->line("domestic_worker_text002") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("gender", $this->lang->line("registration_text065") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("dob", $this->lang->line("registration_text068") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("have_child_care_experience", $this->lang->line("registration_text085") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("have_elderly_care_experience", $this->lang->line("registration_text086") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("visa_status", $this->lang->line("domestic_worker_text008") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("current_occupation", $this->lang->line("registration_text069") ,"trim|xss_clean");
			$this->form_validation->set_rules("about_me", $this->lang->line("registration_text061") ,"trim|xss_clean");
			$this->form_validation->set_rules("email_address", $this->lang->line("login_text_05") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("phone_number", $this->lang->line("customer_text_10") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("how_did_you_hear_about_amaalah", $this->lang->line("custom007") ,"trim|xss_clean|required");

			if($this->input->post('has_health_problem') == '1') {
				$this->form_validation->set_rules("has_health_problem_value", $this->lang->line("controller_text023") ,"trim|xss_clean|required");
			}

			$this->form_validation->set_error_delimiters("","<br />");

			if ($this->form_validation->run())  
			{
				$error = FALSE;
				$passport_image_data = array();
				$visa_image_data = array();
				$driver_license_image_data = array();
				$photo_data = array();

				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$dob = strtotime($this->input->post('dob'));

				// passport_image
				if (!empty($_FILES['passport_image']['name'])) {	
					$filename = 'passport_image_'.$firstname.'_'.$lastname.$dob.rand(0,99999).'-'.strtotime(date("His"));

					$passport_image_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/jobseeker/passport',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($passport_image_config);
					if ($this->upload->do_upload('passport_image')){
			            $passport_image_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// passport_image

				// visa_image
				if (!empty($_FILES['visa_image']['name'])) {	
					$filename = 'visa_image_'.$firstname.'_'.$lastname.$dob.rand(0,99999).'-'.strtotime(date("His"));
					$visa_image_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/jobseeker/visa',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($visa_image_config);
					if ($this->upload->do_upload('visa_image')){
			            $visa_image_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// visa_image

				// driver_license_image
				if (!empty($_FILES['driver_license_image']['name'])) {	
					$filename = 'driver_license_image_'.$firstname.'_'.$lastname.$dob.rand(0,99999).'-'.strtotime(date("His"));
					$driver_license_image_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/jobseeker/driver_license',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($driver_license_image_config);
					if ($this->upload->do_upload('driver_license_image')){
			            $driver_license_image_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// driver_license_image

				// photo
				if (!empty($_FILES['photo']['name'])) {	
					$filename = 'photo_'.$firstname.'_'.$lastname.$dob.rand(0,99999).'-'.strtotime(date("His"));
					$photo_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/jobseeker/photo',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($photo_config);
					if ($this->upload->do_upload('photo')){
			            $photo_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// photo

				if( !$error ) {
					$uploadData = array(
						'passport_image_data' 		=> 	$passport_image_data, 
						'visa_image_data' 			=> 	$visa_image_data, 
						'driver_license_image_data' => 	$driver_license_image_data, 
						'photo_data' 				=> 	$photo_data
					);

					$password = $this->input->post('password');
					if( $password != "" ) {
						$hashPassword = $this->password->hash($password);
					} else {
						$hashPassword = $this->input->post('old_password');
					}
					
					$result = $this->customer_model->edit_worker($uploadData, $hashPassword);

		            if($result){
		            	$data = array('success' => TRUE, 'message' => $this->lang->line("service_section_text075"));
		            } else {
		            	$data = array('success' => FALSE, 'message' => $this->lang->line("service_section_text076"));
		            }
				}
				
	            
			} else {
				$data = array('success' => FALSE, 'message' => validation_errors());
			}

		} catch(Exception $e) {
			$data = array("success" => FALSE, "message" => $e->getMessage());
		}
		
        die(json_encode($data));
	}


	public function edit_client($id = '') 
	{
		if( !isset($id) ) 
			die("Invalid ID");

		$this->load->model('customer_model');

		$this->data['cDetails'] = $this->customer_model->getClientDetails($id);

        // Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['edit_client']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['edit_client']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['edit_client']['jsextend'];

		$this->data['getCounties'] = parent::getCounties();
        $this->data['getNationalities'] = parent::getParameters('nationality');
        $this->data['getReligion'] = parent::getParameters('religion');
        $this->data['getOccupation'] = parent::getParameters('occupation');
        $this->data['getLanguage'] = parent::getParameters('languages');
        $this->data['getEducation'] = parent::getParameters('education');
		$this->data['getSkills'] = parent::getParameters('skills');
		$this->data['getHowDidYou'] = parent::getParameters('how_did_you_hear_about_amaalah');
        $this->data['getSalaryRange'] = parent::getSalaryRange();
        
		$this->data['page_title'] = "Edit Client";

		$this->data['file'] = '/users/edit_client.php';

        $this->load->view("page", $this->data);


	}


	public function save_client_edit() {
		$this->bims->addJSONResponseHeader();

		try {

			$this->load->model('customer_model');

			$this->form_validation->set_rules("fullname", $this->lang->line("registration_text034") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("country", $this->lang->line("client_text004") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("nationality", $this->lang->line("client_text003") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("religion", $this->lang->line("domestic_worker_text002") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("number_people_living", $this->lang->line("registration_text040") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("starting_date", $this->lang->line("registration_text042") ,"trim|xss_clean");
			$this->form_validation->set_rules("duration_of_stay", $this->lang->line("registration_text043") ,"trim|xss_clean");
			$this->form_validation->set_rules("looking_for", $this->lang->line("registration_text045") ,"trim|xss_clean");
			$this->form_validation->set_rules("preferred_nationalities", $this->lang->line("registration_text047") ,"trim|xss_clean");
			$this->form_validation->set_rules("monthly_salary", $this->lang->line("registration_text050") ,"trim|xss_clean");
			$this->form_validation->set_rules("child_people_take_care_of", $this->lang->line("registration_text052") ,"trim|xss_clean");
			$this->form_validation->set_rules("require_education_level", $this->lang->line("registration_text054") ,"trim|xss_clean");
			$this->form_validation->set_rules("min_child_exp", $this->lang->line("registration_text056") ,"trim|xss_clean");
			$this->form_validation->set_rules("email_address", $this->lang->line("login_text_05") ,"trim|xss_clean");
			$this->form_validation->set_rules("phone_number", $this->lang->line("customer_text_10") ,"trim|xss_clean");
			$this->form_validation->set_rules("how_did_you_hear_about_amaalah", $this->lang->line("custom007") ,"trim|xss_clean|required");
			$this->form_validation->set_error_delimiters('', '<br />');

			if($this->form_validation->run()) {	

				$error = FALSE;
				$photo_data = array();

				// photo
				if (!empty($_FILES['photo']['name'])) {	
					$filename = 'client_'.$_POST['fullname'].'-'.strtotime(date("His"));
					$photo_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/clients/photo',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($photo_config);
					if ($this->upload->do_upload('photo')){
			            $photo_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// photo

				if( !$error ) {
					
					$password = $this->input->post('password');
					if( $password != "" ) {
						$hashPassword = $this->password->hash($password);
					} else {
						$hashPassword = $this->input->post('old_password');
					}

					$result = $this->customer_model->update_profile($photo_data, $hashPassword);
				}

			} else {
				$data_arr = array('success' => FALSE, 'message' => validation_errors());
			}


			if( $result ) {
				$data_arr = array('success' => TRUE, 'message' => $this->lang->line("controller_text009"));
			} else {
				$data_arr = array('success' => FALSE, 'message' => $this->lang->line("controller_text010"));
			}

			

		} catch(Exception $e) {
			$data_arr = array("success" => FALSE, "message" => $e->getMessage());
		}
		die(json_encode($data_arr));
	}

	public function edit_agency($id = '') {
		if( !isset($id) ) 
			die("Invalid ID");

		$this->load->model('customer_model');

		$this->data['cDetails'] = $this->customer_model->getAgencyDetails($id);

        // Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('Users')['edit_client']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('Users')['edit_client']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('Users')['edit_client']['jsextend'];
        $this->data['getCounties'] = parent::getCounties();
		$this->data['getCities'] = parent::getAllCities(array('157','148')); 
		$this->data['getHowDidYou'] = parent::getParameters('how_did_you_hear_about_amaalah');
		$this->data['page_title'] = "Edit Agency";

		$this->data['file'] = '/users/edit_agency.php';

        $this->load->view("page", $this->data);
	}

	public function save_agency_edit() {
		$this->bims->addJSONResponseHeader();

		try {

			$this->load->model('customer_model');

			$this->form_validation->set_rules("agency_name", "Agency Name" ,"trim|xss_clean|required");
			$this->form_validation->set_rules("email_address", $this->lang->line("modal_text007") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("phone_number", $this->lang->line("registration_text002") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("city", $this->lang->line("registration_text014") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("commercial_register", $this->lang->line("registration_text015") ,"trim|xss_clean|required");
			$this->form_validation->set_rules("how_did_you_hear_about_amaalah", $this->lang->line("custom007") ,"trim|xss_clean");
			$this->form_validation->set_rules("about_us", $this->lang->line("menubar_text01") ,"trim|xss_clean|required");
			$this->form_validation->set_error_delimiters('', '<br />');

			if($this->form_validation->run()) {	

				$error = FALSE;
				$photo_data = array();

				// photo
				if (!empty($_FILES['photo']['name'])) {	
					$filename = 'agency_'.$_POST['agency_name'].'-'.strtotime(date("His"));
					$photo_config = array(
						'allowed_types'		=>		'jpg|jpeg|png',
						'upload_path'		=>		DOCUMENT_MAIN_PATH . 'files/images/agencies/photo',
						'max_size'			=>		200000,
						'file_name'			=>		strtoupper($filename),
						'overwrite'			=>		TRUE
					);
					$this->load->library('upload');
					$this->upload->initialize($photo_config);
					if ($this->upload->do_upload('photo')){
			            $photo_data = $this->upload->data();
			        } else {
			        	$error = TRUE;
			        	$data = array('success' => FALSE, 'message' =>  $this->upload->display_errors());
			        }
				} 
				// photo

				if( !$error ) {

					$password = $this->input->post('password');
					if( $password != "" ) {
						$hashPassword = $this->password->hash($password);
					} else {
						$hashPassword = $this->input->post('old_password');
					}
					
					$result = $this->customer_model->updateAgencyProfile($photo_data, $hashPassword);

					if( $result ) {
						$data_arr = array('success' => TRUE, 'message' => $this->lang->line("controller_text009"));
					} else {
						$data_arr = array('success' => FALSE, 'message' => $this->lang->line("controller_text010"));
					}
				}

			} else {
				$data_arr = array('success' => FALSE, 'message' => validation_errors());
			}


			

			

		} catch(Exception $e) {
			$data_arr = array("success" => FALSE, "message" => $e->getMessage());
		}
		die(json_encode($data_arr));
	}

	public function show_hide( $id, $status ) {

		$this->bims->addJSONResponseHeader();
		
		$result = $this->db->query("UPDATE `jobseeker` SET `hide_show` = " . $status . " WHERE `id` = " . $id);

		$data_arr = array('success' => TRUE, 'message' => 'Jobseeker has been updated.');

		die(json_encode($data_arr));

	}


}