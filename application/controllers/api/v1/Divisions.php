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
 * API Divisions Class
 *
 * @package		RCD
 * @category	Controller
 */
class Divisions extends API_Controller {

	function __construct(){

		// init __construct from parent class
		parent::__construct();	  

	}

	// Get all positions
	public function get() {

		header("Access-Control-Allow-Origin: *");

		// API Configuration 
		$user_data = $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);

		// Load divisions model
        $this->load->model('division_model');

        $divisionData = $this->division_model->getAll();

        if( $divisionData ) {

            foreach( $divisionData as $dd ) {
                $divisions[] = [ 
                    'id'         =>   $dd->id,
                    'division'   =>   $dd->division
                ];
            }
        	

        	$return = ['status' => true, 'data' => $divisions];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => true, 'error' => "Divisions not found."];
			$return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

    // Search division by ID
    public function search($id = '') {

        header("Access-Control-Allow-Origin: *");

        // API Configuration 
        $user_data = $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);

        if( !empty($id) ) {

            // Load division model
            $this->load->model('division_model');

            $divisionData = $this->division_model->getDetails($id);

            if( $divisionData ) {

                $division = [ 
                    'id'         =>   $divisionData->id,
                    'division'   =>   $divisionData->division
                ];

                $return = ['status' => true, 'data' => $division];
                $return_http = parent::HTTP_OK;

            } else {

                $return = ['status' => true, 'error' => "Division not found."];
                $return_http = parent::HTTP_NOT_FOUND;

            }

        } else {

            $return = ['status' => true, 'error' => "Division not found."];
            $return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }


}