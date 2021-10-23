<?php 
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Position Model Class
 *
 * @package     RCD
 * @category    Model
 */
class Position_model extends CI_Model{

    private $db_table = 'positions';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getAll() {
        $this->db->where('nStatus', 1);
        $this->db->order_by('position', 'ASC');
        $query = $this->db->get($this->db_table);
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

    public function save() {
        $this->data = array(
            'position'    =>      $this->input->post('position')
        );  
        $this->db->insert($this->db_table,$this->data);
        $result = $this->db->affected_rows();
        $id = $this->db->insert_id();
        return ( $result ) ? $id : FALSE;
    }

    public function edit_save() {
         $this->data = array(
            'position'    =>      $this->input->post('position')
        );  
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update($this->db_table,$this->data);
        return $result;
    }
	
}