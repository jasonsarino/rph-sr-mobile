<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$system_title . ' - ' .$page_title?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/core.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/components.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/colors.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/custom.css')?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?=base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?=base_url('assets/js/plugins/forms/styling/uniform.min.js')?>"></script>
	<script src="<?=base_url('assets/js/app.js')?>"></script>

	<script src="<?=base_url('assets/js/demo_pages/login.js')?>"></script>

	<script src="<?=base_url('assets/js/plugins/ui/ripple.min.js')?>"></script>

	<link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	  <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>assets/favicon/apple-icon-57x57.png">
	  <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>assets/favicon/apple-icon-60x60.png">
	  <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url()?>assets/favicon/apple-icon-72x72.png">
	  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/favicon/apple-icon-76x76.png">
	  <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url()?>assets/favicon/apple-icon-114x114.png">
	  <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/favicon/apple-icon-120x120.png">
	  <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url()?>assets/favicon/apple-icon-144x144.png">
	  <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>assets/favicon/apple-icon-152x152.png">
	  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>assets/favicon/apple-icon-180x180.png">
	  <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url()?>assets/favicon/android-icon-192x192.png">
	  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets/favicon/favicon-32x32.png">
	  <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/favicon/favicon-96x96.png">
	  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/favicon/favicon-16x16.png">
	  <link rel="manifest" href="<?=base_url()?>assets/favicon/manifest.json">
	  <meta name="msapplication-TileColor" content="#ffffff">
	  <meta name="msapplication-TileImage" content="<?=base_url()?>assets/favicon/ms-icon-144x144.png">
	  <meta name="theme-color" content="#ffffff">

	  <style type="text/css">
	.login-bg {
		background: url('assets/images/backgrounds/login-bg-01.jpg');
		  background-repeat: no-repeat;
		  background-size: 100% 100%;
	}
	</style>

	<!-- /theme JS files -->

</head>

<body class="login-container login-bg">


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<center>
						<img src="<?=base_url('assets/images/logo/main-logo.png')?>" class="img-responsive" style="margin-bottom:20px; width:400px;">
					</center>
					<!-- Password recovery -->
					<form action="<?=base_url('forgot_password/validateEmailAddress')?>" method="post" id="formResetPassword">
						<div class="panel panel-body login-form" style="width:400px !important;">
							<div class="text-center">
								<h6 class="content-group"><?=$this->lang->line('forgot_pw_text_01')?> <small class="display-block"><?=$this->lang->line('forgot_pw_text_02')?></small></h6>
							</div>
							<div id="recovery-message"></div>

							<div class="form-group has-feedback-left">
								<input type="email" class="form-control" placeholder="<?=$this->lang->line('forgot_pw_text_03')?>" name="email_address">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit" class="btn btn-bg-primary btn-block" id="resetbtn"><?=$this->lang->line('forgot_pw_text_04')?> <i class="icon-arrow-right14 position-right"></i></button>
							<div class="text-center" style="margin-top:30px;">
								<a href="<?=base_url()?>"><?=$this->lang->line('forgot_pw_text_05')?></a> 

							</div>
						</div>
					</form>
					<!-- /password recovery -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						<?=$footer_title?>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
