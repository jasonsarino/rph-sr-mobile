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
 * Manage Developers Class
 *
 * @package     RCD
 * @category    Controller
 */
class Manage_developers extends General {

	// set db table
	public $db_table = 'developers';
	private $index_page_title = 'Manage Developers';
	private $add_page_title = 'Add New Developer';
	private $edit_page_title = 'Edit Developer';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.developers');
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
		$this->data['active_menu'] = 'manage_developers';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function datatable()
	{
		$this->load->model('developer_model');
		$this->data['developerList'] = $result = $this->developer_model->getAll();
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__, $this->data);
	}

	public function validate_developer()
	{
		// Set array 
		$data = array(
				'edit'		=>	(isset($_POST['id']) AND $_POST['id'] != '') ? array('id',$this->input->post('id')) : FALSE,
				'table'		=>	$this->db_table,
				'fields'	=>	array('developer' => $this->input->post('developer')),
		);

		// Validate Email Address
		if(General::validateFields($data) === TRUE) {

			// Set error message
			$this->form_validation->set_message( __FUNCTION__ , 'Developer Already Exists.');

			return FALSE;
		} else {

			// Email address success
			return TRUE;
		}
	}

	public function add() 
	{
		// Validate user rights
		General::validatePermission('add.developers');

		// If form is submit
		if(isset($_POST['developer'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {
				// Load developer model
				$this->load->model('developer_model');

				// Set form validation rules
				$this->form_validation->set_rules("developer", 'Developer Name' ,"trim|xss_clean|required|callback_validate_developer");
				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) {

					// Save user
					$result = $this->developer_model->save();

					// If success
		            if( $result ) {

		            	// Record activity log
						$log = 'New developer with id#'.$result.' has been inserted by ';
						General::log('MANAGE DEVELOPERS', 'INSERT', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Developer has been added.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in saving new developer. Please try again.");
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

		// Set page title
		$this->data['page_title'] = $this->add_page_title;

		// Get specific asset files in Assets Resources library
		$this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Set active menu in sidebar
		$this->data['active_menu'] = 'manage_developers';
		
		// Load user group list
		$this->data['user_group_list'] = $this->group_model->getData(TRUE);

		// Render base page
		$this->load->view('page', $this->data);
	}


	public function edit($id = null)
	{
		// Validate user rights
		General::validatePermission('edit.developers');

		// Load user model
		$this->load->model('developer_model');

		// If form is submit
		if(isset($_POST['developer'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {

				// Set form validation rules
				$this->form_validation->set_rules("developer", 'Developer Name' ,"trim|xss_clean|required|callback_validate_developer");
				$this->form_validation->set_error_delimiters("<br />","");

				if ($this->form_validation->run()) {

					// Save user
					$result = $this->developer_model->edit_save();

					// If success
		            if($result){

		            	// Record activity log
						$log = 'Developer with id#'.$result.' has been updated by ';
						General::log('MANAGE DEVELOPERS', 'UPDATE', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Developer has been updated.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in updating the developer. Please try again.");
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
		$this->data['developerDetails'] = $result = $this->developer_model->getDetails($id);

		// Get projects
		$this->data['projectList'] = $result = $this->developer_model->getProjects($id);

		// Set active menu sidebar
		$this->data['active_menu'] = 'manage_developers';

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function delete($id, $table = null, $permission = null) {
        parent::delete($id, $this->db_table, 'delete.developers');
    }
	

}
