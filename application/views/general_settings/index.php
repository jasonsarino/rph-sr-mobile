<div class="content">

	<!-- Breadcrumb placement title -->
	<h6 class="content-group text-semibold">
		General Settings
	</h6>
	<!-- /breadcrumb placement title -->

	<form class="form-horizontal" action="<?=base_url('general_settings/save')?>" method="post" id="footerForm">
	<input type="hidden" name="company_id" value="<?=$details->company_id?>">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">General Settings</h5>
			<div class="heading-elements">
				<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn bg-slate-800 btn-loading">
					<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
				</button>
        	</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Footer Settings</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-lg-3">Contact Number* </label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="phone1" required value="<?=$details->phone1?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">Email Address* </label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="primary_email" required value="<?=$details->primary_email?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">Address* </label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="address1" required value="<?=$details->address1?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">Twitter Account</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="twitter_link" value="<?=$details->twitter_link?>" placeholder="https://www.twitter.com">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">LinkedIn Link</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="linkedin_link" value="<?=$details->linkedin_link?>" placeholder="https://www.linkedin.com">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">Instagram Link</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="instagram_link" value="<?=$details->instagram_link?>" placeholder="https://www.instagram.com">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	</form>
	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<script>

$(document).ready(function() {

	$('#footerForm').on('submit', function(e) {
		e.preventDefault();
		var form = $(this)[0];
	    var formdata = new FormData(form);
	    var url = $(this).attr("action");
	    var btn = $('.btn-loading');
		$.ajax({
			url: url,
			data: formdata, 
			dataType: 'json',
			method: 'post',
			contentType: false,
	        processData: false,
			success: function(data) {
				btn.button('reset')
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ location.reload(); }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
		

	});	

});



</script>