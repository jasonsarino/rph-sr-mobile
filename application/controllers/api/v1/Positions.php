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
 * API Positions Class
 *
 * @package		RCD
 * @category	Controller
 */
class Positions extends API_Controller {

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

        if( !isset($user_data['data']['id']) ) {
            $return = ['status' => false, 'error' => "Invalid user"];
            $return_http = parent::HTTP_NOT_FOUND;
            $this->api_return( $return, $return_http );
            die();
        }

		// Load position model
        $this->load->model('position_model');

        $positionData = $this->position_model->getAll();

        if( $positionData ) {

            foreach( $positionData as $pd ) {
                $positions[] = [ 
                    'id'         =>   $pd->id,
                    'position'   =>   $pd->position
                ];
            }
        	

        	$return = ['status' => true, 'data' => $positions];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => true, 'error' => "Positions not found."];
			$return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

   // Search position by ID
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

            // Load position model
            $this->load->model('position_model');

            $positionData = $this->position_model->getDetails($id);

            if( $positionData ) {

                $positions = [ 
                    'id'         =>   $positionData->id,
                    'position'   =>   $positionData->position
                ];

                $return = ['status' => true, 'data' => $positions];
                $return_http = parent::HTTP_OK;

            } else {

                $return = ['status' => true, 'error' => "Position not found."];
                $return_http = parent::HTTP_NOT_FOUND;

            }

        } else {

            $return = ['status' => true, 'error' => "Position not found."];
            $return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

}