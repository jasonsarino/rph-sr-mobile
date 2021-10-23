<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Company Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class Company_model extends CI_Model{
	
	public function __construct() {
        // init __construct from parent class
		parent::__construct();	
	} 

	public function log($module, $event, $log) {
        // Save transaction log
		$this->data = array(
			'user_id'				=>		$this->session->userdata('user_id'),
			'module'				=>		$module,
			'event'					=>		$event,
			'ipaddress'				=>		$this->input->ip_address(),
			'log_description'		=>		$log
		);	
		return $this->db->insert("activity_log",$this->data);
    }
	
}