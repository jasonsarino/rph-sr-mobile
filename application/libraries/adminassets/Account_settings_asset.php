<?php

class Account_settings_asset {

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
								base_url('assets/js/plugins/forms/styling/uniform.min.js'),
								base_url('assets/js/plugins/velocity/velocity.min.js'),
								base_url('assets/js/plugins/velocity/velocity.ui.min.js'),
								base_url('assets/js/plugins/buttons/spin.min.js'),
								base_url('assets/js/plugins/buttons/ladda.min.js'),
								base_url('assets/js/plugins/uploaders/fileinput/plugins/purify.min.js'),
								base_url('assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js'),
								base_url('assets/js/plugins/uploaders/fileinput/fileinput.min.js'),
								base_url('assets/js/demo_pages/uploader_bootstrap.js')
							),
			'jsextend'	=>	array()
		);
		return $assetsArr;
	}

}