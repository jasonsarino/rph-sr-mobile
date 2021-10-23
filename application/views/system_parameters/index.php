<div class="content">

	<!-- Breadcrumb placement title -->
	<h6 class="content-group text-semibold">
		System Parameters
	</h6>
	<!-- /breadcrumb placement title -->

	<div id="project-error-msg"></div>

	<!-- Ajax sourced data -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">System Parameters</h5>
		</div>
		<div class="panel-body">

			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="#partner-project-fields" data-toggle="tab">Partner Project Fields</a></li>
					<li><a href="#partner-types" data-toggle="tab">Partner Types</a></li>
					<li><a href="#partner-skills" data-toggle="tab">Partner Skills</a></li>
					<li><a href="#manage-cities" data-toggle="tab">Manage Cities</a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="partner-project-fields">
						<div id="project_fields_dt"></div>
					</div>

					<div class="tab-pane" id="partner-types">
						<div id="partner_types_dt"></div>
					</div>

					<div class="tab-pane" id="partner-skills">
						<div id="partner_skills_dt"></div>
					</div>

					<div class="tab-pane" id="manage-cities">
						<div id="manage_cities_dt"></div>
					</div>

				</div>
			</div>

		</div>

		

	</div>
	<!-- /ajax sourced data -->

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<div id="addParam" class="modal fade" tabindex="-1">
	<form action="<?=base_url('system_parameters/save_param')?>" method="post" id="formAddParam">
	<input type="hidden" name="tableType" id="tableType">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"></h5>
			</div>

			<div class="modal-body">
				<br /><br />
				<div id="param-error"></div>
				<div style="width:70%; margin: auto;">
					<div class="form-group">
						<label id="lblParamEnglish"></label>
						<input type="text" class="form-control" name="param_english" placeholder="Type here..." required>
					</div>
					<div class="form-group">
						<label id="lblParamArabic"></label>
						<input type="text" class="form-control" name="param_arabic" placeholder="Type here..." required>
					</div>
				</div>
				<br /><br />
				

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-bg-primary" id="btnsave">Save</button>
			</div>
		</div>
	</div>
	</form>
</div>

<div id="editParam" class="modal fade" tabindex="-1">
	<form action="<?=base_url('system_parameters/edit_param')?>" method="post" id="formEditParam">
	<input type="hidden" name="tableType" id="tableType">
	<input type="hidden" name="id" id="tableID">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"></h5>
			</div>

			<div class="modal-body">
				<br /><br />
				<div id="param-error"></div>
				<div style="width:70%; margin: auto;">
					<div class="form-group">
						<label id="lblParamEnglish"></label>
						<input type="text" class="form-control" name="param_english" id="param_english" placeholder="Type here..." required>
					</div>
					<div class="form-group">
						<label id="lblParamArabic"></label>
						<input type="text" class="form-control" name="param_arabic" id="param_arabic" placeholder="Type here..." required>
					</div>
				</div>
				<br /><br />
				

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-bg-primary" id="btnsave">Save</button>
			</div>
		</div>
	</div>
	</form>
</div>




<script>
$(document).ready(function() {
	loadProjectFields();

	loadPartnerTypes();

	loadPartnerSkills();

	loadCities();
});

