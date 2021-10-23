<div class="content">

	<?php 
	if( $srDetails AND $srStatus != "") {

		if( !empty($srDetails->sr_number) ) {
			$statusLabel = " - ".$srDetails->sr_number;
		} else {
			$statusLabel = "<label class='label label-danger'>Not Encoded</label>";
		}
	?>

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				SALES REPORT DETAILS  <?=$statusLabel?>
			</h3>
		</div>
		<div class="col-md-6 ">

			<?php if( $srStatus == "pending" ) {?>
				<a href="<?=base_url('pending_sales_report')?>" class="btn btn-info pull-right"><i class="icon-history"></i> Back to Pending SR</a>
			<?php } else if( $srStatus == "approved" ) { ?>
				<a href="<?=base_url('approved_sales_report')?>" class="btn btn-info pull-right"><i class="icon-file-check"></i> Back to Approved SR</a>
			<?php } else {?>

			<?php } ?>

		</div>
	</div>
	<!-- /breadcrumb placement title -->

			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Buyer's and Project Information</h5>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Buyer's Name</label>
										<input type="text" readonly value="<?=$srDetails->buyer_name?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="buyer_name" placeholder="Enter the buyer's name" autofocus required >
									</div>
									<div class="form-group">
										<label>Telephone/Cellphone No.</label>
										<input type="text" readonly value="<?=$srDetails->tel_cell?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="tel_cell" placeholder="Enter telephone/cellphone no." required >
									</div>
									<div class="form-group">
										<label>Developer</label>
										<input type="text" readonly value="<?=$srDetails->developer?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="developer" placeholder="Enter a developer" required >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Reservation Date</label>
										<input type="text" readonly value="<?=date('F d, Y',strtotime($srDetails->reservation_date))?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="reservation_date" required >
									</div>
									<div class="form-group">
										<label>Name of Project</label>
										<input type="text" readonly value="<?=$srDetails->name_of_project?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="name_of_project" placeholder="Enter name of project" required >
									</div>
									<div class="form-group">
										<label>Financing Scheme</label>
										<input type="text" readonly value="<?=$srDetails->financing_scheme?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="financing_scheme" placeholder="Enter financing scheme" required >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Blk/Floor</label>
										<input type="text" readonly value="<?=$srDetails->blk_floor?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="blk_floor" placeholder="Enter Blk/Floor" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Lot/Unit</label>
										<input type="text" readonly value="<?=$srDetails->lot_unit?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="lot_unit" placeholder="Enter Lot/Unit" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Phase</label>
										<input type="text" readonly value="<?=$srDetails->phase?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="phase" placeholder="Enter Phase" required >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Net Total Contract Price/DAS Amount</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->net_total_contract_price, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="net_total_contract_price" placeholder="Enter Net Total Contract Price/DAS Amount" required >
										</div>
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
											<input type="text" readonly value="<?=number_format($srDetails->miscellaneous, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="miscellaneous" placeholder="Enter Miscellaneous" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Downpayment</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->downpayment, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="downpayment" placeholder="Enter downpayment" >
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
											<input type="text" readonly value="<?=number_format($srDetails->schedule_downpayment, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="schedule_downpayment" placeholder="Enter schedule of downpayment" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Monthly D/P</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->monthly_dp, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="monthly_dp" placeholder="Enter monthly D/P" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Log History</h5>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<dl class="dl-horizontal1">
										<dt>Approved By:</dt>
										<dd><?=$srDetails->approvedBy?> on <?=date("l, F d, Y h:i A", strtotime($srDetails->approvedDate))?></dd>
										<dt>Created By:</dt>
										<dd><?=$srDetails->createdBy?> on <?=date("l, F d, Y h:i A", strtotime($srDetails->createdDate))?></dd>
										<dt>Last Modified By:</dt>
										<dd>
											<?php if( $srDetails->lastModifiedDate != "" ) {?>
												<?=$srDetails->modifiedBy?> on <?=date("l, F d, Y h:i A", strtotime($srDetails->lastModifiedDate))?>
											<?php } else { ?>
												<i>has not been changed</i>
											<?php } ?>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Sales Report Number</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>SR Number</label>
								<input type="text" readonly value="<?=$srDetails->sr_number?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="address" placeholder="Enter the buyer's name">
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Buyer's Information</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Address</label>
								<input type="text" readonly value="<?=$srDetails->address?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="address" placeholder="Enter the buyer's name">
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" readonly value="<?=$srDetails->occupation?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="occupation" placeholder="Enter the buyer's occupation">
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
								<input type="text" readonly value="<?=$srDetails->location?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="location" placeholder="Enter project location">
							</div>
							<div class="form-group">
								<label>Lot Area</label>
								<input type="text" readonly value="<?=$srDetails->lot_area?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="lot_area" placeholder="Enter lot area">
							</div>
							<div class="form-group">
								<label>Floor Area</label>
								<input type="text" readonly value="<?=$srDetails->floor_area?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="floor_area" placeholder="Enter floor area">
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Sales Person and TL/SD</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Sales Person</label>
								<input type="text" readonly value="<?=$srDetails->sales_person?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="sales_person" placeholder="Enter the sales person">
							</div>
							<div class="form-group">
								<label>TL/SD</label>
								<input type="text" readonly value="<?=$srDetails->tl_sd?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="tl_sd" placeholder="Enter the TL/SD">
							</div>
						</div>
					</div>
				</div>
			</div>
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
</script>