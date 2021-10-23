<div class="content">

	<form class="form-horizontal" action="<?=base_url('manage_groups/edit')?>" method="post" id="formEditGroup">
	<input type="hidden" name="id" value="<?=$group_details->id?>">

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
			<h5 class="panel-title"><?=$this->lang->line('group_text_31')?></h5>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-lg-2"><?=$this->lang->line('group_text_05')?></label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="group_name" value="<?=$group_details->group_name?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2"><?=$this->lang->line('group_text_06')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" name="group_desc" value="<?=$group_details->group_desc?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2">&nbsp;</label>
				<div class="col-lg-7">
					<div class="checkbox"><label><input type="checkbox" class="styled" name="isFullAccess" id="isFullAccess" value="1" <?=($group_details->privileges == 'FULL-ACCESS') ? "checked" : ""?>>Full Access?</label></div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	if( $group_details->privileges != 'FULL-ACCESS' ) {
		$privileges = unserialize($group_details->privileges);
	}
	
	?>
	<div class="panel panel-success panel-bordered <?=($group_details->privileges == 'FULL-ACCESS') ? "hide" : ""?>" id="rowPermission">
		<div class="panel-heading">
			<h5 class="panel-title"><?=$this->lang->line('group_text_07')?></h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable nav-tabs-vertical nav-tabs-left">
						<ul class="nav nav-tabs nav-tabs-highlight">
							<li class="active"><a href="#sr-tab" data-toggle="tab"><i class="icon-file-stats position-left"></i> Sales Report <span id="sr_stats"></span></a></li>
							<li><a href="#left-tab-addressbook" data-toggle="tab"><i class="icon-user-tie position-left"></i> System Users <span id="addressbookpermissions_stats"></span></a></li>
							<li><a href="#manage-groups" data-toggle="tab"><i class="icon-users4 position-left"></i> Manage Groups <span id="grouppermissions_stats"></span></a></li>
							<li><a href="#manage-developers" data-toggle="tab"><i class="icon-design position-left"></i> Manage Developers <span id="developerPermissions_stats"></span></a></li>
							<li><a href="#announcements" data-toggle="tab"><i class="icon-pushpin position-left"></i> Announcements <span id="announcements_stats"></span></a></li>
						</ul>

						<div class="tab-content">

							<div class="tab-pane has-padding" id="announcements">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled announcements_stats" data-id="announcements_stats" <?=(isset($privileges['view.developers']) AND $privileges['view.developers'] == 1) ? 'checked' : ''?> name="privileges[view.announcements]">View Announcements</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled announcements_stats" data-id="announcements_stats" <?=(isset($privileges['add.developers']) AND $privileges['add.developers'] == 1) ? 'checked' : ''?> name="privileges[add.announcements]">Add Announcement</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled announcements_stats" data-id="announcements_stats" <?=(isset($privileges['edit.developers']) AND $privileges['edit.developers'] == 1) ? 'checked' : ''?> name="privileges[edit.announcements]">Edit Announcement</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled announcements_stats" data-id="announcements_stats" <?=(isset($privileges['delete.developers']) AND $privileges['delete.developers'] == 1) ? 'checked' : ''?> name="privileges[delete.announcements]">Delete Announcement</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage-developers">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" <?=(isset($privileges['view.developers']) AND $privileges['view.developers'] == 1) ? 'checked' : ''?> name="privileges[view.developers]">View Developers</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" <?=(isset($privileges['add.developers']) AND $privileges['add.developers'] == 1) ? 'checked' : ''?> name="privileges[add.developers]">Add Developer</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" <?=(isset($privileges['edit.developers']) AND $privileges['edit.developers'] == 1) ? 'checked' : ''?> name="privileges[edit.developers]">Edit Developer</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled developerPermissions" data-id="developerPermissions" <?=(isset($privileges['delete.developers']) AND $privileges['delete.developers'] == 1) ? 'checked' : ''?> name="privileges[delete.developers]">Delete Developer</label></div>
							</div>

							<div class="tab-pane active has-padding" id="sr-tab">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['add.sales_report']) AND $privileges['add.sales_report'] == 1) ? 'checked' : ''?> name="privileges[add.sales_report]">Create new sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['add.sales_report']) AND $privileges['edit.sales_report'] == 1) ? 'checked' : ''?> name="privileges[edit.sales_report]">Edit sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['add.sales_report']) AND $privileges['delete.sales_report'] == 1) ? 'checked' : ''?> name="privileges[delete.sales_report]">Delete sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['view_pending.sales_report']) AND $privileges['view_pending.sales_report'] == 1) ? 'checked' : ''?> name="privileges[view_pending.sales_report]">View pending sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['view_approved.sales_report']) AND $privileges['view_approved.sales_report'] == 1) ? 'checked' : ''?> name="privileges[view_approved.sales_report]">View approved sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['approve.sales_report']) AND $privileges['approve.sales_report'] == 1) ? 'checked' : ''?> name="privileges[approve.sales_report]">Approve sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['cancel.sales_report']) AND $privileges['cancel.sales_report'] == 1) ? 'checked' : ''?> name="privileges[cancel.sales_report]">Cancel sales report</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled sr" data-id="sr" <?=(isset($privileges['reports.sales_report']) AND $privileges['reports.sales_report'] == 1) ? 'checked' : ''?> name="privileges[reports.sales_report]">Reports</label></div>
							</div>

							<div class="tab-pane has-padding" id="left-tab-addressbook">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled addressbookpermissions" data-id="addressbookpermissions" <?=(isset($privileges['view.manage_users']) AND $privileges['view.manage_users'] == 1) ? 'checked' : ''?> name="privileges[view.manage_users]"><?=$this->lang->line('group_text_21')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled addressbookpermissions" data-id="addressbookpermissions" <?=(isset($privileges['add.manage_users']) AND $privileges['add.manage_users'] == 1) ? 'checked' : ''?> name="privileges[add.manage_users]"><?=$this->lang->line('group_text_22')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled addressbookpermissions" data-id="addressbookpermissions" <?=(isset($privileges['edit.manage_users']) AND $privileges['edit.manage_users'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_users]"><?=$this->lang->line('group_text_23')?></label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled addressbookpermissions" data-id="addressbookpermissions" <?=(isset($privileges['delete.manage_users']) AND $privileges['delete.manage_users'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_users]"><?=$this->lang->line('group_text_24')?></label></div>
							</div>

							<div class="tab-pane has-padding" id="manage_residents">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled residents" data-id="residents" <?=(isset($privileges['view.manage_residents']) AND $privileges['view.manage_residents'] == 1) ? 'checked' : ''?> name="privileges[view.manage_residents]">View Residents</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled residents" data-id="residents" <?=(isset($privileges['add.manage_residents']) AND $privileges['add.manage_residents'] == 1) ? 'checked' : ''?> name="privileges[add.manage_residents]">Add Resident</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled residents" data-id="residents" <?=(isset($privileges['edit.manage_residents']) AND $privileges['edit.manage_residents'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_residents]">Edit Resident</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled residents" data-id="residents" <?=(isset($privileges['delete.manage_residents']) AND $privileges['delete.manage_residents'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_residents]">Delete Resident</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage-groups">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" <?=(isset($privileges['view.manage_groups']) AND $privileges['view.manage_groups'] == 1) ? 'checked' : ''?> name="privileges[view.manage_groups]">View Groups</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" <?=(isset($privileges['add.manage_groups']) AND $privileges['add.manage_groups'] == 1) ? 'checked' : ''?> name="privileges[add.manage_groups]">Add Group</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" <?=(isset($privileges['edit.manage_groups']) AND $privileges['edit.manage_groups'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_groups]">Edit Group</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled grouppermissions" data-id="grouppermissions" <?=(isset($privileges['delete.manage_groups']) AND $privileges['delete.manage_groups'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_groups]">Delete Group</label></div>
							</div>

							<div class="tab-pane has-padding" id="bulletin-board">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled bulletinpermissions" data-id="bulletinpermissions" <?=(isset($privileges['view.bulletin_board']) AND $privileges['view.bulletin_board'] == 1) ? 'checked' : ''?> name="privileges[view.bulletin_board]">View Bulletin Board</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled bulletinpermissions" data-id="bulletinpermissions" <?=(isset($privileges['add.bulletin_board']) AND $privileges['add.bulletin_board'] == 1) ? 'checked' : ''?> name="privileges[add.bulletin_board]">Add Bulletin Board</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled bulletinpermissions" data-id="bulletinpermissions" <?=(isset($privileges['edit.bulletin_board']) AND $privileges['edit.bulletin_board'] == 1) ? 'checked' : ''?> name="privileges[edit.bulletin_board]">Edit Bulletin Board</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled bulletinpermissions" data-id="bulletinpermissions" <?=(isset($privileges['delete.bulletin_board']) AND $privileges['delete.bulletin_board'] == 1) ? 'checked' : ''?> name="privileges[delete.bulletin_board]">Delete Bulletin Board</label></div>
							</div>

							<div class="tab-pane has-padding" id="general_settings">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled general_settings" data-id="general_settings" <?=(isset($privileges['view.general_settings']) AND $privileges['view.general_settings'] == 1) ? 'checked' : ''?> name="privileges[view.general_settings]">View General Settings</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled general_settings" data-id="general_settings" <?=(isset($privileges['edit.general_settings']) AND $privileges['edit.general_settings'] == 1) ? 'checked' : ''?>name="privileges[edit.general_settings]">Edit General Settings</label></div>
							</div>

							<div class="tab-pane has-padding" id="system_parameters">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled system_param" data-id="system_param" <?=(isset($privileges['view.system_parameters']) AND $privileges['view.system_parameters'] == 1) ? 'checked' : ''?> name="privileges[view.system_parameters]">View System Parameters</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled system_param" data-id="system_param" <?=(isset($privileges['add.system_parameters']) AND $privileges['add.system_parameters'] == 1) ? 'checked' : ''?> name="privileges[add.system_parameters]">Add System Parameter</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled system_param" data-id="system_param" <?=(isset($privileges['edit.system_parameters']) AND $privileges['edit.system_parameters'] == 1) ? 'checked' : ''?> name="privileges[edit.system_parameters]">Edit System Parameter</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled system_param" data-id="system_param" <?=(isset($privileges['delete.system_parameters']) AND $privileges['delete.system_parameters'] == 1) ? 'checked' : ''?> name="privileges[delete.system_parameters]">Delete System Parameter</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage_zones">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled zones" data-id="zones" <?=(isset($privileges['view.manage_zones']) AND $privileges['view.manage_zones'] == 1) ? 'checked' : ''?> name="privileges[view.manage_zones]">View Zones</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled zones" data-id="zones" <?=(isset($privileges['add.manage_zones']) AND $privileges['add.manage_zones'] == 1) ? 'checked' : ''?> name="privileges[add.manage_zones]">Add Zone</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled zones" data-id="zones" <?=(isset($privileges['edit.manage_zones']) AND $privileges['edit.manage_zones'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_zones]">Edit Zone</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled zones" data-id="zones" <?=(isset($privileges['delete.manage_zones']) AND $privileges['delete.manage_zones'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_zones]">Delete Zone</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage_countries">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled countries" data-id="countries" <?=(isset($privileges['view.manage_countries']) AND $privileges['view.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[view.manage_countries]">View Countries</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled countries" data-id="countries" <?=(isset($privileges['add.manage_countries']) AND $privileges['add.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[add.manage_countries]">Add Country</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled countries" data-id="countries" <?=(isset($privileges['edit.manage_countries']) AND $privileges['edit.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_countries]">Edit Country</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled countries" data-id="countries" <?=(isset($privileges['delete.manage_countries']) AND $privileges['delete.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_countries]">Delete Country</label></div>
							</div>

							<div class="tab-pane has-padding" id="manage_careers">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled careers" data-id="careers" <?=(isset($privileges['view.manage_countries']) AND $privileges['view.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[view.manage_careers]">View Careers</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled careers" data-id="careers" <?=(isset($privileges['add.manage_countries']) AND $privileges['add.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[add.manage_careers]">Add Career</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled careers" data-id="careers" <?=(isset($privileges['edit.manage_countries']) AND $privileges['edit.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[edit.manage_careers]">Edit Career</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled careers" data-id="careers" <?=(isset($privileges['delete.manage_countries']) AND $privileges['delete.manage_countries'] == 1) ? 'checked' : ''?> name="privileges[delete.manage_careers]">Delete Career</label></div>
							</div>

							<div class="tab-pane has-padding" id="cms">
								<h6 class="no-margin text-semibold"><?=$this->lang->line('group_text_08')?></h6>
								<div class="checkbox"><label><input type="checkbox" class="styled cms" data-id="cms" <?=(isset($privileges['cms.about_us']) AND $privileges['cms.about_us'] == 1) ? 'checked' : ''?> name="privileges[cms.about_us]">Edit About Us Page</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled cms" data-id="cms" <?=(isset($privileges['cms.contact_us']) AND $privileges['cms.contact_us'] == 1) ? 'checked' : ''?> name="privileges[cms.contact_us]">Edit Contact Us Page</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled cms" data-id="cms" <?=(isset($privileges['cms.how_it_works']) AND $privileges['cms.how_it_works'] == 1) ? 'checked' : ''?> name="privileges[cms.how_it_works]">Edit How it Works Page</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled cms" data-id="cms" <?=(isset($privileges['cms.terms_conditions']) AND $privileges['cms.terms_conditions'] == 1) ? 'checked' : ''?> name="privileges[cms.terms_conditions]">Edit Terms and Conditions Page</label></div>
								<div class="checkbox"><label><input type="checkbox" class="styled cms" data-id="cms" <?=(isset($privileges['cms.faq']) AND $privileges['cms.faq'] == 1) ? 'checked' : ''?> name="privileges[cms.faq]">Edit FAQ Page</label></div>
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

$('#formEditGroup').on('submit', function(e) {
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