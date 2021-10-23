<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				SYSTEM USERS
			</h3>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<div class="panel panel-default">
		<div id="user-datatable"></div>
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
		url: base_url + 'manage_users/datatable',
		success: function(data) {	
			$('#user-datatable').html(data);
		}, beforeSend: function() {
			$('#user-datatable').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}
</script>