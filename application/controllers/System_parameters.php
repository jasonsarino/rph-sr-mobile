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
 * System Parameters Class
 *
 * @package     RCD
 * @category    Controller
 */
class System_parameters extends General {

	// set db table
	public $db_table = 'system_parameters';

	function __construct() {

		// init __construct from parent class
		parent::__construct();	

		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set the active menu in sidebar
		$this->data['active_menu'] = 'system_parameters';

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.' . $this->data['moduleName']);
	}

	public function index() {

		// Set page title
		$this->data['page_title'] = 'System Parameters';

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets('system_parameters')['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets('system_parameters')['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets('system_parameters')['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function project_fields_datatable() {

		// Load param model
		$this->load->model('parameters_model');

		// Get project fields
		$this->data['param_list'] = $result = $this->parameters_model->getAllProjectFields();

		// Render datatable page
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__ . '.php', $this->data);

	}

	public function partner_types_datatable() {

		// Load param model
		$this->load->model('parameters_model');

		// Get partner Types
		$this->data['param_list'] = $result = $this->parameters_model->getAllPartnerTypes();

		// Render datatable page
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__ . '.php', $this->data);

	}

	public function partner_skills_datatable() {

		// Load param model
		$this->load->model('parameters_model');

		// Get partner skills
		$this->data['param_list'] = $result = $this->parameters_model->getAllPartnerSkills();

		// Render datatable page
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__ . '.php', $this->data);

	}

	public function cities_datatable() {

		// Load param model
		$this->load->model('parameters_model');

		// Get partner skills
		$this->data['param_list'] = $result = $this->parameters_model->getAllCities();

		// Render datatable page
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__ . '.php', $this->data);

	}

	public function edit_param() {
		// Validate user rights
		General::validatePermission('edit.' . $this->data['moduleName']);

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load group model
			$this->load->model('parameters_model');

			// Set form validation rules
			$this->form_validation->set_rules("param_english", 'Parameter English' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("param_arabic", 'Parameter Arabic' ,"trim|xss_clean|required");
			$this->form_validation->set_error_delimiters("","<br />");

			if ($this->form_validation->run()) 
			{	

				$tableType = $this->input->post('tableType');
				$tableType = str_replace("_", " ", $tableType);
				$tableType = ucwords($tableType);

				// Save param
				$result = $this->parameters_model->edit_param();

				if( $result ) {
					// Record activity log
					$log = $tableType . ' has been updated ';
					General::log(ucwords($tableType), 'UPDATE', $log);

					// Set response value
	            	$data = array('success' => TRUE);
				} else {
					// Set response value
	            	$data = array('success' => FALSE, 'message' => 'There was an error in updating ' . $tableType . '.Please try again.');
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

	public function save_param() 
	{
		// Validate user rights
		General::validatePermission('add.' . $this->data['moduleName']);

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load group model
			$this->load->model('parameters_model');

			// Set form validation rules
			$this->form_validation->set_rules("param_english", 'Parameter English' ,"trim|xss_clean|required");
			$this->form_validation->set_rules("param_arabic", 'Parameter Arabic' ,"trim|xss_clean|required");
			$this->form_validation->set_error_delimiters("","<br />");

			if ($this->form_validation->run()) 
			{	

				$tableType = $this->input->post('tableType');
				$tableType = str_replace("_", " ", $tableType);
				$tableType = ucwords($tableType);

				// Save param
				$result = $this->parameters_model->save_param();

				if( $result ) {
					// Record activity log
					$log = 'New ' . $tableType . ' has been added ';
					General::log(ucwords($tableType), 'INSERT', $log);

					// Set response value
	            	$data = array('success' => TRUE);
				} else {
					// Set response value
	            	$data = array('success' => FALSE, 'message' => 'There was an error in saving ' . $tableType . '.Please try again.');
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

	public function deleteParam($id, $code) {
		// delete to parent class
		$this->bims->addJSONResponseHeader();
        $query = $this->db->query("UPDATE `system_parameters` SET `nStatus` = 0 WHERE `id` = " . $id);
        $data = array("success" => TRUE, "message" => 'Parameters has been deleted.');
        die(json_encode($data));
    }

    public function get_param_details($id, $table) {
    	// Set response header to json
		$this->bims->addJSONResponseHeader();

		// Load system param model
		$this->load->model('parameters_model');

		// Get param details
		$result = $this->parameters_model->getDetails($id, $table);

		if( $table == "project_field" ) {

			$data = array(
				'param_id'		=>	$result->id,
				'param_english'	=>	$result->project_field,
				'param_arabic'	=>	$result->project_field_arabic
			);

		} else if( $table == "partner_type" ) {

			$data = array(
				'param_id'		=>	$result->id,
				'param_english'	=>	$result->partner_type,
				'param_arabic'	=>	$result->partner_type_arabic
			);

		} else if( $table == "partner_skills" ) {

			$data = array(
				'param_id'		=>	$result->id,
				'param_english'	=>	$result->skills,
				'param_arabic'	=>	$result->skills_arabic
			);

		} else if( $table == "cities" ) {

			$data = array(
				'param_id'		=>	$result->id,
				'param_english'	=>	$result->state,
				'param_arabic'	=>	$result->state_arabic
			);

		}

		// return json value
		die(json_encode($data));
    }

    // Delete parameters
    public function delete_parameters($id, $table) {

    	// Set response header to json
		$this->bims->addJSONResponseHeader();

		// Load system param model
		$this->load->model('parameters_model');

		$result = $this->parameters_model->delete_param($id, $table);

		if( $result ) {
			$data = array('success' => TRUE);
		} else {
			$data = array('success' => FALSE, 'message' => 'There was an error in deleting parameters. Please try again.');
		}

		// return json value
		die(json_encode($data));

    }
	

}
