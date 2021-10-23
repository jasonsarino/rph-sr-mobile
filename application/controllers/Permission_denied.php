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
class Permission_denied extends General {

	function __construct() {

		// init __construct from parent class
		parent::__construct();	

		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

	}

	public function index() {

		// Set page title
		$this->data['page_title'] = "405 Permission Not Allowed";

		// Page error
		$this->data['file'] = '/error_405.php';
			
		// Render page error
		$this->load->view("error_405", $this->data);

	}

	

}
