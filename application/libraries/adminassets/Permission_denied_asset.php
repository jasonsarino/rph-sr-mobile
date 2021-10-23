<?php

class Permission_denied_asset {

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
			'css' 		=> 	array(),
			'js'  		=> 	array(
								base_url('assets/js/plugins/tables/datatables/datatables.min.js'),
								base_url('assets/js/demo_pages/datatables_data_sources.js')
							),
			'jsextend'	=>	array(),
			'file'		=>	'/permissions/405.php'
		);

		return $assetsArr;
	}

}