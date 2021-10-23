<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				REPORTS
			</h3>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<form class="form-horizontal" action="<?=base_url('reports/view')?>" method="post" id="formReports" target="_blank">
	<div class="panel panel-success panel-bordered">
		<div class="panel-heading">
			<h5 class="panel-title">SALES REPORTS</h5>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">Filter By: </label>
				<label class="radio-inline">
					<input type="radio" name="filterBy" class="styled filterBy" checked="checked" value="reservation_date">
					Reservation Date
				</label>

				<label class="radio-inline">
					<input type="radio" name="filterBy" class="styled filterBy" value="createdDate">
					Created Date
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;"><span id="filterName">Reservation</span> Date Range: </label>
				<div class="col-lg-4">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-calendar22"></i></span>
						<input type="text" name="dateRange" class="form-control daterange-basic" value="<?=date("m/01/Y")?> - <?=date("m/t/Y")?>"> 
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">Name of Project: </label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="name_of_project" placeholder="Optional..."> 
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">Financing Scheme: </label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="financing_scheme" placeholder="Optional..."> 
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">Status: </label>
				<label class="radio-inline">
					<input type="radio" name="nStatus" class="styled" checked="checked" value="1">
					Approved
				</label>

				<label class="radio-inline">
					<input type="radio" name="nStatus" class="styled" value="0">
					Pending
				</label>

				<label class="radio-inline">
					<input type="radio" name="nStatus" class="styled" value="all">
					All Status
				</label>

			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">Report Format: </label>
				<label class="radio-inline">
					<input type="radio" name="reportFormat" class="styled" checked="checked" value="web">
					Web Print
				</label>

				<label class="radio-inline">
					<input type="radio" name="reportFormat" class="styled" value="excel">
					Export to Excel
				</label>

				<label class="radio-inline">
					<input type="radio" name="reportFormat" class="styled filterBy" value="csv">
					Export to CSV
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3 text-right" style="margin-right:20px;">&nbsp;</label>
				<div class="col-lg-4">
					<button type="submit" class="btn btn-bg-primary btn-loading">
						View Report
					</button>
				</div>
			</div>
			
		</div>
	</div>

	</form>
	<!-- /ajax sourced data -->

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<script>

$(".styled").uniform();

// Basic initialization
$('.daterange-basic').daterangepicker({
    applyClass: 'bg-slate-600',
    cancelClass: 'btn-default'
});

$('.filterBy').on('click', function() {
	var val = $(this).val();

	if( val == "reservation_date" ) {
		$('#filterName').text('Reservation');
	} else {
		$('#filterName').text('Created');
	}

});

</script>