<style type="text/css">
.rowAttachment {
	display:inline-block; 
	width: 100%; 
	margin-top: 2px;
}

.rowAttachment:hover {
	background:#EEE;
}

.uploader {
	margin-top: 10px;
	margin-left: 10px;
}

.removeAttachment {
	float:right; 
	margin-top:10px; 
	margin-right:10px;
}
</style>
<div class="content">

	<?php 
	if( $srDetails AND $srStatus != "") {
	?>

	<form enctype="multipart/form-data" action="<?=base_url('pending_sales_report/save_edit')?>" method="post" id="formEditSR">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				EDIT SALES REPORT
			</h3>
		</div>
		<div class="col-md-6 ">

			<!-- Delete SR  -->
			<?php if( ( (isset($user_privileges['delete.sales_report']) AND $user_privileges['delete.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
				<a href="javascript:;" onclick="deleteSR('<?=$srDetails->id?>')" class="btn btn-danger pull-right"><i class="icon-trash"></i> Delete</a>
			<?php } ?>
			<!-- Delete SR  -->

			<!-- Approve SR  -->
			<?php if( ( (isset($user_privileges['approve.sales_report']) AND $user_privileges['approve.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
				<a href="javascript:;" onclick="approveSR('<?=$srDetails->id?>')" class="btn btn-success pull-right" style="margin-right:10px;"><i class="icon-check"></i> Approve</a>
			<?php } ?>
			<!-- Approve SR  -->

			<?php if( $srStatus == "pending" ) {?>
				<a href="<?=base_url('pending_sales_report')?>" class="btn btn-info pull-right" style="margin-right:10px;"><i class="icon-history"></i> Back to Pending SR</a>
			<?php } else if( $srStatus == "approved" ) { ?>
				<a href="<?=base_url('approved_sales_report')?>" class="btn btn-info pull-right" style="margin-right:10px;"><i class="icon-file-check"></i> Back to Approved SR</a>
			<?php } else {?>

			<?php } ?>

			<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading pull-right" style="margin-right:10px;">
				<i class="icon-floppy-disk position-left"></i> Save Changes
			</button>

		</div>
	</div>
	<!-- /breadcrumb placement title -->

	

	<!-- Ajax sourced data -->
	
	<input type="hidden" name="id" value="<?=$srDetails->id?>">


			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Required Fields</h5>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Buyer's Name</label>
										<input type="text" value="<?=$srDetails->buyer_name?>" class="form-control" name="buyer_name" placeholder="Enter the buyer's name" autofocus required >
									</div>
									<div class="form-group">
										<label>Telephone/Cellphone No.</label>
										<input type="text" value="<?=$srDetails->tel_cell?>" class="form-control" name="tel_cell" placeholder="Enter telephone/cellphone no." required >
									</div>
									<div class="form-group">
										<label>Developer</label>
										<select data-placeholder="Select a Developer..." class="select-size-lg" name="developer" id="developer" required>
											<option value=""></option>
											<?php if( $developerList ) { foreach( $developerList as $devList ) {?>
											<option value="<?=$devList->id?>" <?=($srDetails->developer_id == $devList->id) ? "selected" : ""?>><?=$devList->developer?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Reservation Date</label>
										<input type="date" value="<?=$srDetails->reservation_date?>" class="form-control" name="reservation_date" required >
									</div>
									<div class="form-group">
										<label>Financing Scheme</label>
										<input type="text" value="<?=$srDetails->financing_scheme?>" class="form-control" name="financing_scheme" placeholder="Enter financing scheme" required >
									</div>
									<div class="form-group">
										<label>Name of Project</label>
										<select data-placeholder="Select a Project..." class="select-size-lg" name="name_of_project" id="name_of_project" required>
											<option value="" selected disabled>Select item...</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Blk/Floor</label>
										<input type="text" value="<?=$srDetails->blk_floor?>" class="form-control" name="blk_floor" placeholder="Enter Blk/Floor" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Lot/Unit</label>
										<input type="text" value="<?=$srDetails->lot_unit?>" class="form-control" name="lot_unit" placeholder="Enter Lot/Unit" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Phase</label>
										<input type="text" value="<?=$srDetails->phase?>" class="form-control" name="phase" placeholder="Enter Phase" required >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Net Total Contract Price</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->net_total_contract_price, 2)?>" class="form-control amount_field" name="net_total_contract_price" placeholder="Enter Net Total Contract Price" required >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>DAS Amount</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->das_amount,2)?>" class="form-control amount_field" name="das_amount" placeholder="Enter DAS Amount" required >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Sales Person</label>
										<input type="text" value="<?=$srDetails->sales_person?>" class="form-control" name="sales_person" placeholder="Enter the sales person" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>TL/SD</label>
										<input type="text" value="<?=$srDetails->tl_sd?>" class="form-control" name="tl_sd" placeholder="Enter TL/SD" required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Project Payments</h5>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Miscellaneous</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->miscellaneous, 2)?>" class="form-control amount_field" name="miscellaneous" placeholder="Enter Miscellaneous" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Downpayment</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->downpayment, 2)?>" class="form-control amount_field" name="downpayment" placeholder="Enter downpayment" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Schedule of Downpayment</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->schedule_downpayment, 2)?>" class="form-control amount_field" name="schedule_downpayment" placeholder="Enter schedule of downpayment" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Monthly D/P</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" value="<?=number_format($srDetails->monthly_dp, 2)?>" class="form-control amount_field" name="monthly_dp" placeholder="Enter monthly D/P" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Buyer's Information</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Address</label>
								<input type="text" value="<?=$srDetails->address?>" class="form-control" name="address" placeholder="Enter the buyer's name">
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" value="<?=$srDetails->occupation?>" class="form-control" name="occupation" placeholder="Enter the buyer's occupation">
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Project Information</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Location</label>
								<input type="text" value="<?=$srDetails->location?>" class="form-control" name="location" placeholder="Enter project location">
							</div>
							<div class="form-group">
								<label>Lot Area</label>
								<input type="text" value="<?=$srDetails->lot_area?>" class="form-control" name="lot_area" placeholder="Enter lot area">
							</div>
							<div class="form-group">
								<label>Floor Area</label>
								<input type="text" value="<?=$srDetails->floor_area?>" class="form-control" name="floor_area" placeholder="Enter floor area">
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Attachment</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="rowAttachment"><input type="file" class="file-styled-primary" id="fileAttachment" name="fileAttachment[]"><span class="removeAttachment"><a href="javascript:;" class="remove_field"><i class="icon-cross2"></i> Remove</a></span></div>
								<div id="moreAttachments"></div>
							</div>
							
							<button type="button" class="btn btn-primary btn-xs" id="btnAddRow"><i class="icon-plus2"></i> Add row</button>
							
							
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Current Attachments</h5>
						</div>
						<div class="panel-body">
							<?php 
							if( $srDetails->attachments != "" ) {
								$attachments = unserialize($srDetails->attachments);
								if( count($attachments) > 0 ) {
									echo "<table class='table table-hover table-bordered'>";
									echo "<thead><tr><th>File Name</th><th>Actions</th></tr></thead><tbody>";
									$countRow = 0;
									foreach($attachments as $attachment) {
										$attachName = explode("rcdpearlhomes", $attachment)[0];
										$ext = explode(".", $attachment)[1];
										$attachName = $attachName.".".$ext;
										$countRow++;
										echo "<tr id='".$countRow."'><td>".$attachName."</td>
										<td align='center'>
											<input type='hidden' name='currentAttachment[]' value='".$attachment."'>
											<a href='".base_url('files/sales_report/' . $attachment)."' download='".$attachName."' class='tooltip-actions' data-popup='tooltip' data-popup='tooltip-custom' title='Download' data-placement='top' data-container='body'><i class='icon-download'></i></a>&nbsp;&nbsp;
											<a href='javascript:;' onclick='removeRow(this)' class='tooltip-actions' data-popup='tooltip' data-popup='tooltip-custom' title='Remove' data-placement='top' data-container='body'><i class='icon-trash'></i></a>&nbsp;&nbsp;
										</td></tr>";
									}
									echo "</tbody></table>";
							?>
							<?php }   } ?>
							
						</div>
					</div>
				</div>
			</div>
	</form>
	<?php } else {
		echo "<div class='alert alert-warning'><strong>Error!</strong> Invalid sales report.</div>";
	} ?>
	<!-- /ajax sourced data -->

	<!-- Footer -->
	<div class="footer text-muted">
		<?=$footer_title?>
	</div>
	<!-- /footer -->

</div>

<script>

function projectLoad() {
	var developer_id = '<?=$srDetails->developer_id?>';
	var $element = $('#name_of_project').select2();
	$('#name_of_project').empty();

	var $request = $.ajax({
	  url: base_url + "pending_sales_report/getProjects/" + developer_id
	});

	$request.then(function (data) {
		for (var d = 0; d < data.length; d++) {
			var item = data[d];
			// alert(item.id);
			var option = new Option(item.text, item.id);
			$element.append(option);
		}

		$("#name_of_project").val(<?=$srDetails->project_id?>).trigger('change');
	});

	// $('#name_of_project').select2('data', {id: 9, text: 'Avida Tower Cebu'});


}

$(document).ready(function(){
	projectLoad();
});

$('#developer').on('change', function() {
	var developer_id = $(this).val();
	var $element = $('#name_of_project').select2();
	$('#name_of_project').empty();

	var $request = $.ajax({
	  url: base_url + "pending_sales_report/getProjects/" + developer_id
	});

	$request.then(function (data) {
		for (var d = 0; d < data.length; d++) {
			var item = data[d];
			var option = new Option(item.text, item.id);
			$element.append(option);
		}
	});
	$('#name_of_project').val(null).trigger('change');
});

$('#btnAddRow').on('click', function() {
	var html = '<div class="rowAttachment"><input type="file" class="file-styled-primary" id="fileAttachment" name="fileAttachment[]"><span class="removeAttachment"><a href="javascript:;"><i class="icon-cross2"></i> Remove</a></span></div>';
	$('#moreAttachments').append(html);

	$(".file-styled-primary").uniform({
		fileButtonClass: 'action btn bg-green'
	});

	$('.removeAttachment').on('click', function() {
		$(this).parent(this).remove();
	});
});

function removeRow(t) {
	$(t).closest("tr").remove();
}

$(".file-styled-primary").uniform({
	fileButtonClass: 'action btn bg-green'
});

function approveSR(id) {
	$.ajax({
		url: base_url + 'pending_sales_report/setPercentage/' + id,
		success: function( data ) {
			$('#modalPageStandard .modal-content').html(data);
			$('#modalPageStandard').modal({
				backdrop: 'static',
				keyboard: false
			});
		}
	});
}

function deleteSR(id) {
	swal({
        title: "Delete",
        text: "Are you sure you want to delete?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + 'pending_sales_report/delete_sr/' + id,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					window.location.href = base_url + "pending_sales_report";
				}
				swal({
                    title: "Deleted!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
    
}

$(".styled").uniform();

$('#formEditSR').on('submit', function(e) {
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
				setTimeout(function(){ window.location.reload() }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	
</script>