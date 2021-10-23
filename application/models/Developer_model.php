<?php 
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Developer Model Class
 *
 * @package     RCD
 * @category    Model
 */
class Developer_model extends CI_Model{

    private $db_table = 'developers';
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getAll() {
        $this->db->where('nStatus', 1);
        $this->db->order_by('developer', 'ASC');
        $query = $this->db->get($this->db_table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function getProjects($id) {
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

    public function save() {
        $this->data = array(
            'developer'    =>      $this->input->post('developer')
        );  
        $this->db->insert($this->db_table,$this->data);
        $result = $this->db->affected_rows();
        if( $result ) {
            $id = $this->db->insert_id();

            if( isset($_POST['project_name']) ) {
                $projectName = $_POST['project_name'];
                foreach( $projectName as $pn ) {
                    $this->db->insert("projects", array('developer_id'=>$id,'project_name'=>$pn));
                }
            }

            return $id;

        } else {
            return FALSE;
        }

    }

    public function edit_save() {
         $this->data = array(
            'developer'    =>      $this->input->post('developer')
        );  
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update($this->db_table,$this->data);
        if( $result ) {
            if( isset($_POST['project_name']) ) {
                $projectName = $_POST['project_name'];
                $c = 0;
                $remainingIDs = [];
                foreach( $projectName as $pn ) {

                    if( isset($_POST['projID'][$c]) ) {

                        array_push($remainingIDs, $_POST['projID'][$c]);

                        $this->db->where("id", $_POST['projID'][$c]);
                        $this->db->update("projects", array('project_name'=>$pn));
                        
                    } else {
                        $this->db->insert("projects", array('developer_id'=>$this->input->post('id'),'project_name'=>$pn));
                        $newID = $this->db->insert_id();
                        array_push($remainingIDs, $newID);
                    }
                    
                    $c++;
                    
                }

                $this->db->query("UPDATE `projects` SET `nStatus` = 0 
                    WHERE `developer_id` = ".$this->input->post('id')." AND `id` NOT IN(".implode(",", $remainingIDs).")");
            }
        } 
        return $result;
    }
	
}