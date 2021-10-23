<?php

class Users_asset {

	public static function masterAsset() {
		$data = array(
			'jobseekers'		=>	self::jobseekers(),
			'edit_jobseekers'	=>	self::edit_jobseekers(),
			'edit_client'		=>	self::edit_client(),
			'clients'			=>	self::clients(),
			'agencies'			=>	self::agencies()
		);

		return $data;
	}

	private static function edit_client() {
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
								base_url('assets/js/plugins/pickers/pickadate/legacy.js'),
								base_url('assets/js/demo_pages/picker_date.js'),
							),
			'jsextend'	=>	array(),
			'file'		=>	'/users/jobseekers.php'
		);
		return $assetsArr;
	}

	private static function edit_jobseekers() {
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
			'jsextend'	=>	array(),
			'file'		=>	'/users/jobseekers.php'
		);
		return $assetsArr;
	}

	private static function jobseekers() {
		$assetsArr = array(
			'css' 		=> 	array(),
			'js'  		=> 	array(
								base_url('assets/js/plugins/tables/datatables/datatables.min.js'),
								base_url('assets/js/demo_pages/datatables_data_sources.js'),
								base_url('assets/js/plugins/tables/datatables/extensions/buttons.min.js')
							),
			'jsextend'	=>	array(),
			'file'		=>	'/users/jobseekers.php'
		);
		return $assetsArr;
	}

	private static function clients() {
		$assetsArr = array(
			'css' 		=> 	array(),
			'js'  		=> 	array(
								base_url('assets/js/plugins/tables/datatables/datatables.min.js'),
								base_url('assets/js/demo_pages/datatables_data_sources.js'),
								base_url('assets/js/plugins/tables/datatables/extensions/buttons.min.js')
							),
			'jsextend'	=>	array(),
			'file'		=>	'/users/clients.php'
		);
		return $assetsArr;
	}

	private static function agencies() {
		$assetsArr = array(
			'css' 		=> 	array(),
			'js'  		=> 	array(
								base_url('assets/js/plugins/tables/datatables/datatables.min.js'),
								base_url('assets/js/demo_pages/datatables_data_sources.js'),
								base_url('assets/js/plugins/tables/datatables/extensions/buttons.min.js')
							),
			'jsextend'	=>	array(),
			'file'		=>	'/users/agencies.php'
		);
		return $assetsArr;
	}

}