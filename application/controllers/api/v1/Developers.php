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
 * API Developers Class
 *
 * @package		RCD
 * @category	Controller
 */
class Developers extends API_Controller {

	function __construct(){

		// init __construct from parent class
		parent::__construct();	  

	}

	// Get all developers
	public function get() {

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

		// Load developers model
        $this->load->model('developer_model');

        $developerData = $this->developer_model->getAll();

        if( $developerData ) {

            foreach( $developerData as $dd ) {
                $developers[] = [ 
                    'id'         =>   $dd->id,
                    'developer'   =>   $dd->developer
                ];
            }
        	

        	$return = ['status' => true, 'data' => $developers];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => true, 'error' => "Developers not found."];
			$return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

   // Search developer by ID
    public function search($id = '') {

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

        if( !empty($id) ) {

            // Load developer model
            $this->load->model('developer_model');

            $developerData = $this->developer_model->getDetails($id);

            if( $developerData ) {

                $developer = [ 
                    'id'         =>   $developerData->id,
                    'developer'   =>   $developerData->developer
                ];

                $return = ['status' => true, 'data' => $developer];
                $return_http = parent::HTTP_OK;

            } else {

                $return = ['status' => true, 'error' => "Developer not found."];
                $return_http = parent::HTTP_NOT_FOUND;

            }

        } else {

            $return = ['status' => true, 'error' => "Developer not found."];
            $return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }



}