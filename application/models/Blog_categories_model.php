<?php 
/**
 * Heemah
 *
 * @package Heemah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Blog Categories Model Class
 *
 * @package     Heemah
 * @category    Model
 */
class Blog_categories_model extends CI_Model{

    private $db_table = 'blog_categories';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getData() {
        // Get all group
        $this->db->where(array(
        	'company_id'	=>	$this->session->userdata('company_id')
        ));
        $this->db->order_by('category','ASC');
        $query = $this->db->get($this->db_table);
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

    public function save($action) {
        // Save and update user group
        if($action == "insert") {
            $this->data = array(
                'category'    =>      $this->input->post('category')
            );  
            $this->db->insert($this->db_table,$this->data);
            $result = $this->db->affected_rows();
            return ($result) ? $this->db->insert_id() : FALSE;
        } 
        else if($action == "update") {
            $this->data = array(
                'category'    =>      $this->input->post('category')
            );  
            $this->db->where('id', $this->input->post('id'));
            $result = $this->db->update($this->db_table,$this->data);
            return $result;
        } else {
            return FALSE;
        }
    }
	
}