function loadProjectFields() {
	$.ajax({
		url: base_url + 'system_parameters/project_fields_datatable',
		success: function(data) {	
			$('#project_fields_dt').html(data);
		}, beforeSend: function() {
			$('#project_fields_dt').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}

function loadPartnerTypes() {
	$.ajax({
		url: base_url + 'system_parameters/partner_types_datatable',
		success: function(data) {	
			$('#partner_types_dt').html(data);
		}, beforeSend: function() {
			$('#partner_types_dt').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}

function loadPartnerSkills() {
	$.ajax({
		url: base_url + 'system_parameters/partner_skills_datatable',
		success: function(data) {	
			$('#partner_skills_dt').html(data);
		}, beforeSend: function() {
			$('#partner_skills_dt').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}

function loadCities() {
	$.ajax({
		url: base_url + 'system_parameters/cities_datatable',
		success: function(data) {	
			$('#manage_cities_dt').html(data);
		}, beforeSend: function() {
			$('#manage_cities_dt').html("<center><br /><img src='" + base_url + "assets/images/loading.gif' style='height:80px;'><br /><?=$this->lang->line('common_text_03')?></center><br /><br />");
		}
	});
}



function editParam(id, table) {

	$.ajax({
		url: base_url + 'system_parameters/get_param_details/' + id + '/' + table,
		dataType: 'json',
		success: function(data) {	
			// console.log(data);
			if( table == 'project_field' ) 
			{
				$('#editParam .modal-title').text("Edit Partner Project Field");
				$('#editParam #lblParamEnglish').text("Project Field in English");
				$('#editParam #lblParamArabic').text("Project Field in Arabic");
			} 
			else if( table == 'partner_type' ) 
			{
				$('#editParam .modal-title').text("Edit Partner Type");
				$('#editParam #lblParamEnglish').text("Partner Type in English");
				$('#editParam #lblParamArabic').text("Partner Type in Arabic");
			} 
			else if( table == 'partner_skills' ) 
			{
				$('#editParam .modal-title').text("Edit Partner Skill");
				$('#editParam #lblParamEnglish').text("Skill in English");
				$('#editParam #lblParamArabic').text("Skill in Arabic");
			}
			else if( table == 'cities' ) 
			{
				$('#editParam .modal-title').text("Edit City");
				$('#editParam #lblParamEnglish').text("City in English");
				$('#editParam #lblParamArabic').text("City in Arabic");
			}

			$('#editParam #tableType').val(table);
			$('#editParam #tableID').val(data.param_id);
			$('#editParam #param_english').val(data.param_english);
			$('#editParam #param_arabic').val(data.param_arabic);
			$('#editParam').modal('show');
		}
	});

} 

function addParam(table) {

	if( table == 'project_field' ) 
	{
		$('#addParam .modal-title').text("Add New Partner Project Field");
		$('#addParam #lblParamEnglish').text("Project Field in English");
		$('#addParam #lblParamArabic').text("Project Field in Arabic");
	} 
	else if( table == 'partner_type' ) 
	{
		$('#addParam .modal-title').text("Add New Partner Type");
		$('#addParam #lblParamEnglish').text("Partner Type in English");
		$('#addParam #lblParamArabic').text("Partner Type in Arabic");
	} 
	else if( table == 'partner_skills' ) 
	{
		$('#addParam .modal-title').text("Add New Partner Skill");
		$('#addParam #lblParamEnglish').text("Skill in English");
		$('#addParam #lblParamArabic').text("Skill in Arabic");
	}

	$('#addParam #tableType').val(table);
	$('#addParam').modal('show');
}


$('#formAddParam').on('submit', function(e) {
	e.preventDefault();
	var formdata = $(this).serialize();
	var url = $(this).attr('action');
	$.ajax({
		url: url,
		dataType: 'json',
		type: 'post',
		data: formdata,
		success: function(data) {
			$('#addParam #btnsave').text('Save');
			$('#addParam #btnsave').removeAttr('disabled', false);

			if( data.success ) {
				loadProjectFields();
				loadPartnerTypes();
				loadPartnerSkills();

				$('#addParam .modal-title').text("");
				$('#addParam #lblParamEnglish').text("");
				$('#addParam #lblParamArabic').text("");
				$('#addParam #tableType').val("");
				$('#addParam').modal('hide');

				$("#formAddParam")[0].reset();

			} else {
				$('#param-error').html("<div class='alert alert-danger'>" + data.message + "</div>");
			}

		}, beforeSend: function() {
			$('#addParam #btnsave').text('Saving...');
			$('#addParam #btnsave').attr('disabled', true);
		}
	});
});



$('#formEditParam').on('submit', function(e) {
	e.preventDefault();
	var formdata = $(this).serialize();
	var url = $(this).attr('action');
	$.ajax({
		url: url,
		dataType: 'json',
		type: 'post',
		data: formdata,
		success: function(data) {
			console.log(data);
			$('#editParam #btnsave').text('Save');
			$('#editParam #btnsave').removeAttr('disabled', false);

			if( data.success ) {
				loadProjectFields();
				loadPartnerTypes();
				loadPartnerSkills();
				loadCities();

				$('#editParam .modal-title').text("");
				$('#editParam #lblParamEnglish').text("");
				$('#editParam #lblParamArabic').text("");
				$('#editParam #tableType').val("");
				$('#editParam').modal('hide');

				$("#formEditParam")[0].reset();

			} else {
				$('#param-error').html("<div class='alert alert-danger'>" + data.message + "</div>");
			}

		}, beforeSend: function() {
			$('#editParam #btnsave').text('Saving...');
			$('#editParam #btnsave').attr('disabled', true);
		}
	});
});


function deleteParam(id, table) {
	if( confirm('Are you sure you want to delete?') ) {
		$.ajax({
			url: base_url + "system_parameters/delete_parameters/" + id + "/" + table,
			dataType: "json",
			success: function(data) {
				if( data.success ) {
					loadProjectFields();
					loadPartnerTypes();
					loadPartnerSkills();
					loadCities();
				} else {
					alert(data.message);
				}
			}
		});
	}
}
</script>