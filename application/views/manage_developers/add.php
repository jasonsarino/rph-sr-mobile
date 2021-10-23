<div class="content">

<form class="form-horizontal" action="<?=base_url('manage_developers/add')?>" method="post" id="formAddDeveloper">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				ADD NEW DEVELOPER
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
				<label class="control-label col-lg-2">Developer Name</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="developer" placeholder="Enter Developer Name" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<h4>Projects List</h4>
					<table class="table table-hover table-bordered table-condensed" id="tbl-projects">
						<thead>
							<tr class="bg-success">
								<th>Project Name</th>
								<th style="width:5%;">Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" class="form-control" name="project_name[]" placeholder="Enter Project Name" required></td>
								<td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="deleteRow(this)"><i class="icon-trash"></i></a></td>
							</tr>	
						</tbody>
					</table>
					<a href="javascript:;" onclick="addRow()" class="btn btn-xs btn-danger" style="margin-top:10px;"><i class="icon-plus2"></i> Add Row</a>
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

var rowCount = 1;

function addRow() {

	rowCount++;

	var table = document.getElementById("tbl-projects");
	var row = table.insertRow(-1);

	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);

	cell1.innerHTML = "<input type='text' class='form-control' name='project_name[]' placeholder='Enter Project Name' required>";
	cell2.innerHTML = "<a href='javascript:;' class='btn btn-danger btn-xs' onclick='deleteRow(this)'><i class='icon-trash'></i></a>";

}

function deleteRow(r) {
	if( rowCount == 1 ) {
		swal({
            title: "Error!",
            text: "You must enter atleast 1 project.",
            confirmButtonColor: "#66BB6A",
            type: "error"
        });
	} else {
		rowCount--;
		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("tbl-projects").deleteRow(i);
	}
	
}

$('#formAddDeveloper').on('submit', function(e) {
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
				setTimeout(function(){ window.location = base_url + 'manage_developers'; }, 2000);
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