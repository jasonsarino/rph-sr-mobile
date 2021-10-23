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
 * General Settings Class
 *
 * @package     RCD
 * @category    Controller
 */
class General_settings extends General {

	// set class variabes
	public $db_table = 'company';
	private $index_page_title = 'General Settings';
	private $add_page_title = 'Add New Bulletin Board';
	private $edit_page_title = 'Edit Bulletin Board';

	function __construct() {

		// init __construct from parent class
		parent::__construct();	

		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set the active menu in sidebar
		$this->data['active_menu'] = 'general_settings';

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.general_settings');
	}

	public function index() {

		// Load system param model
		$this->load->model('general_settings_model');

		// Set page title
		$this->data['page_title'] = $this->index_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		$this->data['details'] = $this->general_settings_model->getDetails();
		// Render base page
		$this->load->view("page", $this->data);

	}

	public function save() 
	{

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load group model
			$this->load->model('general_settings_model');

			// Set form validation rules
			$this->form_validation->set_rules("phone1", 'Contact Number' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("primary_email", 'Email Address' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("address1", 'Address' ,"trim|xss_clean|required");
			$this->form_validation->set_error_delimiters("","<br />");

			if ($this->form_validation->run()) 
			{	

				$result = $this->general_settings_model->save();

				if( $result ) {
					// Record activity log
					$log = 'Settings has been updated by ';
					General::log('GENERAL SETTINGS', 'UPDATE', $log);

					// Set response value
	            	$data = array('success' => TRUE, 'message' => 'Settings has been updated.');
				} else {
					// Set response value
	            	$data = array('success' => FALSE, 'message' => 'There was an error in saving the settings. Please try again.');
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
