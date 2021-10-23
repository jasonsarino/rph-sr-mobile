<?php 
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Group Model Class
 *
 * @package     RCD
 * @category    Model
 */
class Sales_report_model extends CI_Model{

    private $db_table = 'sales_report';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getSalesReportDetails($where) {
        $this->db->select("A.*, CONCAT(B.`firstname`,' ',B.`lastname`) as createdBy,
            CONCAT(C.`firstname`,' ',C.`lastname`) as modifiedBy,
            CONCAT(D.`firstname`,' ',D.`lastname`) as approvedBy,
            E.developer, F.project_name as name_of_project,
            E.id as developer_id, F.id as project_id");
        $this->db->where($where);
        $this->db->join("users B", "B.id = A.prepared_by", "LEFT OUTER");
        $this->db->join("users C", "C.id = A.lastModifiedBy", "LEFT OUTER");
        $this->db->join("users D", "D.id = A.approvedBy", "LEFT OUTER");
        $this->db->join("developers E", "E.id = A.developer", "LEFT OUTER");
        $this->db->join("projects F", "F.id = A.name_of_project", "LEFT OUTER");
        $query = $this->db->get($this->db_table . " A");
        return ($query->num_rows() == 1 ) ? $query->row() : FALSE;
    }

    public function getSalesReport($where) {
        $this->db->select("A.*, CONCAT(B.`firstname`,' ',B.`lastname`) as createdBy,
            CONCAT(C.`firstname`,' ',C.`lastname`) as modifiedBy,
            CONCAT(D.`firstname`,' ',D.`lastname`) as approvedBy,
            E.developer, F.project_name as name_of_project,
            E.id as developer_id, F.id as project_id");

        if( isset($_POST['dateRange']) AND $_POST['dateRange'] != "" ) {

            
            if( isset($_POST['filterBy']) AND $_POST['filterBy'] != "" ) {
                $dateFrom =  explode(" - ", $this->input->post('dateRange'))[0];
                $dateTo =  explode(" - ", $this->input->post('dateRange'))[1];
                $dateFrom = date("Y-m-d", strtotime($dateFrom));
                $dateTo = date("Y-m-d", strtotime($dateTo));

                $this->db->where("A.".$_POST['filterBy']." BETWEEN '".$dateFrom."' AND '".$dateTo."'");
            }
            
        }   


        $this->db->where($where);
        $this->db->join("users B", "B.id = A.prepared_by", "LEFT OUTER");
        $this->db->join("users C", "C.id = A.lastModifiedBy", "LEFT OUTER");
        $this->db->join("users D", "D.id = A.approvedBy", "LEFT OUTER");
        $this->db->join("developers E", "E.id = A.developer", "LEFT OUTER");
        $this->db->join("projects F", "F.id = A.name_of_project", "LEFT OUTER");
        $this->db->order_by("A.id", "DESC");
        $query = $this->db->get($this->db_table . " A");
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getSalesReportF($where, $exportCSV = 0) {
        $this->db->select("A.*, CONCAT(B.`firstname`,' ',B.`lastname`) as createdBy,
            CONCAT(C.`firstname`,' ',C.`lastname`) as modifiedBy,
            CONCAT(D.`firstname`,' ',D.`lastname`) as approvedBy,
            E.developer, F.project_name as name_of_project");

        if( isset($_POST['dateRange']) AND $_POST['dateRange'] != "" ) {

            
            if( isset($_POST['filterBy']) AND $_POST['filterBy'] != "" ) {
                $dateFrom =  explode(" - ", $this->input->post('dateRange'))[0];
                $dateTo =  explode(" - ", $this->input->post('dateRange'))[1];
                $dateFrom = date("Y-m-d", strtotime($dateFrom));
                $dateTo = date("Y-m-d", strtotime($dateTo));

                if( $_POST['filterBy'] == "createdDate" ) {
                    $this->db->where("DATE_FORMAT(A.createdDate, '%Y-%m-%d') BETWEEN '".$dateFrom."' AND '".$dateTo."'");
                } else {
                    $this->db->where("A.reservation_date BETWEEN '".$dateFrom."' AND '".$dateTo."'");
                }

                
            }
            
        }   


        $this->db->where($where);
        $this->db->join("users B", "B.id = A.prepared_by", "LEFT OUTER");
        $this->db->join("users C", "C.id = A.lastModifiedBy", "LEFT OUTER");
        $this->db->join("users D", "D.id = A.approvedBy", "LEFT OUTER");
        $this->db->join("developers E", "E.id = A.developer", "LEFT OUTER");
        $this->db->join("projects F", "F.id = A.name_of_project", "LEFT OUTER");
        $this->db->order_by("A.id", "DESC");
        $query = $this->db->get($this->db_table . " A");

        if( $exportCSV == 1) {
            return $query;
        } else {
            return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
        }
        
    }

    public function save($attachments) {

        $this->data = array(
            'buyer_name'                    =>      $this->input->post('buyer_name'),
            'tel_cell'                      =>      $this->input->post('tel_cell'),
            'developer'                     =>      $this->input->post('developer'),
            'reservation_date'              =>      $this->input->post('reservation_date'),
            'name_of_project'               =>      $this->input->post('name_of_project'),
            'financing_scheme'              =>      $this->input->post('financing_scheme'),
            'blk_floor'                     =>      $this->input->post('blk_floor'),
            'lot_unit'                      =>      $this->input->post('lot_unit'),
            'phase'                         =>      $this->input->post('phase'),
            'net_total_contract_price'      =>      str_replace(",", "", $_POST['net_total_contract_price']),
            'miscellaneous'                 =>      str_replace(",", "", $_POST['miscellaneous']),
            'downpayment'                   =>      str_replace(",", "", $_POST['downpayment']),
            'schedule_downpayment'          =>      str_replace(",", "", $_POST['schedule_downpayment']),
            'monthly_dp'                    =>      str_replace(",", "", $_POST['monthly_dp']),
            'das_amount'                    =>      str_replace(",", "", $_POST['das_amount']),
            'address'                       =>      $this->input->post('address'),
            'occupation'                    =>      $this->input->post('occupation'),
            'location'                      =>      $this->input->post('location'),
            'lot_area'                      =>      $this->input->post('lot_area'),
            'floor_area'                    =>      $this->input->post('floor_area'),
            'sales_person'                  =>      $this->input->post('sales_person'),
            'tl_sd'                         =>      $this->input->post('tl_sd'),
            'prepared_by'                   =>      $this->session->userdata('user_id'),
            'createdBy'                     =>      $this->session->userdata('user_id'),
            'attachments'                   =>      $attachments,
            'createdDate'                   =>      date("Y-m-d H:i:s")
        );  
        $this->db->insert($this->db_table,$this->data);
        $result = $this->db->affected_rows();
        return ($result) ? $this->db->insert_id() : FALSE;

    }

    public function save_edit($attachments) {

        $net_total_contract_price = str_replace(",", "", $this->input->post('net_total_contract_price'));
        $miscellaneous = str_replace(",", "", $this->input->post('miscellaneous'));
        $downpayment = str_replace(",", "", $this->input->post('downpayment'));
        $schedule_downpayment = str_replace(",", "", $this->input->post('schedule_downpayment'));
        $das_amount = str_replace(",", "", $this->input->post('das_amount'));
        $monthly_dp = str_replace(",", "", $this->input->post('monthly_dp'));
        $sr_number = ( isset($_POST['sr_number']) ) ? $this->input->post('sr_number') : "";

        $this->data = array(
            'buyer_name'                    =>      $this->input->post('buyer_name'),
            'tel_cell'                      =>      $this->input->post('tel_cell'),
            'developer'                     =>      $this->input->post('developer'),
            'reservation_date'              =>      $this->input->post('reservation_date'),
            'name_of_project'               =>      $this->input->post('name_of_project'),
            'financing_scheme'              =>      $this->input->post('financing_scheme'),
            'blk_floor'                     =>      $this->input->post('blk_floor'),
            'lot_unit'                      =>      $this->input->post('lot_unit'),
            'phase'                         =>      $this->input->post('phase'),
            'net_total_contract_price'      =>      number_format($net_total_contract_price, 2, '.', ''),
            'miscellaneous'                 =>      number_format($miscellaneous, 2, '.', ''),
            'downpayment'                   =>      number_format($downpayment, 2, '.', ''),
            'schedule_downpayment'          =>      number_format($schedule_downpayment, 2, '.', ''),
            'das_amount'                    =>      number_format($das_amount, 2, '.', ''),
            'monthly_dp'                    =>      number_format($monthly_dp, 2, '.', ''),
            'address'                       =>      $this->input->post('address'),
            'occupation'                    =>      $this->input->post('occupation'),
            'location'                      =>      $this->input->post('location'),
            'lot_area'                      =>      $this->input->post('lot_area'),
            'floor_area'                    =>      $this->input->post('floor_area'),
            'sales_person'                  =>      $this->input->post('sales_person'),
            'tl_sd'                         =>      $this->input->post('tl_sd'),
            'lastModifiedBy'                =>      $this->session->userdata('user_id'),
            'attachments'                   =>      $attachments,
            'sr_number'                     =>      $sr_number,
            'lastModifiedDate'              =>      date("Y-m-d H:i:s")
        );  
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update($this->db_table,$this->data);
        return $result;
    }

    public function approve($id) {

        $this->data = array(
            'commission_rate'               =>      $this->input->post('commission'),
            'sr_status'                     =>      1,
            'lastModifiedBy'                =>      $this->session->userdata('user_id'),
            'lastModifiedDate'              =>      date("Y-m-d H:i:s"),
            'approvedBy'                    =>      $this->session->userdata('user_id'),
            'approvedDate'                  =>      date("Y-m-d H:i:s")
        );  
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update($this->db_table,$this->data);
        return $result;
    }

    // Validate sales report if exists
    public function validateBuyer() {

        $where = [
            'developer'         =>  $this->input->post('developer'),
            'name_of_project'   =>  $this->input->post('name_of_project'),
            'blk_floor'         =>  $this->input->post('blk_floor'),
            'lot_unit'          =>  $this->input->post('lot_unit'),
            'phase'             =>  $this->input->post('phase')
        ];
        $this->db->like('buyer_name', $this->input->post('buyer_name'));
        $query = $this->db->get_where($this->db_table, $where);
        return ( $query->num_rows() == 1 ) ? $query->row() : FALSE;
    }

    // Validate SR number if exsists
    public function validateSRNumber() {

        $where = ['sr_number' => $this->input->post('sr_number'), 'id != ' => $this->input->post('id')];
        $query = $this->db->get_where($this->db_table, $where);
        return ( $query->num_rows() == 1 ) ? TRUE : FALSE;
    }

	
}