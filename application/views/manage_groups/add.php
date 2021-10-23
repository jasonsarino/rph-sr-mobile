<div class="content">

<form class="form-horizontal" action="<?=base_url('manage_groups/add')?>" method="post" id="formAddGroup">
	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				ADD NEW GROUP
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
	
	<div class="panel panel-success panel-bordered">
		<div class="panel-heading">
			<h5 class="panel-title">Group Information</h5>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-lg-2"><?=$this->lang->line('group_text_05')?></label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="group_name">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2"><?=$this->lang->line('group_text_06')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" name="group_desc">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2">&nbsp;</label>
				<div class="col-lg-7">
					<div class="checkbox"><label><input type="checkbox" class="styled" name="isFullAccess" id="isFullAccess" value="1">Full Access?</label></div>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-success panel-bordered" id="rowPermission">
		<div class="panel-heading">
			<h5 class="panel-title"><?=$this->lang->line('group_text_07')?></h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable nav-tabs-vertical nav-tabs-left">
						<ul class="nav nav-tabs nav-tabs-highlight">
							<li class="active"><a href="#sr-tab" data-toggle="tab"><i class="icon-file-stats position-left"></i> Sales Report <span id="sr_stats"></span></a></li>
							<li><a href="#left-tab-addressbook" data-toggle="tab"><i class="icon-user-tie position-left"></i> System Users <span id="usersPermissions_stats"></span></a></li>
							<li><a href="#manage-groups" data-toggle="tab"><i class="icon-users4 position-left"></i> Manage Groups <span id="grouppermissions_stats"></span></a></li>
							<li><a href="#manage-developers" data-toggle="tab"><i class="icon-design position-left"></i> Manage Developers <span id="developerPermissions_stats"></span></a></li>
							<li><a href="#positions" data-toggle="tab"><i class="icon-cog2 position-left"></i> Manage Positions <span id="positions_stats"></span></a></li>
							<li><a href="#divisions" data-toggle="tab"><i class="icon-cog2 position-left"></i> Manage Divisions <span id="divisions_stats"></span></a></li>
						</ul>

						<div class="tab-content">

							<div class="tab-pane active has-padding" id="sr-tab">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[add.sales_report]">Create new sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[edit.sales_report]">Edit sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[delete.sales_report]">Delete sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[view_pending.sales_report]">View pending sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[view_approved.sales_report]">View approved sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[approve.sales_report]">Approve sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[cancel.sales_report]">Cancel sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" name="privileges[reports.sales_report]">Reports</label></div>
							</div>

							<div class="tab-pane has-padding" id="left-tab-addressbook">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled usersPermissions" data-id="usersPermissions" name="privileges[view.manage_users]"><?=$this->lang->line('group_text_21')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled usersPermissions" data-id="usersPermissions" name="privileges[add.manage_users]"><?=$this->lang->line('group_text_22')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled usersPermissions" data-id="usersPermissions" name="privileges[edit.manage_users]"><?=$this->lang->line('group_text_23')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled usersPermissions" data-id="usersPermissions" name="privileges[delete.manage_users]"><?=$this->lang->line('group_text_24')?></label></div>
							</div>

							<div class="tab-pane has-padding" id="manage-groups">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" name="privileges[view.manage_groups]">View Groups</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" name="privileges[add.manage_groups]">Add Group</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" name="privileges[edit.manage_groups]">Edit Group</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" name="privileges[delete.manage_groups]">Delete Group</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage-developers">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" name="privileges[view.developers]">View Developers</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" name="privileges[add.developers]">Add Developer</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" name="privileges[edit.developers]">Edit Developer</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" name="privileges[delete.developers]">Delete Developer</label></div>
							</div>

							<div class="tab-pane has-padding" id="positions">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled positions" data-id="positions" name="privileges[view.manage_positions]">View Positions</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled positions" data-id="positions" name="privileges[add.manage_positions]">Add Position</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled positions" data-id="positions" name="privileges[edit.manage_positions]">Edit Position</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled positions" data-id="positions" name="privileges[delete.manage_positions]">Delete Position</label></div>
							</div>

							<div class="tab-pane has-padding" id="divisions">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled divisions" data-id="divisions" name="privileges[view.manage_divisions]">View Divisions</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled divisions" data-id="divisions" name="privileges[add.manage_divisions]">Add Division</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled divisions" data-id="divisions" name="privileges[edit.manage_divisions]">Edit Division</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled divisions" data-id="divisions" name="privileges[delete.manage_divisions]">Delete Division</label></div>
							</div>

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

$('.styled').on('click', function() {
	var class_name = $(this).data('id');
	checked = $('.' + class_name + ':checked').length;
	checkbox_length = $('.' + class_name).length;
	$('#' + class_name + '_stats').text('(' + checked + ' / ' + checkbox_length + ')');
});

$('.styled').each(function() {
	var class_name = $(this).data('id');
	checked = $('.' + class_name + ':checked').length;
	checkbox_length = $('.' + class_name).length;
	$('#' + class_name + '_stats').text('(' + checked + ' / ' + checkbox_length + ')');
});

$('#formAddGroup').on('submit', function(e) {
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
				setTimeout(function(){ window.location = base_url + 'manage_groups'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	


$('#isFullAccess').on('click', function() {

	if( $(this).is(':checked') ) {
		$('#rowPermission').addClass('hide');
	} else {
		$('#rowPermission').removeClass('hide');
	}

});
</script>