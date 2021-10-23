<?php

class Page_error_asset {

	public static function masterAsset()
	{
		$data = array(
			'index'		=>	self::indexAsset()
		);

		return $data;
	}

	private static function indexAsset()
	{
		$assetsArr = array(
			'css' 		=> 	array(base_url('public/assets/css/error.min.css')),
			'js'  		=> 	array(),
			'jsextend'	=>	array(),
			'file'		=>	'/page_error/page.php'
		);

		return $assetsArr;
	}

}