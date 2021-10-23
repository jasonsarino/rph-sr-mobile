<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Dashboard Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class Dashboard_model extends CI_Model{
	
	public function __construct() {
		// init __construct from parent class
		parent::__construct();	
	} 

	public function getAgencyPayments() {
		$this->db->select("A.*, B.agency_name, B.email_address, B.phone_number");
		$this->db->join('agency B', 'B.id = A.agency_id', 'JOIN');
		$this->db->order_by('A.date_subscribed', 'DESC');
        $query = $this->db->get('agency_subscription_package A');
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
	}

	public function total_number_users($table) {
		$query = $this->db->get_where($table, array('nStatus' => 1));
		return $query->num_rows();
	}

	public function total_number_transfer_sponsorship_process() {
		$this->db->where_in('requestStatus', array(0,2));
		$query = $this->db->get('request_transfer_sponsorship');
		return $query->num_rows();
	}

	public function total_number_get_recruiting_offers_process() {
		$this->db->where_in('requestStatus', array(0,2));
		$query = $this->db->get('request_recruit_offers');
		return $query->num_rows();
	}

	public function total_number_hire_worker_process() {
		$query = $this->db->query("SELECT * FROM `request_hire_worker` WHERE `request_accepted` IS NULL OR `request_accepted` = 2");
		return $query->num_rows();
	}

	public function total_number_transfer_sponsorship_approved() {
		$this->db->where_in('requestStatus', array(3));
		$query = $this->db->get('request_transfer_sponsorship');
		return $query->num_rows();
	}

	public function total_number_get_recruiting_offers_approved() {
		$this->db->where_in('requestStatus', array(3));
		$query = $this->db->get('request_recruit_offers');
		return $query->num_rows();
	}

	public function total_number_hire_worker_approved() {
		$query = $this->db->query("SELECT * FROM `request_hire_worker` WHERE `request_accepted` = 3");
		return $query->num_rows();
	}

	public function getAllUserRegisteredByCountry() {
		$query = $this->db->query("SELECT * FROM `countries` WHERE `nStatus` = 1");

		$country_count = array();

		if( $query->num_rows() > 0 ) {
			foreach( $query->result() as $country ) {

				// Get jobseekers
				$query1 = $this->db->query("SELECT * FROM `jobseeker` WHERE `country` = " . $country->id);
				$jobseekerCount = $query1->num_rows();

				// Get clients
				$query2 = $this->db->query("SELECT * FROM `client` WHERE `country` = " . $country->id);
				$clientCount = $query2->num_rows();

				// Get agency
				$countryID = '"'.$country->id.'";';
				$query3 = $this->db->query("SELECT * FROM `agency` WHERE `recruiting_from` LIKE  '%".$countryID."%' ");
				$agencyCount = $query3->num_rows();

				if( $jobseekerCount > 0 OR $clientCount > 0 OR $agencyCount > 0 ) {
					$country_count[] = array(
						'country_name'	=>	$country->name,
						'jobseekers'	=>	$jobseekerCount,
						'clients'		=>	$clientCount,
						'agencies'		=>	$agencyCount,
						'total'			=>	$jobseekerCount + $clientCount + $agencyCount
					);
				}
			}

			$country_count = self::sortArray($country_count, 'total', SORT_DESC);
			
		} 

		return $country_count;
	}

	private function sortArray()
	{
		$funcArgument = func_get_args();
		$content = array_shift($funcArgument);

		foreach ($funcArgument as $n => $field) {

			if (is_string($field)) {
				$tmp = array();
				foreach ($content as $key => $row) {
					$tmp[$key] = $row[$field];
				}
				$funcArgument[$n] = $tmp;
			}

		}

		$funcArgument[] = & $content;
		call_user_func_array('array_multisort', $funcArgument);
		return array_pop($funcArgument);
	}

	
}