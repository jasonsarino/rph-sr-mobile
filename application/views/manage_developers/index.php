
<div class="content">

	<!-- /breadcrumb placement title -->
	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				MANAGE DEVELOPERS
			</h3>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<div class="panel panel-default">
		<div id="developer-dt"></div>
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
		url: base_url + 'manage_developers/datatable',
		success: function(data) {	
			$('#developer-dt').html(data);
		}, beforeSend: function() {
			$('#developer-dt').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br />Please wait...</center><br /><br />");
		}
	});
}
</script>