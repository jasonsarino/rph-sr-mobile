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
 * Dashboard Class
 *
 * @package		RCD
 * @category	Controller
 */
class Dashboard extends General {

	function __construct() {

		// init __construct from parent class
		parent::__construct();	

		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());    

		

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

	}

	public function index() {

		// Set page title
		$this->data['page_title'] = 'Dashboard and Analytics';

		$this->load->model('dashboard_model');

		// set the active menu in sidebar
		$this->data['active_menu'] = 'dashboard';

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// render base page
		$this->load->view("page", $this->data);

	}
	

}
