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

	<script src="<?=base_url('assets/js/plugins/notifications/pnotify.min.js')?>"></script>
	<script src="<?=base_url('assets/js/demo_pages/components_notifications_pnotify.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/notifications/sweet_alert.min.js')?>"></script>

	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/images/logo/rcd-logo.png')?>">

	<!-- Theme JS files -->
	<?php 
        if ($css) {
            foreach($css as $cssFiles) {
                $mediaCss = '';
                // if($cssFiles == base_url("public/assets/fullcalendar/lib/fullcalendar.print.min.css")){
                //     $mediaCss = "media='print'";
                // }
                echo '<link href="'.$cssFiles.'" rel="stylesheet" '.$mediaCss.'/>';
            }
        }
        ?>
	<?php 
    if ($js) {
        foreach($js as $jsFiles) {
            echo '<script src="'.$jsFiles.'" type="text/javascript"></script>';
        }
    }
    ?>
	<!-- /theme JS files -->

	<script src="<?=base_url('assets/js/plugins/ui/moment/moment.min.js')?>"></script>
	<script src="<?=base_url('assets/js/app.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/ui/nicescroll.min.js')?>"></script>
	<script src="<?=base_url('assets/js/demo_pages/layout_fixed_custom.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/ui/ripple.min.js')?>"></script>

	<script src="<?=base_url('assets/js/general.js')?>"></script>

</head>
<style type="text/css">
	.login-bg {
		/*background: url('assets/images/backgrounds/login-bg-03.jpg');
		  background-repeat: no-repeat;
		  background-size: cover;*/
		  background-color: #f6fef1;
	}
	/*.sidebar */
	.sidebar {
		background-color: #5c9023 !important;
		/*background: url('assets/images/backgrounds/login-bg-03.jpg');
	  	background-repeat: no-repeat;
	  	background-size: 100% 50%;*/
	}
	.navigation>li>a {
		color: #fff;
	}
	</style>
<body class="navbar-top pace-done <?=(isset($active_menu) AND ($active_menu == 'account_settings')) ? 'has-detached-left sidebar-xs' : ''?>" >

	<!-- Main navbar -->
	<?php require_once(APPPATH.'views/navbar.php');?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php require_once(APPPATH.'views/sidebar.php');?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper login-bg">

				<!-- Content area -->
				<?php require_once(APPPATH.'views' . $file);?>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<div class="modal inmodal fade" id="modalPageStandard" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="modalPageLarge" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
            </div>
        </div>
    </div>

<script type="text/javascript">
var base_url = '<?=base_url()?>';

$('.amount_field').on('keyup', function(){
    val = this.value;
    val = val.replace (/,/g, "");
    formattedPrice = numberWithCommas(val);
    $(this).val(formattedPrice);
});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
</body>
</html>
