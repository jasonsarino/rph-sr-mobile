<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('insert')) 
{
    function insert($table_name, $insert_data)
    {
        $CI =& get_instance();
        return $CI->db->insert($table_name, $insert_data);
    }
}


if(!function_exists('validSession')) 
{
    function validSession($token)
    {
        $CI =& get_instance();
        $result = $CI->db->query("SELECT * FROM `users` WHERE `api_token` = '".$token['token_id']."'");
        if( $result->num_rows == 1 ) {
            $rs = $result->row();
        	$CI->session->set_userdata('user_id', $rs['id']);
        	return TRUE;
        } else {
        	return FALSE;
        }
    }
}