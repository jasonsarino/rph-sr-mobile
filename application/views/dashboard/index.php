<style>
.bg-info-600 {
	background-color: #578ebe;
	border-color: #7ca7cc;
}
</style>
<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				DASHBOARD
			</h3>
		</div>
		<div class="col-md-6">
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<div class="row">

		<div class="col-lg-3">
			<!-- Number of Pending SR -->
			<div class="panel bg-pink-400">
				<div class="panel-body">
					<h3 class="no-margin"><?=$countPendingSales?></h3>
					Number of Pending<br />Sales Report
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /Number of Pending SR -->
		</div>


		<div class="col-lg-3">
			<!-- Number of Pending SR -->
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<h3 class="no-margin"><?=$countApprovedSales?></h3>
					Number of Approved<br />Sales Report
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /Number of Pending SR -->
		</div>

		<div class="col-lg-3">
			<!-- Number of Pending SR -->
			<div class="panel bg-purple-400">
				<div class="panel-body">
					<h3 class="no-margin">&#8369; <?=number_format($totalPendingSales, 2)?></h3>
					Total Pending<br />Sales Report
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /Number of Pending SR -->
		</div>

		<div class="col-lg-3">
			<!-- Number of Pending SR -->
			<div class="panel bg-brown-400">
				<div class="panel-body">
					<h3 class="no-margin">&#8369; <?=number_format($totalApprovedSales, 2)?></h3>
					Total Approved<br />Sales Report
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /Number of Pending SR -->
		</div>


	</div>
	

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->


</div>

<script>
$(document).ready(function() {
    $('.slim-scroll').slimScroll({
        height: '300px'
    });
});

</script>