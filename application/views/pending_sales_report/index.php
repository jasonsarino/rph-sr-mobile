<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				SALES REPORT <i class="icon-arrow-right5"></i> BROKER <i class="icon-arrow-right5"></i> PENDING
			</h3>
		</div>
		<div class="col-md-6">
			<h4 class="content-group text-bold text-right">
				<span style="background: #fde984;padding-left: 10px;padding-right: 10px;">PENDING SALES: &#8369; <?=number_format($totalPendingSales, 2)?></span>
			</h4>
		</div>
	</div>
	<!-- /breadcrumb placement title -->


	<!-- Ajax sourced data -->
	<div class="panel panel-default">
		<div id="pending-sales-report"></div>
	</div>
	<!-- /ajax sourced data -->

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<script>
$(document).ready(function() {
	datatable();
});

function datatable() {
	$.ajax({
		url: base_url + 'pending_sales_report/datatable',
		success: function(data) {	
			$('#pending-sales-report').html(data);
		}, beforeSend: function() {
			$('#pending-sales-report').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}
</script>