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
 * Reports Class
 *
 * @package     RCD
 * @category    Controller
 */
class Reports extends General {

	private $index_page_title = 'Reports';

	function __construct(){

		// init __construct from parent class
		parent::__construct();	
		
		// validate user sessions if not set then redirect to login page
		if( $this->bims->auth_session() === FALSE)
			redirect(base_url());   

		// set global variable names
		$this->data['moduleName'] = strtolower(get_called_class());

		// Validate user rights
		General::validatePermission('reports.sales_report');
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
		$this->data['active_menu'] = 'reports';

		// Render base page
		$this->load->view("page", $this->data);

	}

	public function view()
	{
		// Validate user rights
		General::validatePermission('reports.sales_report');

		if( $_POST['reportFormat'] == "web" ) {
			self::web_print();
		} else if( $_POST['reportFormat'] == "excel" ) {
			self::excel_print();
		} else if( $_POST['reportFormat'] == "csv" ) {
			self::csv_print();
		}
 
	}

	private function csv_print() {
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "sales_reports_csv_".date("YmdHis").'.csv';

		$this->load->model('sales_report_model');

		if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
			$where = ['A.nStatus' => 1];
		} else {
			$where = ['A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
		}

		if( isset($_POST['name_of_project']) AND $_POST['name_of_project'] != "" ) {
			$where['A.name_of_project LIKE'] = "%".$this->input->post('name_of_project')."%";
		}	

		if( isset($_POST['financing_scheme']) AND $_POST['financing_scheme'] != "" ) {
			$where['A.financing_scheme LIKE '] = "%".$this->input->post('financing_scheme')."%";
		}	

		if( isset($_POST['nStatus']) AND $_POST['nStatus'] != "all" ) {
			$where['A.sr_status'] = $this->input->post('nStatus');
		}	
		
		$result = $this->sales_report_model->getSalesReportF($where, 1);

        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
	}

