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
	<script src="<?=base_url('assets/js/plugins/forms/selects/select2.min.js')?>"></script>
	<script src="<?=base_url('assets/js/demo_pages/form_select2.js')?>"></script>

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

</head>

<body class="login-container">


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<center>
						<img src="<?=base_url('assets/images/chillius-online.png')?>" class="img-responsive" style="width:250px; margin-bottom:30px;">
					</center>
					<!-- Registration form -->
					<form action="<?=base_url('register/create')?>" method="post" id="formRegister">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<h4 class="content-group"><?=$this->lang->line('register_text_01')?> <small class="display-block"><?=$this->lang->line('register_text_02')?></small></h4>
										</div>

										<?php if(isset($_SESSION['register_message'])){?>
										<div class="alert alert-success"><?=$_SESSION['register_message']?></div>
										<?php }?>

										<div id="registration-message"></div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="<?=$this->lang->line('register_text_03')?>" name="company_name" id="company_name">
													<div class="form-control-feedback">
														<i class="icon-office text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="<?=$this->lang->line('register_text_04')?>" name="firstname" id="firstname">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="<?=$this->lang->line('register_text_05')?>" name="lastname" id="lastname">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" placeholder="<?=$this->lang->line('register_text_06')?>" name="password" id="password">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" placeholder="<?=$this->lang->line('register_text_07')?>" name="repeat_password" id="repeat_password">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" placeholder="<?=$this->lang->line('register_text_08')?>" name="email" id="email">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" placeholder="<?=$this->lang->line('register_text_09')?>" name="repeat_email" id="repeat_email">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">

											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" id="chkaccept">
													<?=$this->lang->line('register_text_19')?> <a href="#" target="_blank"><?=$this->lang->line('register_text_10')?></a>
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" name="subscriber" value="1">
													<?=$this->lang->line('register_text_20')?>
												</label>
											</div>
										</div>

										<div class="text-right">
											<a href="<?=base_url('login')?>" class="btn btn-bg-primary"><i class="icon-arrow-left13 position-left"></i> <?=$this->lang->line('register_text_11')?></a>
											<button type="submit" id="btnSignUp" class="btn btn-bg-primary btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> <?=$this->lang->line('register_text_12')?></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						<?=$footer_title?>
					</div>
					<!-- /footer -->
					<?php unset($_SESSION['register_message'])?>
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
