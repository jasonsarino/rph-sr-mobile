<?php
class Assets_resources {

  	function getAssets($module)
  	{
  		$module = ucfirst($module) . '_asset';

  		require_once('adminassets/' . $module . ".php");
  		
    	return $module::masterAsset();
  	}
}