<?php

class Reports_asset {

	public static function masterAsset() {
		$data = array(
			'index'		=>	self::indexAsset()
		);

		return $data;
	}

	private static function indexAsset() {
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
								base_url('assets/js/demo_pages/form_select2.js'),
								base_url('assets/js/plugins/ui/moment/moment.min.js'),
								base_url('assets/js/plugins/pickers/daterangepicker.js'),
								base_url('assets/js/plugins/pickers/anytime.min.js'),
								base_url('assets/js/plugins/pickers/pickadate/picker.js'),
								base_url('assets/js/plugins/pickers/pickadate/picker.date.js'),
								base_url('assets/js/plugins/pickers/pickadate/picker.time.js'),
								base_url('assets/js/plugins/pickers/pickadate/legacy.js')
							),
			'jsextend'	=>	array(),
			'file'		=>	'/reports/index.php'
		);
		return $assetsArr;
	}

}