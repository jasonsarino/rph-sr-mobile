<?php 
/**
 * Heemah
 *
 * @package Heemah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * User Model Class
 *
 * @package     Heemah
 * @category    Model
 */
class Parameters_model extends CI_Model{
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getDetails($id, $table) {
    	$this->db->where('id', $id);
		$query = $this->db->get($table);
		return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

	public function getAllProjectFields() {
		$this->db->where('nStatus', 1);
		$query = $this->db->get("project_field");
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}

	public function getAllPartnerTypes() {
		$this->db->where('nStatus', 1);
		$query = $this->db->get("partner_type");
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}

	public function getAllPartnerSkills() {
		$this->db->where('nStatus', 1);
		$query = $this->db->get("partner_skills");
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}

	public function getAllCities() {
		$this->db->where(array(
			'country_id'	=>	157,
			'nStatus'	=>	1
		));
		$query = $this->db->get("cities");
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}

	public function save_param() {

		if( $this->input->post('tableType') == "project_field" ) {

			$this->data = array(
				'project_field'			=>	$this->input->post('param_english'),
				'project_field_arabic'	=>	$this->input->post('param_arabic')
			);

		} else if( $this->input->post('tableType') == "partner_type" ) {

			$this->data = array(
				'partner_type'			=>	$this->input->post('param_english'),
				'partner_type_arabic'	=>	$this->input->post('param_arabic')
			);

		} else if( $this->input->post('tableType') == "partner_skills" ) {

			$this->data = array(
				'skills'			=>	$this->input->post('param_english'),
				'skills_arabic'		=>	$this->input->post('param_arabic')
			);

		}

		$this->db->insert($this->input->post('tableType'),$this->data);
		$result = $this->db->affected_rows();
		return ($result) ? $this->db->insert_id() : FALSE;

	}

	public function edit_param() {
		if( $this->input->post('tableType') == "project_field" ) {

			$this->data = array(
				'project_field'			=>	$this->input->post('param_english'),
				'project_field_arabic'	=>	$this->input->post('param_arabic')
			);

		} else if( $this->input->post('tableType') == "partner_type" ) {

			$this->data = array(
				'partner_type'			=>	$this->input->post('param_english'),
				'partner_type_arabic'	=>	$this->input->post('param_arabic')
			);

		} else if( $this->input->post('tableType') == "partner_skills" ) {

			$this->data = array(
				'skills'			=>	$this->input->post('param_english'),
				'skills_arabic'		=>	$this->input->post('param_arabic')
			);

		} else if( $this->input->post('tableType') == "cities" ) {

			$this->data = array(
				'state'			=>	$this->input->post('param_english'),
				'state_arabic'		=>	$this->input->post('param_arabic')
			);

		}

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update($this->input->post('tableType'),$this->data);
		return ($result) ? TRUE : FALSE;
	}

	public function delete_param($id, $table) {
		$this->data = array('nStatus' => 0);
		$this->db->where('id', $id);
		$result = $this->db->update($table.'',$this->data);
		return ($result) ? TRUE : FALSE;
	}

	
	
}