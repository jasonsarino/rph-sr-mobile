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
class Manage_groups extends General {

	// set db table
	public $db_table = 'user_group';
	private $index_page_title = 'Manage Groups';
	private $add_page_title = 'Add New Group';
	private $edit_page_title = 'Edit Group';

	function __construct() {

		// init __construct from parent class
		parent::__construct();	

		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set the active menu in sidebar
		$this->data['active_menu'] = 'manage_groups';

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view.' . $this->data['moduleName']);
	}

	public function index() {

		// Load group model
		$this->load->model('group_model');

		// Set page title
		$this->data['page_title'] = $this->index_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Load list of user group
		$this->data['groups_list'] = $this->group_model->getData();

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function datatable() {

		// Load group model
		$this->load->model('group_model');

		// Load list of user group
		$this->data['groups_list'] = $result = $this->group_model->getData();

		// Render datatable page
		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__, $this->data);

	}

	public function add() 
	{
		// Validate user rights
		General::validatePermission('add.' . $this->data['moduleName']);

		// If form is submit
		if(isset($_POST['group_name'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {

				// Load group model
				$this->load->model('group_model');

				// Set form validation rules
				$this->form_validation->set_rules("group_name", 'Group Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("group_desc", 'Group Description' ,"trim|xss_clean");
				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) 
				{
					$hasError = 0;

					if( ! empty($_REQUEST['isFullAccess']) ) { 
						$privileges = 'FULL-ACCESS';
					} else {

						// If user set previleges
						if(isset($_REQUEST['privileges']) AND count($_REQUEST['privileges']) > 0) {

							// Get form submit 
							$privileges = $_REQUEST['privileges'];

							foreach ($_REQUEST['privileges'] as $k=>$v)
				                $privileges['permissions'][$k] = 1;

				            // Serialize array previlges
				            $privileges =  serialize($privileges['permissions']);
				            
						} else {
							$hasError = 1;
							// Set response value
							$data = array('success' => FALSE, 'message' => $this->lang->line('group_text_27'));
						}

					}

					if( ! $hasError ) {
						// Save group and previleges
			            $result = $this->group_model->save('insert', $privileges);

			            // If success
			            if($result){

			            	// Record activity log
							$log = 'New User group with id#'.$result.' has been inserted by ';
							General::log('MANAGE GROUPS', 'INSERT', $log);

							// Set response value
			            	$data = array('success' => TRUE, 'message' => $this->lang->line('group_text_25'));
			            } else {
			            	// Set response value
			            	$data = array('success' => FALSE, 'message' => $this->lang->line('group_text_26'));
			            }
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

		// Set page title
		$this->data['page_title'] = $this->add_page_title;

		// Get specific asset files in Assets Resources library
		$this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Render base page
		$this->load->view('page', $this->data);
	}


	public function edit($id = null)
	{	
		// Validate user rights
		General::validatePermission('edit.' . $this->data['moduleName']);

		// Load group model
		$this->load->model('group_model');

		// If form is submit
		if(isset($_POST['group_name'])){ 
			
			// Set response header to json
			$this->bims->addJSONResponseHeader();

			try {

				// Set form validation rules
				$this->form_validation->set_rules("group_name", 'Group Name' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("group_desc", 'Group Description' ,"trim|xss_clean");
				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) {

					$hasError = 0;

					if( ! empty($_REQUEST['isFullAccess']) ) { 
						$privileges = 'FULL-ACCESS';
					} else {

						// If user set previleges
						if(isset($_REQUEST['privileges']) AND count($_REQUEST['privileges']) > 0) {

							// Get form submit 
							$privileges = $_REQUEST['privileges'];
							foreach ($_REQUEST['privileges'] as $k=>$v)
				                $privileges['permissions'][$k] = 1;

				            // Serialize array previlges
				            $privileges =  serialize($privileges['permissions']);
				            
						} else {
							$hasError = 1;

							// Set response value
							$data = array('success' => FALSE, 'message' => $this->lang->line('group_text_30'));
						}

					}

					if( ! $hasError ) {
						// Save group and previleges
			            $result = $this->group_model->save('update', $privileges);

			            // If success
			            if($result){

			            	// Record activity log
							$log = 'User group with id#'.$this->input->post('id').' has been updated by ';
							General::log('MANAGE GROUPS', 'UPDATE', $log);

							// Set response value
			            	$data = array('success' => TRUE, 'message' => $this->lang->line('group_text_28'));
			            } else {
			            	// Set response value
			            	$data = array('success' => FALSE, 'message' => $this->lang->line('group_text_29'));
			            }
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

		// If id is not set, return invalid id message
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

		// Get user group details
		$this->data['group_details'] = $result = $this->group_model->getDetails($id);

		// Render base page
		$this->load->view("page", $this->data);
	}

	public function delete($id, $table = null, $permission = null) {
        parent::delete($id, $this->db_table, 'delete.' . $this->data['moduleName']);
    }
	

}
