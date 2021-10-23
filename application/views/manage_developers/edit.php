<div class="content">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				EDIT DEVELOPER
			</h3>
		</div>
		<div class="col-md-6">
			<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading pull-right">
				<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
			</button>
		</div>
	</div>
	<!-- /breadcrumb placement title -->
		<?php 
	if( $developerDetails) {
	?>
	<form class="form-horizontal" action="<?=base_url('manage_developers/edit')?>" method="post" id="formEditDeveloper">
	<input type="hidden" name="id" value="<?=$developerDetails->id?>">
	<div class="panel panel-success panel-bordered company_row">
		<div class="panel-heading">
			<h5 class="panel-title">Required Fields</h5>
		</div>
		<div class="panel-body">
			

			<div class="form-group">
				<label class="control-label col-lg-2">Developer Name</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="developer" value="<?=$developerDetails->developer?>" placeholder="Enter Developer Name" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<h4>Projects List</h4>
					<table class="table table-hover table-bordered table-condensed" id="tbl-projects">
						<thead>
							<tr>
								<th>Project Name</th>
								<th style="width:5%;"></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( $projectList ) {
								foreach($projectList as $pl) {
							?>
							<tr>
								<td><input type="hidden" name="projID[]" value="<?=$pl->id?>"><input type="text" class="form-control" name="project_name[]" value="<?=$pl->project_name?>" placeholder="Enter Project Name" required></td>
								<td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="deleteRow(this)"><i class="icon-cross2"></i> </a></td>
							</tr>	
							<?php } } else { ?>
							<tr>
								<td><input type="text" class="form-control" name="project_name[]" placeholder="Enter Project Name" required></td>
								<td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="deleteRow(this)"><i class="icon-trash"></i></a></td>
							</tr>	
							<?php  } ?>
						</tbody>
					</table>
					<a href="javascript:;" onclick="addRow()" class="btn btn-xs btn-danger" style="margin-top:10px;"><i class="icon-plus2"></i> Add Row</a>
				</div>
			</div>

		</div>
	</div>

	<!-- Ajax sourced data -->


	</form>
	<?php } else {
		echo "<div class='alert alert-warning'><strong>Error!</strong> Invalid developer.</div>";
	} ?>
	<!-- /ajax sourced data -->

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>
<?php 
if( $projectList ) {
	$countProj = count($projectList);
} else {
	$countProj = 0;
}
?>
<script>

var rowCount = '<?=$countProj?>';

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

$('#formEditDeveloper').on('submit', function(e) {
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


</script>