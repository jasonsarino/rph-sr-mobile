<div class="content">

	<form class="form-horizontal" action="<?=base_url('manage_divisions/add')?>" method="post" id="formAddDivision">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				ADD NEW DIVISION
			</h3>
		</div>
		<div class="col-md-6">
			<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading pull-right">
				<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
			</button>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<div class="panel panel-success panel-bordered company_row">
		<div class="panel-heading">
			<h5 class="panel-title">Required Fields</h5>
		</div>
		<div class="panel-body">
			

			<div class="form-group">
				<label class="control-label col-lg-2">Division Name</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="division" placeholder="Enter Division Name" required>
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

$('#formAddDivision').on('submit', function(e) {
	e.preventDefault();
	var formdata = $(this).serialize();
	var btn = $('.btn-loading');
	var url = $(this).attr('action');
	$.ajax({
		url: url,
		data: formdata, 
		dataType: 'json',
		type: 'post',
		success: function(data) {
			btn.button('reset')
			if(data.success) {
				notif('SUCCESS', data.message, 'bg-success');
				setTimeout(function(){ window.location = base_url + 'manage_divisions'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	


</script>