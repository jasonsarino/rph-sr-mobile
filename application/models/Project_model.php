<?php 
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Project Model Class
 *
 * @package     RCD
 * @category    Model
 */
class Project_model extends CI_Model{

    private $db_table = 'projects';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getAll() {
        $this->db->where('nStatus', 1);
        $this->db->order_by('project_name', 'ASC');
        $query = $this->db->get($this->db_table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getAllByDeveloperID($id) {
        $this->db->where(array('developer_id'=>$id,'nStatus'=>1));
        $this->db->order_by('project_name', 'ASC');
        $query = $this->db->get("projects");
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getDetails($id) {

        $this->db->where(array(
            'id'            =>  $id,
            'nStatus'       =>  1
        ));
        $query = $this->db->get($this->db_table);
        return ($query->num_rows() == 1 ) ? $query->row() : FALSE;
    }
    
	
}