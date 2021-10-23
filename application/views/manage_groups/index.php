
<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				MANAGE GROUPS
			</h3>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<div class="panel panel-default">
		<div id="group-datatable"></div>
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
		url: base_url + 'manage_groups/datatable',
		success: function(data) {	
			$('#group-datatable').html(data);
		}, beforeSend: function() {
			$('#group-datatable').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br />Please wait...</center><br /><br />");
		}
	});
}
</script>