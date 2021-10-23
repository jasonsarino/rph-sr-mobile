<div class="content">

<form class="form-horizontal" action="<?=base_url('manage_users/add')?>" method="post" id="formAddUser">
	<input type="hidden" name="designation_id">
	<input type="hidden" class="form-control" name="username">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				ADD NEW USER
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

					<!-- Required Information -->
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Required Information</h5>
						</div>
						<div class="panel-body">

							<p>Required Fields = <span style="color:red; font-weight:bold;">*</span></p>

							<div class="form-group" id="piid-row">
								<label class="control-label col-lg-3">PIID <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="piid" id="piid" placeholder="Enter PIID" required>
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
									<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Last Name <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Email Address <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Position <span style="color:red; font-weight:bold;">*</span></label>
								<div class="col-lg-7">
									<select class="select-size-lg" name="position_id" id="position_id" required>
										<option></option>
										<?php foreach($position_list as $pl){?>
										<option value="<?=$pl->id?>"><?=$pl->position?></option>
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
										<option value="<?=$dl->id?>"><?=$dl->group_name?></option>
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

							<div class="form-group hide" id="divisionRow">
								<label class="control-label col-lg-3">Division</label>
								<div class="col-lg-7">
									<select class="select-size-lg" name="division_id" id="division_id">
										<option></option>
										<?php foreach($division_list as $divList){?>
										<option value="<?=$divList->id?>"><?=$divList->division?></option>
										<?php }?>
									</select>
								</div>
							</div>

						</div>
					</div>
					<!-- Required Information -->

					<!-- Other Information -->
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Other Information <span style="font-size:14px;">(Optional)</span></h5>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label class="control-label col-lg-3">Accreditation Number</label>
								<div class="col-lg-6">
									<input type="text" class="form-control" name="accre_number" placeholder="Enter Accreditation Number">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Accreditation Exp. Date</label>
								<div class="col-lg-8">
									<input type="date" class="form-control" name="accre_exp_date" placeholder="Enter Accreditation Exp. Date">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">DHSUD Number</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="dhsud_number" placeholder="Enter DHSUD Number">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Designated Broker</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="designated_broker" placeholder="Enter Designated Broker">
								</div>
							</div>

						</div>
					</div>
					<!-- Other Information -->


				</div>
				<div class="col-md-6">

					<!-- Contact Information -->
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Contact Information <span style="font-size:14px;">(Optional)</span></h5>
						</div>
						<div class="panel-body">

							<div class="form-group">
								<label class="control-label col-lg-3">Mobile Number</label>
								<div class="col-lg-6">
									<input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Address</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="address" placeholder="Enter Address">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Date of Birth</label>
								<div class="col-lg-6">
									<input type="date" class="form-control" name="dob" placeholder="Enter Date of Birth">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-3">Profile Picture</label>
								<div class="col-lg-7">
									<input type="file" class="file-styled-primary" name="profile_picture">
									<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb. Must be 64x64 of dimensions</span>
								</div>
							</div>

						</div>
					</div>
					<!-- Contact Information -->

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
	$.ajax({
		url: '<?=base_url("manage_users/validatepiid")?>',
		data: {piid:piid},
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

// $('.user-type').on('click', function() {
// 	var isBroker = $('input[name=isBroker]:checked', '#formAddUser').val()
// 	if( isBroker == 0 ) {
// 		$('#division_id').attr('required', true);
// 		$('#divisionRow').removeClass('hide');
// 	} else {
// 		$('#division_id').attr('required', false);
// 		$('#divisionRow').addClass('hide');
// 	}
// });

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