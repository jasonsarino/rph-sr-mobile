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
 * Manage Positions Class
 *
 * @package     RCD
 * @category    Controller
 */
class Manage_positions extends General {

	// set db table
	public $db_table = 'positions';
	private $index_page_title = 'Manage Positions';
	private $add_page_title = 'Add New Position';
	private $edit_page_title = 'Edit Position';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.manage_positions');
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
		$this->data['active_menu'] = 'manage_positions';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function datatable()
	{
		$this->load->model('position_model');
		$this->data['positionList'] = $result = $this->position_model->getAll();
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__, $this->data);
	}

	public function validate_position()
	{
		// Set array 
		$data = array(
				'edit'		=>	(isset($_POST['id']) AND $_POST['id'] != '') ? array('id',$this->input->post('id')) : FALSE,
				'table'		=>	$this->db_table,
				'fields'	=>	array('position' => $this->input->post('position')),
		);

		// Validate Email Address
		if(General::validateFields($data) === TRUE) {

			// Set error message
			$this->form_validation->set_message( __FUNCTION__ , 'Position Already Exists.');

			return FALSE;
		} else {

			// Email address success
			return TRUE;
		}
	}

	public function add() 
	{
		// Validate user rights
		General::validatePermission('add.manage_positions');

		// If form is submit
		if(isset($_POST['position'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {
				// Load position model
				$this->load->model('position_model');

				// Set form validation rules
				$this->form_validation->set_rules("position", 'Position' ,"trim|xss_clean|required|callback_validate_position");
				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) {

					// Save user
					$result = $this->position_model->save();

					// If success
		            if( $result ) {

		            	// Record activity log
						$log = 'New position with id#'.$result.' has been inserted by ';
						General::log('MANAGE POSITIONS', 'INSERT', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Position has been added.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in saving new position. Please try again.");
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

		// Set page title
		$this->data['page_title'] = $this->add_page_title;

		// Get specific asset files in Assets Resources library
		$this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Set active menu in sidebar
		$this->data['active_menu'] = 'manage_positions';

		// Render base page
		$this->load->view('page', $this->data);
	}


	public function edit($id = null)
	{
		// Validate user rights
		General::validatePermission('edit.manage_positions');

		// Load user model
		$this->load->model('position_model');

		// If form is submit
		if(isset($_POST['position'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {

				// Set form validation rules
				$this->form_validation->set_rules("position", 'Position' ,"trim|xss_clean|required|callback_validate_position");
				$this->form_validation->set_error_delimiters("<br />","");

				if ($this->form_validation->run()) {

					// Save user
					$result = $this->position_model->edit_save();

					// If success
		            if($result){

		            	// Record activity log
						$log = 'Position with id#'.$result.' has been updated by ';
						General::log('MANAGE POSITIONS', 'UPDATE', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Position has been updated.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in updating the position. Please try again.");
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

		// Set page title
		$this->data['page_title'] = $this->edit_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Get developer details
		$this->data['positionDetails'] = $result = $this->position_model->getDetails($id);

		// Set active menu sidebar
		$this->data['active_menu'] = 'manage_positions';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function delete($id, $table = null, $permission = null) {
        parent::delete($id, $this->db_table, 'delete.manage_positions');
    }
	

}
