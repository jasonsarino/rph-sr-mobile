<div class="content">

	<!-- Detached sidebar -->
	<div class="sidebar-detached">
		<div class="sidebar sidebar-default sidebar-separate">
			<div class="sidebar-content">

				<!-- User details -->
				<div class="content-group">
					<div class=" panel-body panel-success border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
						<div class="content-group-sm">
							<h6 class="text-semibold no-margin-bottom">
								<?=$userDetails->firstname.' '.$userDetails->lastname;?>
							</h6>

							<span class="display-block"><?=$userDetails->group_name;?></span>
						</div>
						<?php $profile_avatar = ($userDetails->profile_picture) ? $userDetails->profile_picture : 'default_avatar.jpg';?>
						<a href="#" class="display-inline-block content-group-sm">
							<img src="<?=base_url('assets/images/users/' . $profile_avatar)?>" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
						</a>
					</div>

					<div class="panel no-border-top no-border-radius-top">
						<ul class="navigation">
							<li class="active"><a href="#profile" data-toggle="tab"><i class="icon-user"></i> <?=$this->lang->line('account_settings_text_01')?></a></li>
							<li><a href="#change_password" data-toggle="tab"><i class="icon-cog"></i> <?=$this->lang->line('account_settings_text_02')?></a></li>
							<li><a href="#change_avatar" data-toggle="tab"><i class="icon-image2"></i> <?=$this->lang->line('account_settings_text_03')?></a></li>
							<li class="navigation-divider"></li>
							<li><a href="<?=base_url('logout')?>"><i class="icon-switch2"></i> <?=$this->lang->line('account_settings_text_04')?></a></li>
						</ul>
					</div>
				</div>
				<!-- /user details -->

			</div>
		</div>
	</div>
	<!-- /detached sidebar -->

	<div class="container-detached">
		<div class="content-detached">
			<div class="tab-content">

				<div class="tab-pane fade in active" id="profile">
					<!-- Profile info -->
					<div class="panel panel-success panel-bordered">
						<div class="panel-heading">
							<h6 class="panel-title"><?=$this->lang->line('account_settings_text_05')?></h6>
						</div>

						<div class="panel-body">
							<form action="<?=base_url('account_settings/save_profile')?>" id="formProfile" method="post">
							<input type="hidden" value="<?=$userDetails->id;?>" class="form-control" name="id">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_06')?></label>
											<input type="text" value="<?=$userDetails->firstname;?>" class="form-control" name="firstname">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_07')?></label>
											<input type="text" value="<?=$userDetails->lastname;?>" class="form-control" name="lastname">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_08')?></label>
											<input type="email" value="<?=$userDetails->email;?>" class="form-control" name="email">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_09')?></label>
											<input type="text" value="<?=$userDetails->phone;?>" class="form-control" name="phone">
										</div>
									</div>
								</div>

		                        <div class="text-left">
		                        	<button type="submit" class="btn btn-bg-primary" id="btnsaveprofile"><i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?> </button>
		                        </div>
							</form>
						</div>
					</div>
					<!-- /profile info -->
				</div>

				<div class="tab-pane fade" id="change_password">
					<!-- Profile info -->
					<div class="panel panel-success panel-bordered">
						<div class="panel-heading">
							<h6 class="panel-title"><?=$this->lang->line('account_settings_text_10')?></h6>
						</div>

						<div class="panel-body">
							<form action="<?=base_url('account_settings/save_password')?>" id="formPassword" method="post">
							<input type="hidden" value="<?=$userDetails->id;?>" class="form-control" name="id">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_11')?></label>
											<input type="password" class="form-control" name="current_password">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_12')?></label>
											<input type="password" class="form-control" name="new_password" placeholder="Enter new password">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label><?=$this->lang->line('account_settings_text_13')?></label>
											<input type="password" class="form-control" name="repeat_password" placeholder="Repeat new password">
										</div>
									</div>
								</div>
		                        <div class="text-left">
		                        	<button type="submit" class="btn btn-bg-primary" id="btnpassword"><i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?></button>
		                        </div>
							</form>
						</div>
					</div>
					<!-- /profile info -->
				</div>

				<div class="tab-pane fade" id="change_avatar">
					<!-- Profile info -->
					<div class="panel panel-success panel-bordered">
						<div class="panel-heading">
							<h6 class="panel-title"><?=$this->lang->line('account_settings_text_03')?></h6>
						</div>

						<div class="panel-body">
							<br />
							<form action="<?=base_url('account_settings/change_avatar')?>" id="formAvatar" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$userDetails->id;?>" class="form-control" name="id">
								<div class="form-group">
									<label class="col-lg-2 control-label text-semibold"><?=$this->lang->line('account_settings_text_14')?></label>
									<div class="col-lg-10">
										<input type="file" class="file-input-extensions" name="profile_picture">
										<span class="help-block"><?=$this->lang->line('account_settings_text_15')?> <code>jpg</code>, <code>gif</code> and <code>png</code> <?=$this->lang->line('account_settings_text_16')?></span>
									</div>
								</div>
								<br /><br /><br /><br /><br /><br /><br /><br /><br />
							</form>
						</div>
					</div>
					<!-- /profile info -->
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<script>

$('#formAvatar').on('submit', function(e){
	e.preventDefault();

	var form = $(this)[0];
    var formdata = new FormData(form);
	var url = $(this).attr('action');

	$.ajax({
		url: url,
		dataType: 'json',
		data: formdata,
		type: 'post',
		contentType: false,
        processData: false,
		success: function(data){
			if(data.success) {
				notif('SUCCESS', data.message, 'bg-success');
				setTimeout(function(){ window.location = base_url + 'account_settings'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}
	});
});

$('#formPassword').on('submit', function(e){
	e.preventDefault();

	var btn = $('#btnpassword');
	var formdata = $(this).serialize();
	var url = $(this).attr('action');

	$.ajax({
		url: url,
		dataType: 'json',
		data: formdata,
		type: 'post',
		success: function(data){
			btn.button('reset');
			if(data.success) {
				notif('SUCCESS', data.message, 'bg-success');
				setTimeout(function(){ window.location = base_url + 'account_settings'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
});


$('#formProfile').on('submit', function(e){
	e.preventDefault();

	var btn = $('#btnsaveprofile');
	var form = $(this)[0];
    var formdata = new FormData(form);
	var url = $(this).attr('action');

	$.ajax({
		url: url,
		dataType: 'json',
		data: formdata,
		type: 'post',
		contentType: false,
        processData: false,
		success: function(data){
			btn.button('reset');
			if(data.success) {
				notif('SUCCESS', data.message, 'bg-success');
				setTimeout(function(){ window.location = base_url + 'account_settings'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
});

</script>