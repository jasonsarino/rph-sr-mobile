<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$system_title . ' - ' .$page_title?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet" type="text/css">
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
	<!-- /theme JS files -->

	<link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/images/logo/rcd-logo.png')?>">

	<style type="text/css">
	.login-bg {
		background: url('assets/images/backgrounds/login-bg-03.jpg');
		  background-repeat: no-repeat;
		  background-size: cover;
	}
	</style>

</head>

<body class="login-container login-bg">


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content" style="margin-top:0px !important;">

					<center>
						<img src="<?=base_url('assets/images/logo/main-logo.png')?>" class="img-responsive" style="margin-bottom:20px; width:400px;">
					</center>

					<!-- Simple login form -->
					<form action="<?=base_url('login/validateLogin')?>" id="formLogin" method="post">
						<div class="panel panel-body login-form" style="width:410px !important;">
									
							<div class="text-center">
								<h4 class="content-group">
									RMS ADMIN PANEL
								</h4>
							</div>
							<br />
							<br />
							<div id="login-message">
								<?php 
								if(isset($_SESSION['confirm_success'])){
									if($_SESSION['confirm_success'] === TRUE){
										echo "<div class='alert alert-success'>".$this->lang->line('login_text_03')."</div>";
									} else {
										echo "<div class='alert alert-danger'>".$this->lang->line('login_text_04')."</div>";
									}
									unset($_SESSION['confirm_success']);
								}
								?>
							</div>
							<!-- <div class="alert alert-success alert-styled-left">Invalid</div> -->


							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="PIID or Email Address" name="username" id="email_address" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="<?=$this->lang->line('login_text_06')?>" id="password" name="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										
									</div>

									<div class="col-sm-6 text-right">
										<a href="<?=base_url('forgot_password')?>"><?=$this->lang->line('login_text_08')?></a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-success btn-block" id="btnSignIn"><?=$this->lang->line('login_text_09')?> <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
							<br />
								<?=$footer_title?>
							</div>
						</div>
					</form>
					<!-- /simple login form -->

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
