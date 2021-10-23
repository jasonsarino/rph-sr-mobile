<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Group Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class Group_model extends CI_Model{

    private $db_table = 'user_group';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getData($isAllActive = FALSE) {
        // Get all group
        $this->db->where(array(
        	'company_id'	=>	$this->session->userdata('company_id')
        ));

        if($isAllActive == TRUE)
            $this->db->where('nStatus', 1);
        
        $this->db->order_by('isFixed','DESC');
        $query = $this->db->get($this->db_table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getGroupByID($group_id) {
        // Get group by ID
        $this->db->select('A.id, A.firstname, A.lastname, A.email, B.isFullAccess');
        $this->db->where(array(
            'B.id'            =>  $group_id,
            'A.nStatus'       =>  1,
            'A.company_id'    =>  $this->session->userdata('company_id')
        ));
            
        $this->db->join($this->db_table . ' B', 'B.id = A.group_id', 'LEFT OUTER');
        $query = $this->db->get('users A');
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getDetails($id) {
        // Get user group details
        $this->db->where(array(
            'id'            =>  $id
        ));
        $query = $this->db->get($this->db_table);
        return ($query->num_rows() == 1 ) ? $query->row() : FALSE;
    }

    public function save($action, $privileges) {
        // Save and update user group
        if($action == "insert") {
            $this->data = array(
                'company_id'    =>      $this->session->userdata('company_id'),
                'group_name'    =>      $this->input->post('group_name'),
                'group_desc'    =>      $this->input->post('group_desc'),
                'privileges'    =>      $privileges
            );  
            $this->db->insert($this->db_table,$this->data);
            $result = $this->db->affected_rows();
            return ($result) ? $this->db->insert_id() : FALSE;
        } 
        else if($action == "update") {
            $this->data = array(
                'company_id'    =>      $this->session->userdata('company_id'),
                'group_name'    =>      $this->input->post('group_name'),
                'group_desc'    =>      $this->input->post('group_desc'),
                'privileges'    =>      $privileges
            );  
            $this->db->where('id', $this->input->post('id'));
            $result = $this->db->update($this->db_table,$this->data);
            return $result;
        } else {
            return FALSE;
        }
    }
	
}