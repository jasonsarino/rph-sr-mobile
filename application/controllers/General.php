<?php 
/**
 * RCD
 *
 * @package RCD
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * General Class
 *
 * @package     RCD
 * @category    Controller
 */
class General extends CI_Controller{

	public $language;

    // Declare constant variables
    const SHORT_SYS_TITLE = 'RPH ADMIN PANEL';
	const SYSTEM_TITLE = 'RPH ';
	const FOOTER_TITLE = '&copy; RCD PEARL HOMES REALTY INC.';
    const FROM_EMAIL = 'no-reply@rcdpearlhomes.com';
    const FROM_MAIL_NAME = 'RPH Sales Report System';
    const TO_EMAIL_SR = 'rcdpearlhomes@gmail.com';


	function __construct()
	{
        // init __construct from parent class
		parent::__construct();	

		// Load general parameters
		self::loadData();
		
	}

    public function validatePermission($module, $return = FALSE)
    {
        // Load general model
        $this->load->model('general_model');

        // Validate module if user has access
        $result = $this->general_model->validatePermission($module);

        // If not
        if( $result === FALSE ){

            // If not
            if($return == TRUE) {
                return FALSE;
            } else {
                // Redirect to permission page if no permission to access
                redirect(base_url('permission_denied'));
            }
        } else {
            return TRUE;
        }   
    }

    private function getTotalSales($status = 0, $count = 0) {

        // Load sales report model
        $this->load->model('sales_report_model');

        if( self::getUserProfile()->privileges == "FULL-ACCESS" ) {
            $where = ['A.sr_status' => $status, 'A.nStatus' => 1];
        } else {
            $where = ['A.sr_status' => $status, 'A.nStatus' => 1, 'A.prepared_by' => $this->session->userdata('user_id')];
        }

        $srDetails = $result = $this->sales_report_model->getSalesReport($where);

        $total = 0;

        $totalCount = 0;
        if( $srDetails ) {
            foreach( $srDetails as $sr) {
                $totalCount++;
                $total = $total + $sr->net_total_contract_price; 
            }   
        }

        if( $count == 1 ) {
            return $totalCount;
        } else {
            return $total;
        }

        

    }

	private function loadData()
	{
        // Load general model
        $this->load->model('general_model');

        // reset pageclosed session
        $this->session->set_userdata('pageclosed', FALSE);

        // Set page variable
        $this->data['system_title'] = self::SYSTEM_TITLE;
		$this->data['short_system_title'] = self::SHORT_SYS_TITLE;
		$this->data['footer_title'] = date('Y') . self::FOOTER_TITLE;

        // Set default language
        if(!isset($_SESSION['language'])) {

            // Set english language as default
            $this->session->set_userdata('language', 'english');
            $lang = "english";
        } else {

            // As is current language
            $lang = $_SESSION['language'];
        }

        // Set variable language default
        $this->data['curr_lang'] = $lang;

        // Set language based on config
        $this->lang->load($lang, $lang);

        date_default_timezone_set('Asia/Manila');

		// Load parent menu
		if ($this->session->userdata('isLoggedAdminIN') === TRUE) {

            $this->data['totalApprovedSales'] = self::getTotalSales(1);
            $this->data['totalPendingSales'] = self::getTotalSales(0);

            $this->data['countApprovedSales'] = self::getTotalSales(1, 1);
            $this->data['countPendingSales'] = self::getTotalSales(0, 1);

            // Get user details 
            $this->data['userDetails'] = self::getUserProfile();

            // If user is not administrator, unserialize the permissions
            if($this->data['userDetails']->privileges != "FULL-ACCESS") {

                // Store permission to global variable 
                $this->data['user_privileges'] = unserialize($this->data['userDetails']->privileges);
            } else {

                // Store permission to global variable 
                $this->data['user_privileges'] = $this->data['userDetails']->privileges;
            }

            // Store company details to global variable
            $this->data['company_details'] = self::getCompanyDetails();
		}
		
	}

    public function getSystemDefault($cCode) {
        // Load general model
        $this->load->model('general_model');

        // return system code values
        return $this->general_model->getSystemDefault($cCode);
    }

     public function getSystemParams($param_name) {
        // Load general model
        $this->load->model('general_model');

        // return system code values
        return $this->general_model->getSystemParams($param_name);
    }

    public function getCompanyDetails() {
        // Load general model
        $this->load->model('general_model');

        // return company details
        return $this->general_model->getCompanyDetails();
    }

    public function log($module, $event, $log) {
        // Load general model
        $this->load->model('general_model');

        // Save transaction logs
    	$this->general_model->log($module, $event, $log);
    }

    public function getUserProfile() {
        // Load user model
        $this->load->model('user_model');

        // Get logged in user details
        $rsUserDetails = $this->user_model->getUserDetails($this->session->userdata('email'));

        // return user details
        return $rsUserDetails;
    }

