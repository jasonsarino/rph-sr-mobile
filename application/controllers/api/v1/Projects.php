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
 * API Projects Class
 *
 * @package		RCD
 * @category	Controller
 */
class Projects extends API_Controller {

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

		// Load project model
        $this->load->model('project_model');

        $projectData = $this->project_model->getAll();

        if( $projectData ) {

            foreach( $projectData as $pd ) {
                $projects[] = [ 
                    'id'         =>   $pd->id,
                    'project_name'   =>   $pd->project_name
                ];
            }
        	

        	$return = ['status' => true, 'data' => $projects];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => true, 'error' => "Projects not found."];
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

            // Load project model
            $this->load->model('project_model');

            $projectData = $this->project_model->getDetails($id);

            if( $projectData ) {

                $project = [ 
                    'id'         =>   $projectData->id,
                    'project_name'   =>   $projectData->project_name
                ];

                $return = ['status' => true, 'data' => $project];
                $return_http = parent::HTTP_OK;

            } else {

                $return = ['status' => true, 'error' => "Project not found."];
                $return_http = parent::HTTP_NOT_FOUND;

            }

        } else {

            $return = ['status' => true, 'error' => "Project not found."];
            $return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }


    // Search project by Developer ID
    public function getAllByDeveloperID($developer_id = '') {

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

        if( !empty($developer_id) ) {

            // Load project model
            $this->load->model('project_model');

            // Load developer model
            $this->load->model('developer_model');

            // Validate developer if exists
            $developerData = $this->developer_model->getDetails($developer_id);

            if( $developerData ) {

                $projectData = $this->project_model->getAllByDeveloperID($developer_id);

                if( $projectData ) {

                    foreach( $projectData as $pd ) {
                        $projects[] = [ 
                            'id'         =>   $pd->id,
                            'project_name'   =>   $pd->project_name
                        ];
                    }

                    $return = ['status' => true, 'data' => $projects];
                    $return_http = parent::HTTP_OK;

                } else {

                    $return = ['status' => true, 'error' => "Project not found."];
                    $return_http = parent::HTTP_NOT_FOUND;

                }

            } else {

                $return = ['status' => true, 'error' => "Developer not found."];
                $return_http = parent::HTTP_NOT_FOUND;

            }

        } else {

            $return = ['status' => true, 'error' => "Project not found."];
            $return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }



}