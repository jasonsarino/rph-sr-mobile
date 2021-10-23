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

			<!-- Edit SR  -->
			<?php if( ( (isset($user_privileges['edit.sales_report']) AND $user_privileges['edit.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
				<a href="<?=base_url('pending_sales_report/edit/' . $srDetails->id . '/' . $srStatus)?>"  class="btn btn-warning pull-right" style="margin-right:10px;"><i class="icon-pencil3"></i> Edit</a>
			<?php } ?>
			<!-- Edit SR  -->

			<!-- Delete SR  -->
			<?php if( ( (isset($user_privileges['delete.sales_report']) AND $user_privileges['delete.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
				<a href="javascript:;" onclick="deleteSR('<?=$srDetails->id?>')" class="btn btn-danger pull-right" style="margin-right:10px;"><i class="icon-trash"></i> Delete</a>
			<?php } ?>
			<!-- Delete SR  -->

			<!-- Approve SR  -->
			<?php if( ( (isset($user_privileges['approve.sales_report']) AND $user_privileges['approve.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
				<a href="javascript:;" onclick="approveSR('<?=$srDetails->id?>')" class="btn btn-success pull-right" style="margin-right:10px;"><i class="icon-check"></i> Approve</a>
			<?php } ?>
			<!-- Approve SR  -->

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
										<label>Financing Scheme</label>
										<input type="text" readonly value="<?=$srDetails->financing_scheme?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="financing_scheme" placeholder="Enter financing scheme" required >
									</div>
									<div class="form-group">
										<label>Name of Project</label>
										<input type="text" readonly value="<?=$srDetails->name_of_project?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="name_of_project" placeholder="Enter name of project" required >
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
								<div class="col-md-6">
									<div class="form-group">
										<label>Net Total Contract Price</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->net_total_contract_price, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="net_total_contract_price" placeholder="Enter Net Total Contract Price/DAS Amount" required >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>DAS Amount</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->das_amount, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="net_total_contract_price" placeholder="Enter Net Total Contract Price/DAS Amount" required >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Sales Person</label>
										<input type="text" readonly value="<?=$srDetails->sales_person?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="sales_person" placeholder="Enter the sales person">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>TL/SD</label>
										<input type="text" readonly value="<?=$srDetails->tl_sd?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="sales_person" placeholder="Enter the sales person">
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
											<input type="text" readonly value="<?=number_format($srDetails->miscellaneous, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="miscellaneous"  >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Downpayment</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->downpayment, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="downpayment" >
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
											<input type="text" readonly value="<?=number_format($srDetails->schedule_downpayment, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="schedule_downpayment" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Monthly D/P</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" readonly value="<?=number_format($srDetails->monthly_dp, 2)?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="monthly_dp" >
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
							<h5 class="panel-title">Buyer's Information</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Address</label>
								<input type="text" readonly value="<?=$srDetails->address?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="address" placeholder="-">
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" readonly value="<?=$srDetails->occupation?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="occupation" placeholder="-">
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
								<input type="text" readonly value="<?=$srDetails->location?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="location" placeholder="-">
							</div>
							<div class="form-group">
								<label>Lot Area</label>
								<input type="text" readonly value="<?=$srDetails->lot_area?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="lot_area" placeholder="-">
							</div>
							<div class="form-group">
								<label>Floor Area</label>
								<input type="text" readonly value="<?=$srDetails->floor_area?>" style="background-color:#f0f0f0; padding-left:15px;" class="form-control" name="floor_area" placeholder="-">
							</div>
						</div>
					</div>
					<div class="panel panel-success panel-bordered company_row">
						<div class="panel-heading">
							<h5 class="panel-title">Attachments</h5>
						</div>
						<div class="panel-body">
							<?php 
							if( $srDetails->attachments != "" ) {
								$attachments = unserialize($srDetails->attachments);
								if( count($attachments) > 0 ) {
									echo "<table class='table table-hover table-bordered'>";
									echo "<thead><tr><th>File Name</th><th>Download</th></tr></thead><tbody>";
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
										</td></tr>";
									}
									echo "</tbody></table>";
							?>
							<?php }   } else { echo "No attachment found."; }?>
							
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