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
 * API Sales Report Class
 *
 * @package		RCD
 * @category	Controller
 */
class Sales_report extends API_Controller {

    private $num_per_page = 10;

	function __construct(){

		// init __construct from parent class
		parent::__construct();	  

	}

	// Get all sales report
	public function get($status = '', $page = 'page:1') {

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

		// Load sales report model
        $this->load->model('sales_report_model');

        // Load user model
        $this->load->model('user_model');

        // Get current user data
        $userData = $this->user_model->getUserDetails('', $user_data['data']['id']);

        $status = ( $status == 'pending' ) ? 0 : 1;

        if( $userData->privileges == "FULL-ACCESS" ) {
            $where = ['A.sr_status' => $status, 'A.nStatus' => 1];
        } else {
            $where = ['A.sr_status' => $status, 'A.nStatus' => 1, 'A.prepared_by' => $user_data['data']['id']];
        }

        $page = explode(":", $page)[1];

        $salesReportData = $this->sales_report_model->getSalesReport( $where, $this->num_per_page, ( $page - 1 ) * $this->num_per_page );

        // count all sales report
        $allSalesReport = $this->sales_report_model->getSalesReport( $where );

        if( $salesReportData ) {

            $count = 0;
            foreach( $salesReportData as $sr ) {
                $salesReports[] = [ 
                    'id'                            =>   $sr->id,
                    'buyer_name'                    =>   $sr->buyer_name,
                    'reservation_date'              =>   date("M d, Y", strtotime($sr->reservation_date)),
                    'financing_scheme'              =>   $sr->financing_scheme,
                    'name_of_project'               =>   $sr->name_of_project,
                    'phase'                         =>   $sr->phase,
                    'blk_floor'                     =>   $sr->blk_floor,
                    'lot_unit'                      =>   $sr->lot_unit,
                    'lot_area'                      =>   ( ! empty($sr->lot_area) ) ? $sr->lot_area : null,
                    'floor_area'                    =>   ( ! empty($sr->floor_area) ) ? $sr->floor_area : null,
                    'net_total_contract_price'      =>   number_format($sr->net_total_contract_price, 2)
                ];

                if( $status == 1 ) {
                    $salesReports[$count]['approvedBy']     =   $sr->approvedBy;
                    $salesReports[$count]['approvedDate']   =   $sr->approvedDate;
                }
                $count++;
            }
        	
        	$return = ['status' => true, 'count' => count($allSalesReport), 'per_page' => $this->num_per_page, 'data' => $salesReports];
			$return_http = parent::HTTP_OK;

        } else {

        	$return = ['status' => false, 'error' => "Sales report not found."];
			$return_http = parent::HTTP_NOT_FOUND;

        }

       // return data
       $this->api_return( $return, $return_http );

   }

   // Search sales report
    public function search() {

        header("Access-Control-Allow-Origin: *");

        // API Configuration 
        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);

        if( !isset($user_data['data']['id']) ) {
            $return = ['status' => false, 'error' => "Invalid user"];
            $return_http = parent::HTTP_NOT_FOUND;
            $this->api_return( $return, $return_http );
            die();
        }

        $search = $this->input->post('search');

            $return = ['status' => true, 'search' => $search];
            $return_http = parent::HTTP_OK;

            // Load sales report model
            // $this->load->model('sales_report_model');

            // if( $userData->privileges == "FULL-ACCESS" ) {
            //     $where = ['A.sr_status' => $status, 'A.nStatus' => 1];
            // } else {
            //     $where = ['A.sr_status' => $status, 'A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
            // }

            // $projectData = $this->sales_report_model->getSalesReport( $where );

            // if( $projectData ) {

            //     $project = [ 
            //         'id'         =>   $projectData->id,
            //         'project_name'   =>   $projectData->project_name
            //     ];

            //     $return = ['status' => true, 'data' => $project];
            //     $return_http = parent::HTTP_OK;

            // } else {

            //     $return = ['status' => true, 'error' => "Project not found."];
            //     $return_http = parent::HTTP_NOT_FOUND;

            // }

       // return data
       $this->api_return( $return, $return_http );

   }


    



}