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
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?=base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script src="<?=base_url('assets/js/app.js')?>"></script>

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
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
	<div class="navbar-header" style="background-color: #FFF !important; height:70px;">
		<a class="navbar-brand" href="<?=base_url('dashboard')?>" style="margin-left:20px !important; font-size:28px; margin-top:20px; font-weight:bold;">RCD Sales Report</a>

		<ul class="nav navbar-nav visible-xs-block" style="margin-top:10px !important;">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			<?php if( isset($active_menu) AND $active_menu == "account_settings" ) {?>
			<li><a class="sidebar-mobile-detached-toggle legitRipple"><i class="icon-grid7"></i></a></li>
			<?php }?>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav" style="margin-top: 10px;">
			<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>

		<div class="navbar-right">
			<ul class="nav navbar-nav navbar-right" style="margin-top:10px;">
				<li class="dropdown language-switch hide">
					<a class="dropdown-toggle" data-toggle="dropdown">English<span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a class="deutsch">Deutsch</a></li>
					</ul>
				</li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<?php $profile_avatar = ($userDetails->profile_picture) ? $userDetails->profile_picture : 'default_avatar.jpg';?>
						<img src="<?=base_url('assets/images/users/' . $profile_avatar)?>" alt="">
						<span><?=$userDetails->firstname.' '.$userDetails->lastname?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?=base_url('account_settings')?>"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?=base_url('logout')?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Error title -->
					<div class="text-center content-group">
						<h1 class="error-title">405</h1>
						<h5>Oops, an error has occurred. Not allowed!</h5>
					</div>
					<!-- /error title -->


					<!-- Error content -->
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
							<div class="text-center">
								<a href="<?=base_url('dashboard')?>" class="btn bg-pink-400"><i class="icon-circle-left2 position-left"></i> Back to dashboard</a>
							</div>
						</div>
					</div>
					<!-- /error wrapper -->


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
