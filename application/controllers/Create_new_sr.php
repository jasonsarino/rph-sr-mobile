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
class Create_new_sr extends General {

	private $index_page_title = 'Create New Sales Report';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('add.sales_report');
	}

	public function index()
	{
		// Set page title
		$this->data['page_title'] = $this->index_page_title;

		// Load developer model
		$this->load->model("developer_model");

		$this->data['developerList'] = $this->developer_model->getAll();

		// Get specific asset files in Assets Resources library
        $this->data['css'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['css'];
		$this->data['js'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['js'];
		$this->data['jsextend'] = $this->assets_resources->getAssets($this->data['moduleName'])['add']['jsextend'];
		$this->data['file'] = '/'.$this->data['moduleName'] . '/'.__FUNCTION__.'.php';

		// set the active menu in sidebar
		$this->data['active_menu'] = 'create_new_sr';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function add() 
	{
		// Validate user rights
		General::validatePermission('add.sales_report');

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		try {
			// Load user model
			$this->load->model('sales_report_model');


			// Validate
			$isExists = $this->sales_report_model->validateBuyer();

			if( $isExists ) {

				$data['success'] = FALSE;
				$data['message'] = "This buyer is already encoded in the system.";

			} else {

				// Set form validation rules
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
				$this->form_validation->set_rules("sales_person", 'Sales Person' ,"trim|xss_clean");

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

					if( count($attachmentArr) > 0 ) {
						$attachments = serialize($attachmentArr);
					} else {
						$attachments = "";
					}

					$result = $this->sales_report_model->save($attachments);

					// If success
		            if( $result ) {

				        if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
							$where = ['A.id' => $result, 'A.sr_status' => 0, 'A.nStatus' => 1];
						} else {
							$where = ['A.id' => $result, 'A.sr_status' => 0, 'A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
						}

						$this->data['srDetails'] = $this->sales_report_model->getSalesReportDetails($where);

		            	$brokerDetails = parent::getUserProfile()->firstname.' '.parent::getUserProfile()->lastname;

						$this->data['to'] = parent::TO_EMAIL_SR;
						$subject = 'New Sales Report Submitted by ' . $brokerDetails;
						$body_email = $this->load->view('email_template/new_sr', $this->data, TRUE);

						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= 'From: '.parent::SHORT_SYS_TITLE.' <'.parent::FROM_EMAIL.'>' . "\r\n";

					  	mail($this->data['to'], $subject, $body_email, $headers, "-fsales@rcdpearlhomes.com");

		            	// Record activity log
						$log = 'New sales report with id#'.$result.' has been inserted by ';
						General::log('SALES REPORT', 'INSERT', $log);

						// Set response value
		            	$data = array('success' => TRUE, 'message' => "Sales report has been saved.");
		            } else {
		            	// Set response value
		            	$data = array('success' => FALSE, 'message' => "There was an error in saving the sales report. Please try again.");
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

	public function getProjects($developer_id) {

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		// Load developer model
		$this->load->model("developer_model");

		$results = $this->developer_model->getProjects($developer_id);

		$res = [];

		if( $results ) {
			$res[] = array('id'=>"",'text'=>"");
			foreach( $results as $r ) {
				$res[] = array('id'=>$r->id,'text'=>$r->project_name);
			}

		}

		die(json_encode($res));

	}
		
	// Validate sales report if exists
	public function validateBuyer() {

		// Set response header to json
		$this->bims->addJSONResponseHeader();

		// Load user model
		$this->load->model('sales_report_model');

		// Validate
		$results = $this->sales_report_model->validateBuyer();

		if( $results ) {

			$ss = ( $results->sr_status == 0 ) ? "pending" : "approved";
			$link = base_url('approved_sales_report/view/' . $results->id . '/' . $ss);

			$data['success'] = TRUE;
			$data['message'] = "This buyer is already encoded in the system.";
			$data['longmessage'] = $data['message'] . " Click <a href='".$link."' target='_blank' style='text-decoration:underline;'>here</a> to view ".$this->input->post('buyer_name')."'s sales report details.";
		} else {
			$data['success'] = FALSE;
		}

		die(json_encode($data));

	}

}
