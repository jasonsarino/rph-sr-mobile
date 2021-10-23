<div class="content">

<form class="form-horizontal" action="<?=base_url('manage_users/edit')?>" method="post" id="formAddUser">
	<input type="hidden" name="id" id="user_id" value="<?=$user_details->id?>">
	<input type="hidden" name="old_image" value="<?=$user_details->profile_picture?>">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				EDIT USER
			</h3>
		</div>
		<div class="col-md-6">
			<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading pull-right">
				<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
			</button>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
			<div class="row">
				<div class="col-md-6">

					<!-- Required Fields -->
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Required Fields</h5>
						</div>
						<div class="panel-body">

							<p>Required Fields = <span style="color:red; font-weight:bold;">*</span></p>

							<div class="form-group" id="piid-row">
								<label class="control-label col-lg-3">PIID <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="piid" id="piid" placeholder="Enter PIID" value="<?=$user_details->piid?>" required>
									<span id="errorMessage" class="hide">
										<div class="form-control-feedback">
											<i class="icon-notification2"></i>
										</div>
										<span class="help-block" style="font-weight:bold;"></span>
									</span>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">First Name <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?=$user_details->firstname?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Last Name <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?=$user_details->lastname?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Email Address <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?=$user_details->email?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Position <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<select class="select-size-lg" name="position_id" id="position_id" required>
										<option></option>
										<?php foreach($position_list as $pl){?>
										<option value="<?=$pl->id?>" <?php if($user_details->position_id == $pl->id) { echo 'selected'; }?>><?=$pl->position?></option>
										<?php }?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">User Role <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<select class="select-size-lg" name="group_id" id="group_id" required>
										<option></option>
										<?php foreach($user_group_list as $dl){?>
										<option value="<?=$dl->id?>" <?php if($user_details->group_id == $dl->id) { echo 'selected'; }?> ><?=$dl->group_name?></option>
										<?php }?>
									</select>
								</div>
							</div>

							<div class="form-group hide">
								<label class="control-label col-lg-3">User Type </label>
								<label class="radio-inline">
									<input type="radio" name="isBroker" class="styled user-type" checked="checked" value="1">
									Broker
								</label>

								<label class="radio-inline">
									<input type="radio" name="isBroker" class="styled user-type" value="0">
									Internal Network
								</label>
							</div>

							<div class="form-group <?=( $user_details->group_id != 7 ) ? "hide" : ""?>" id="divisionRow">
								<label class="control-label col-lg-3">Division</label>
								<div class="col-lg-7">
									<select class="select-size-lg" name="division_id" id="division_id" <?=( $user_details->group_id == 7 ) ? "required" : ""?>>
										<option></option>
										<?php foreach($division_list as $divList){?>
										<option value="<?=$divList->id?>" <?php if($user_details->division_id == $divList->id) { echo 'selected'; }?>><?=$divList->division?></option>
										<?php }?>
									</select>
								</div>
							</div>

						</div>
					</div>
					<!-- Required Fields -->

					<!-- Other Information -->
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Other Information <span style="font-size:14px;">(Optional)</span></h5>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label class="control-label col-lg-3">Accreditation Number</label>
								<div class="col-lg-6">
									<input type="text" class="form-control" name="accre_number" placeholder="Enter Accreditation Number" value="<?=$user_details->accre_number?>" >
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Accreditation Exp. Date</label>
								<div class="col-lg-8">
									<input type="date" class="form-control" name="accre_exp_date" placeholder="Enter Accreditation Exp. Date" value="<?=$user_details->accre_exp_date?>" >
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">DHSUD Number</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="dhsud_number" placeholder="Enter DHSUD Number" value="<?=$user_details->dhsud_number?>" >
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Designated Broker</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="designated_broker" placeholder="Enter Designated Broker" value="<?=$user_details->designated_broker?>" >
								</div>
							</div>

						</div>
					</div>
					<!-- Other Information -->

				</div>
				<div class="col-md-6">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Personal Information</h5>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label class="control-label col-lg-3">Mobile Number</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number" value="<?=$user_details->phone?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Address</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?=$user_details->address?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Date of Birth</label>
								<div class="col-lg-6">
									<input type="date" class="form-control" name="dob" placeholder="Enter Date of Birth" value="<?=$user_details->dob?>">
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-lg-3">Profile Picture</label>
								<div class="col-lg-7">
									<input type="file" class="file-styled-primary" name="profile_picture">
									<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb. Must be 64x64 of dimensions</span>

									<?php if(!empty($user_details->profile_picture)) {?>
									<div class="img-thumbnail"><img src="<?=base_url('assets/images/users/' . $user_details->profile_picture)?>" class="img-responsive" style="height:150px;"></div>
									<?php }?>

								</div>
							</div>

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

$(".file-styled-primary").uniform({
	fileButtonClass: 'action btn bg-green'
});

$('#piid').on('keyup', function() {
	var piid = $(this).val();
	var user_id = $('#user_id').val();
	$.ajax({
		url: '<?=base_url("manage_users/validatepiid")?>',
		data: {piid:piid,user_id:user_id},
		type: 'POST',
		dataType: 'JSON',
		success: function(data) {
			if( data.success ) {
				$('#errorMessage').removeClass('hide');
				$('#errorMessage .help-block').html(data.message);
				$('#piid-row').addClass('has-warning');
				$('#piid-row').addClass('has-feedback');
			} else {
				$('#errorMessage').addClass('hide');
				$('#errorMessage .help-block').html("");
				$('#piid-row').removeClass('has-warning');
				$('#piid-row').removeClass('has-feedback');
			}
		}
	});
});


$('#group_id').on('change', function() {
	var id = $(this).val();

	if(id == 7) {
		$('#division_id').attr('required', true);
		$('#divisionRow').removeClass('hide');
	} else {
		$('#division_id').attr('required', false);
		$('#divisionRow').addClass('hide');
	}
});

$('#formAddUser').on('submit', function(e) {
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
				setTimeout(function(){ window.location = base_url + 'manage_users'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	
</script>