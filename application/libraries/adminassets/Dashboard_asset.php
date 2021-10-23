<?php

class Dashboard_asset {

	public static function masterAsset()
	{
		$data = array(
			'index'				=>	self::indexAsset(),
			'current_queues'	=>	self::current_queues()
		);

		return $data;
	}

	private static function indexAsset()
	{
		$assetsArr = array(
			'css' 		=> 	array(),
			'js'  		=> 	array(base_url('assets/js/slimscroll.js')),
			'jsextend'	=>	array(),
			'file'		=>	'/dashboard/index.php'
		);

		return $assetsArr;
	}

	private static function current_queues()
	{
		$assetsArr = array(
			'css' 		=> 	array(),
			'js'  		=> 	array(),
			'jsextend'	=>	array(),
			'file'		=>	'/dashboard/current_queues.php'
		);

		return $assetsArr;
	}

}