<?php
class App_notifications {

  	function logs($table, $rsDetails)
  	{
  		switch ($table) {
            case 'users':
                $arrMod = array('moduleName' => 'User', 'fieldName' => $rsDetails->firstname.' '.$rsDetails->lastname, 'module' => 'MANAGE USER');
                break;
            case 'user_group':
                $arrMod = array('moduleName' => 'User Group', 'fieldName' => $rsDetails->group_name, 'module' => 'MANAGE GROUP');
                break;
            case 'residents':
                $arrMod = array('moduleName' => 'Residents', 'fieldName' => $rsDetails->firstname.' '.$rsDetails->lastname, 'module' => 'MANAGE RESIDENTS');
                break;
            default:
                return FALSE;
                break;
        }
        return $arrMod;
  	}
}