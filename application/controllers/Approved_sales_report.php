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
 * Approved SR Class
 *
 * @package     RCD
 * @category    Controller
 */
class Approved_sales_report extends General {

	private $index_page_title = 'Approved Sales Report';
	private $view_page_title = 'Approved Sales Report Details';
	private $edit_page_title = 'Edit Sales Report Details';
	public $db_table = 'sales_report';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('view_approved.sales_report');
	}

	public function index()
	{
		// Set page title
		$this->data['page_title'] = $this->index_page_title;

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['index']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'approved_sales_report';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function datatable()
	{
		$this->load->model('sales_report_model');

		if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
			$where = ['A.sr_status' => 1, 'A.nStatus' => 1];
		} else {
			$where = ['A.sr_status' => 1, 'A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
		}
		
		$this->data['pendingSRList'] = $result = $this->sales_report_model->getSalesReport($where);

		$this->load->view($this->data['moduleName'] . '/' . __FUNCTION__, $this->data);

	}

	public function view($id = null, $srStatus = null) {

		// Validate user rights
		General::validatePermission('view_approved.sales_report');

		$this->data['srStatus'] = $srStatus;

		// Set page title
		$this->data['page_title'] = $this->view_page_title;

		// Load user model
		$this->load->model('sales_report_model');

		if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
			$where = ['A.id' => $id, 'A.sr_status' => 1, 'A.nStatus' => 1];
		} else {
			$where = ['A.id' => $id, 'A.sr_status' => 1, 'A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
		}

		$this->data['srDetails'] = $result = $this->sales_report_model->getSalesReportDetails($where);

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['view']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['view']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['view']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'approved_sales_report';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function delete($id, $table = null, $permission = null) {

		parent::delete($id, $this->db_table, 'delete.developers');

    }

	public function edit($id = null, $srStatus = null) {

		// Validate user rights
		General::validatePermission('edit.sales_report');

		$this->data['srStatus'] = $srStatus;

		// Set page title
		$this->data['page_title'] = $this->edit_page_title;

		// Load user model
		$this->load->model('sales_report_model');

		$where = ['A.id' => $id, 'A.sr_status' => 1, 'A.nStatus' => 1];

		$this->data['srDetails'] = $result = $this->sales_report_model->getSalesReportDetails($where);

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['edit']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// Load developer model
		$this->load->model("developer_model");

		$this->data['developerList'] = $this->developer_model->getAll();

		// set the active menu in sidebar
		$this->data['active_menu'] = 'pendingSalaryReport';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function save_edit() {

		// Validate user rights
		General::validatePermission('edit.sales_report');

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load user model
			$this->load->model('sales_report_model');

			$noError = TRUE;

			if( isset($_POST['sr_number']) && !empty($_POST['sr_number']) ) {

				// Check SR Number if exists
				$isExists = $this->sales_report_model->validateSRNumber();
				if( $isExists ) {
					$noError = FALSE;
					$data['success'] = FALSE;
					$data['message'] = "Invalid SR Number. SR Number already exists.";
				}

			} 

			if( $noError ) {

				// Set form validation rules
				$this->form_validation->set_rules("id", "ID" ,"trim|xss_clean|required");
				$this->form_validation->set_rules("buyer_name", "Buyer's Name" ,"trim|xss_clean|required");
				$this->form_validation->set_rules("tel_cell", 'Telephone/Cellphone No.' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("developer", 'Developer' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("reservation_date", 'Reservation Date' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("name_of_project", 'Name of Project' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("financing_scheme", 'Financing Scheme' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("blk_floor", 'Blk/Floor' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("lot_unit", 'Lot/Unit' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("phase", 'Phase' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("net_total_contract_price", 'Net Total Contract Price' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("das_amount", 'DAS Amount' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("sales_person", 'Sales Person' ,"trim|xss_clean|required");
				$this->form_validation->set_rules("tl_sd", 'TL/SD' ,"trim|xss_clean|required");

				$this->form_validation->set_rules("miscellaneous", 'Miscellaneous' ,"trim|xss_clean");
				$this->form_validation->set_rules("downpayment", 'Downpayment' ,"trim|xss_clean");
				$this->form_validation->set_rules("schedule_downpayment", 'Schedule of Downpayment' ,"trim|xss_clean");
				$this->form_validation->set_rules("monthly_dp", 'Monthly D/P' ,"trim|xss_clean");
				$this->form_validation->set_rules("address", "Buyer's address" ,"trim|xss_clean");
				$this->form_validation->set_rules("occupation", "Buyer's occupation" ,"trim|xss_clean");
				$this->form_validation->set_rules("location", 'Project location' ,"trim|xss_clean");
				$this->form_validation->set_rules("lot_area", 'Lot Area' ,"trim|xss_clean");
				$this->form_validation->set_rules("floor_area", 'Floor Area' ,"trim|xss_clean");
				

				$this->form_validation->set_error_delimiters("","<br />");

				if ($this->form_validation->run()) {

					$attachmentArr = array();

					$ds = DIRECTORY_SEPARATOR;
					$storeFolder = '../../files/sales_report';

					if (!empty($_FILES)) {
						foreach( $_FILES as $file ) {
							$x = 0;
							foreach( $file['name'] as $f ) {
								if( isset($file['name']) AND !empty($file['name']) ) {

									// Get temp name
									$tempFile = $file['tmp_name'][$x]; 

									// Split the file and get filename extension
									$temp = explode(".", $file['name'][$x]);

									if( !empty(end($temp)) ) {

										$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 

										// Set new filename, md5 use to generate random char based on the filename
										$hazardPhotos = strtolower(str_replace(" ", "_", $temp[0])).'rcdpearlhomes'.date('YmdHisA') . '.' . end($temp);

										// Set complte target path with new filename
										$targetFile =  $targetPath. $hazardPhotos;

										// Upload the file
										move_uploaded_file($tempFile,$targetFile);
										$x++;

										// Store filename in filename array
										array_push($attachmentArr, $hazardPhotos);
									}
								}
							}
						}
					}

					if( isset($_POST['currentAttachment']) ) {
						foreach($_POST['currentAttachment'] as $a) {
							array_push($attachmentArr, $a);
						}
						
					}
					
					if( count($attachmentArr) > 0 ) {
						$attachments = serialize($attachmentArr);
					} else {
						$attachments = "";
					}


					$result = $this->sales_report_model->save_edit($attachments);

					// If success
		            if( $result ) {

		            	// Record activity log
						$log = 'Sales report with id#'.$result.' has been updated by ';
						General::log('SALES REPORT', 'UPDATE', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Sales report has been updated.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in updating sales report. Please try again.");
		            }
				} else {
					// Set response value
					$data = array('success' => FALSE, 'message' => validation_errors());
				}

			}

			

		} catch(Exception $e) {
			// Set response value
			$data = array("success" => FALSE, "message" => $e->getMessage());
		}
		
		// Return json value
        die(json_encode($data));

	}

	

}
