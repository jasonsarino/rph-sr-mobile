<?php 
/**
 * Amaalah
 *
 * @package Amaalah
 * @version Version 1.0.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * System Parameters Model Class
 *
 * @package     Amaalah
 * @category    Model
 */
class General_settings_model extends CI_Model{
	
	public function __construct() {
        // init __construct from parent class
        parent::__construct();  
    } 

    public function getDetails() {
        // Get logged in company information");
        $this->db->where('A.company_id', $this->session->userdata('company_id'));
        $query = $this->db->get('company A');
        return $query->row();
    }

    public function save($upload_data = array()) {
        $this->data = array(
            'phone1'            =>    $this->input->post('phone1'),
            'primary_email'     =>    $this->input->post('primary_email'),
            'address1'          =>    $this->input->post('address1'),
            'twitter_link'      =>    $this->input->post('twitter_link'),
            'linkedin_link'     =>    $this->input->post('linkedin_link'),
            'instagram_link'     =>    $this->input->post('instagram_link')
        );  
        $this->db->where('company_id', $this->input->post('company_id'));
        $result = $this->db->update("company",$this->data);
        return $result;
    }

    public function save_footer() {
        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_contact') ."' WHERE `cCode` = 'footer_contact'");
        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_email') ."' WHERE `cCode` = 'footer_email'");
        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_address') ."' WHERE `cCode` = 'footer_address'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_facebook') ."' WHERE `cCode` = 'footer_social_facebook'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_twitter') ."' WHERE `cCode` = 'footer_social_twitter'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_youtube') ."' WHERE `cCode` = 'footer_social_youtube'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_whatsapp') ."' WHERE `cCode` = 'footer_social_whatsapp'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_wechat') ."' WHERE `cCode` = 'footer_social_wechat'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_linked') ."' WHERE `cCode` = 'footer_social_linked'");

        $this->db->query("UPDATE `system_settings` SET `cValue` = '". $this->input->post('footer_social_instagram') ."' WHERE `cCode` = 'footer_social_instagram'");

        return TRUE;
    }
	
}