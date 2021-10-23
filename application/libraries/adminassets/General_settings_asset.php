<?php

class General_settings_asset {

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
								base_url('assets/js/core/libraries/jquery_ui/interactions.min.js'),
								base_url('assets/js/plugins/forms/selects/select2.min.js'),
								base_url('assets/js/demo_pages/form_select2.js')
							),
			'jsextend'	=>	array()
		);

		return $assetsArr;
	}

}