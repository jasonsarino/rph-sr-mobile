<?php
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

/**
 * API User Class
 *
 * @package		RCD
 * @category	Controller
 */
class Users extends API_Controller {

	function __construct(){

		// init __construct from parent class
		parent::__construct();	  

	}

	// Get current user
	public function me() {

		header("Access-Control-Allow-Origin: *");

		// API Configuration 
		$user_data = $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);

        if( !isset($user_data['data']['id']) ) {
            $return = ['status' => false, 'error' => "Invalid user"];
            $return_http = parent::HTTP_NOT_FOUND;
            $this->api_return( $return, $return_http );
            die();
        }

		// Load user model
        $this->load->model('user_model');

        $userData = $this->user_model->getUserDetails('', $this->session->userdata('user_id'));

        if( $userData ) {

        	$users = [
    			'id' 				=> $userData->id,
    			'firstname' 		=> $userData->firstname,
    			'lastname' 			=> $userData->lastname,
    			'email' 			=> $userData->email,
    			'piid' 				=> $userData->piid,
    			'phone' 			=> ( ! empty($userData->phone) ) ? $userData->phone : null,
    			'position'			=> ( ! empty($userData->position) ) ? $userData->position : null,
                'hasDivision'       => $userData->hasDivision,
    			'division'			=> $userData->division,
    			'dob' 				=> $userData->dob,
    			'address' 			=> $userData->address,
    			'accre_number' 		=> $userData->accre_number,
    			'accre_exp_date' 	=> $userData->accre_exp_date,
    			'dhsud_number' 		=> $userData->dhsud_number,
    			'designated_broker' => $userData->designated_broker,
    			'picture'			=> base_url('assets/images/users/' . $userData->profile_picture)
    		];

        	$return = ['status' => true, 'data' => $users];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => true, 'error' => "User not found."];
			$return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

}