	private function excel_print() {

		$dateRange = $this->input->post('date_range');

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Sales Report');
		$this->excel->getProperties()->setCreator("RCD PEARL HOMES REALTY INC.")
									 ->setLastModifiedBy('RCD PEARL HOMES REALTY INC.')
									 ->setSubject("Sales Report")
									 ->setTitle('Sales Report')
									 ->setDescription("List of Sales Report")
									 ->setCategory("Sales Report");

		// SET TABLE HEADER TO CENTER
		$this->excel->getActiveSheet()->getStyle('A1:Y1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		// AUTO SIZE TABLE HEADER
		foreach(range('A1','Y1') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// SET BACKGROUND COLOR TABLE HEADER
		$this->excel->getActiveSheet()->getStyle('A1:Y1')->getFill()->applyFromArray(array(
		        'type' => PHPExcel_Style_Fill::FILL_SOLID,
		        'startcolor' => array(
		             'rgb' => 'EEEEEE'
		        )
		    ));

		$this->excel->setActiveSheetIndex(0)
		                            ->setCellValue('A1', 'BUYER NAME')
		                            ->setCellValue('B1', 'ADDRESS')
		                            ->setCellValue('C1', 'TEL/CEL')
		                            ->setCellValue('D1', 'OCCUPATION')
		                            ->setCellValue('E1', 'RESERVATION DATE')
		                            ->setCellValue('F1', 'NAME OF PROJECT')
		                            ->setCellValue('G1', 'LOCATION')
		                            ->setCellValue('H1', 'DEVELOPER')
		                            ->setCellValue('I1', 'FINANCING SCHEME')
		                            ->setCellValue('J1', 'BLK/FLOOR')
		                            ->setCellValue('K1', 'LOT/UNIT')
		                            ->setCellValue('L1', 'PHASE')
		                            ->setCellValue('M1', 'LOT AREA')
		                            ->setCellValue('N1', 'FLOOR AREA')
		                            ->setCellValue('O1', 'TCP')
		                            ->setCellValue('P1', 'DAS AMOUNT')
		                            ->setCellValue('Q1', 'MISCELLANEOUS')
		                            ->setCellValue('R1', 'DOWNPAYMENT')
		                            ->setCellValue('S1', 'SCHEDULE OF PAYMENT')
		                            ->setCellValue('T1', 'MONTHLY DP')
		                            ->setCellValue('U1', 'SALES PERSON')
		                            ->setCellValue('V1', 'TL/SD')
		                            ->setCellValue('W1', 'BROKER')
		                            ->setCellValue('X1', 'CREATED DATE')
		                            ->setCellValue('Y1', 'STATUS');



		$this->load->model('sales_report_model');

		if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
			$where = ['A.nStatus' => 1];
		} else {
			$where = ['A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
		}

		if( isset($_POST['name_of_project']) AND $_POST['name_of_project'] != "" ) {
			$where['A.name_of_project LIKE'] = "%".$this->input->post('name_of_project')."%";
		}	

		if( isset($_POST['financing_scheme']) AND $_POST['financing_scheme'] != "" ) {
			$where['A.financing_scheme LIKE '] = "%".$this->input->post('financing_scheme')."%";
		}	

		if( isset($_POST['nStatus']) AND $_POST['nStatus'] != "all" ) {
			$where['A.sr_status'] = $this->input->post('nStatus');
		}	
		
		$SrReports = $result = $this->sales_report_model->getSalesReportF($where);

		if($SrReports)
		{
			$i = 2;
			foreach($SrReports as $row){
			    $this->excel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$i, $row->buyer_name)
			            ->setCellValue('B'.$i, $row->address)
			            ->setCellValue('C'.$i, $row->tel_cell)
			            ->setCellValue('D'.$i, $row->occupation)
			            ->setCellValue('E'.$i, date("Y/m/d", strtotime($row->reservation_date)))
			            ->setCellValue('F'.$i, $row->name_of_project)
			            ->setCellValue('G'.$i, $row->location)
			            ->setCellValue('H'.$i, $row->developer)
			            ->setCellValue('I'.$i, $row->financing_scheme)
			            ->setCellValue('J'.$i, $row->blk_floor)
			            ->setCellValue('K'.$i, $row->lot_unit)
			            ->setCellValue('L'.$i, $row->phase)
			            ->setCellValue('M'.$i, $row->lot_area)
			            ->setCellValue('N'.$i, $row->floor_area)
			            ->setCellValue('O'.$i, $row->net_total_contract_price)
			            ->setCellValue('P'.$i, $row->das_amount)
			            ->setCellValue('Q'.$i, $row->miscellaneous)
			            ->setCellValue('R'.$i, $row->downpayment)
			            ->setCellValue('S'.$i, $row->schedule_downpayment)
			            ->setCellValue('T'.$i, $row->monthly_dp)
			            ->setCellValue('U'.$i, $row->sales_person)
			            ->setCellValue('V'.$i, $row->tl_sd)
			            ->setCellValue('W'.$i, $row->createdBy)
			            ->setCellValue('X'.$i, date("Y/m/d", strtotime($row->createdDate)))
			            ->setCellValue('Y'.$i, ( $row->sr_status == 1 ) ? "Approved" : "Pending");
			    $i++;
			}
		}

		

		$filename = "sales_report_excel_".date("YmdHis").'.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	private function web_print() {

		// Set page title
		$this->data['page_title'] = $this->index_page_title;

		$this->load->model('sales_report_model');

		if( General::getUserProfile()->privileges == "FULL-ACCESS" ) {
			$where = ['A.nStatus' => 1];
		} else {
			$where = ['A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
		}

		if( isset($_POST['name_of_project']) AND $_POST['name_of_project'] != "" ) {
			$where['A.name_of_project LIKE'] = "%".$this->input->post('name_of_project')."%";
		}	

		if( isset($_POST['financing_scheme']) AND $_POST['financing_scheme'] != "" ) {
			$where['A.financing_scheme LIKE '] = "%".$this->input->post('financing_scheme')."%";
		}	

		if( isset($_POST['nStatus']) AND $_POST['nStatus'] != "all" ) {
			$where['A.sr_status'] = $this->input->post('nStatus');
		}	
		
		$this->data['SrReports'] = $result = $this->sales_report_model->getSalesReportF($where);

		$this->data['print'] = TRUE;

		// echo "<pre>".print_r($this->data['pendingSRList'], TRUE)."</pre>";

		$this->load->view($this->data['moduleName'] . '/view', $this->data);

	}

	

	

	

}