    public function validateFields($data = array())
    {
        // Get array value table
    	$table = $data['table'];

        // default to blank
    	$where_not = '';

        // If fields are set
    	if(is_array($data['fields'])) {

    		$fields = array();
    		foreach($data['fields'] as $key => $val) {
    			$fields[] = $key . " =  '" . $val . "'";
    		}

    		$where =  implode(" AND ", $fields);

    	} 

        // If form is validation do the condition is not equal to current data
    	if(is_array($data['edit'])) {
    		$where_not = " AND ". $data['edit'][0] . " != " . $data['edit'][1];
    	}

        // Validate fields
        $sql = "SELECT * FROM {$table} WHERE `company_id` = '".$this->session->userdata('company_id')."' AND " . $where . $where_not;
    	// $sql = "SELECT * FROM {$table} WHERE `company_id` = '".$this->session->userdata('company_id')."' AND " . $where . $where_not;
		$query = $this->db->query($sql);

        // If existing return true
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
            // If not resturn false
			return FALSE;
		}	
    }

    

    public function enable($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);

        // If not, display error message
        if( $resultPer == FALSE ) {
            
            // Set return values
            $data = array("success" => FALSE, "message" => "You don't have permission to enable the data.");
        } else {

            // Enable the data
            $this->db->query("UPDATE {$table} SET `nStatus` = 1 WHERE `id` = " . $id);
            $result = $this->db->affected_rows();

            // If has affected row
            if( $result ){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been enabled.';
                General::log($module['module_name'], 'ENABLE', $log);

                // Set return values
                $data = array('success' => TRUE, 'message' => 'Enable has been processed.');
            } else {
                // Set return values
                $data = array('success' => FALSE, 'message' => 'There was an error in enable. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function disable($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);

        // If not, display error message
        if( $resultPer == FALSE ) {

            // Set return values
            $data = array("success" => FALSE, "message" => "You don't have permission to disable the data.");
        } else {

            // Disable the data
            $this->db->query("UPDATE {$table} SET `nStatus` = 0 WHERE `id` = " . $id);
            $result = $this->db->affected_rows();

            // If has affected row
            if( $result ){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been disabled by ';
                General::log($module['module_name'], 'DISABLE', $log);

                $data = array('success' => TRUE, 'message' => 'Disable has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in disable. Please try again!');
            }
        }

        die(json_encode($data));
    }

    public function delete($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);
        if($resultPer == FALSE) {
            $data = array("success" => FALSE, "message" => "You don't have permission to delete the data.");
        } else {
            $this->db->query("DELETE FROM {$table} WHERE `id` = " . $id);
            $result = $this->db->affected_rows();
            if($result){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been deleted.';
                General::log($module['module_name'], 'DELETE', $log);

                $data = array('success' => TRUE, 'message' => 'Delete has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in delete. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function delete_param($id, $code, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);
        if($resultPer == FALSE) {
            $data = array("success" => FALSE, "message" => "You don't have permission to delete the data.");
        } else {
            $this->db->query("DELETE FROM system_parameters WHERE `id` = " . $id);
            $result = $this->db->affected_rows();
            if($result){

                // Record activity log
                $module = $this->bims->getModuleName($code);
                $log = $module['name'] . ' with id#'.$id.' has been deleted.';
                General::log($module['module_name'], 'DELETE', $log);

                $data = array('success' => TRUE, 'message' => 'Delete has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in delete. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function getCountries($param) {

        // num_code, alpha_2_code, alpha_3_code, en_short_name, nationality
        $url = base_url('assets/json/countries.json');
        $string = json_decode(file_get_contents($url), TRUE);
        $resultArr = array();
        foreach( $string as $s ) {
            $this->db->query("INSERT INTO system_parameters(company_id,param_name,param_value) VALUES('1','nationality','".$s[$param]."')");
        }
        echo "done";

    }

    public function disableData($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);
        if($resultPer == FALSE) {
            $data = array("success" => FALSE, "message" => "You don't have permission to disable the data.");
        } else {
            $this->db->query("UPDATE {$table} SET `nStatus` = 0 WHERE `id` = " . $id);
            $result = $this->db->affected_rows();
            if($result){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been disabled.';
                General::log($module['module_name'], 'DISABLE', $log);

                $data = array('success' => TRUE, 'message' => 'Disable has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in disable. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function enabledUser($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);
        if($resultPer == FALSE) {
            $data = array("success" => FALSE, "message" => "You don't have permission to enable the data.");
        } else {
            $this->db->query("UPDATE {$table} SET `nStatus` = 1 WHERE `id` = " . $id);
            $result = $this->db->affected_rows();
            if($result){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been enabled.';
                General::log($module['module_name'], 'ENABLE', $log);

                $data = array('success' => TRUE, 'message' => 'Enabled has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in enable. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function deleteUser($id, $table, $permission)
    {
        // Set response header to json
        $this->bims->addJSONResponseHeader();

        // Validate module rights for logged in user
        $resultPer = self::validatePermission($permission, TRUE);
        if($resultPer == FALSE) {
            $data = array("success" => FALSE, "message" => "You don't have permission to enable the data.");
        } else {
            $this->db->query("UPDATE {$table} SET `nStatus` = 3 WHERE `id` = " . $id);
            $result = $this->db->affected_rows();
            if($result){

                // Record activity log
                $module = $this->bims->getModuleName($table);
                $log = $module['name'] . ' with id#'.$id.' has been enabled.';
                General::log($module['module_name'], 'ENABLE', $log);

                $data = array('success' => TRUE, 'message' => 'Enabled has been processed.');
            } else {
                $data = array('success' => FALSE, 'message' => 'There was an error in enable. Please try again!');
            }
        }
        
        die(json_encode($data));
    }

    public function getParameters($param_code) {
        $this->load->model('general_model');
        $where = array('param_code' => $param_code);
        $result = $this->general_model->getParameters($where);
        return $result;
    }


}