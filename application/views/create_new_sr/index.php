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

	<form enctype="multipart/form-data" action="<?=base_url('create_new_sr/add')?>" method="post" id="formNewSR">

	<!-- Breadcrumb placement title -->
	<div class="row">	
		<div class="col-md-6">
			<h3 class="content-group text-semibold">
				CREATE NEW SALES REPORT
			</h3>
		</div>
		<div class="col-md-6">
			<button type="submit" name="btnsubmit" id="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading pull-right" style="margin-top:15px;">
				<i class="icon-floppy-disk position-left"></i> SAVE SALES REPORT
			</button>
		</div>
	</div>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	
	<input type="hidden" name="designation_id">

			<div id="errorMsg"></div>

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
										<input type="text" class="form-control" name="buyer_name" placeholder="Enter the buyer's name" autofocus required >
									</div>
									<div class="form-group">
										<label>Telephone/Cellphone No.</label>
										<input type="text" class="form-control" name="tel_cell" placeholder="Enter telephone/cellphone no." required >
									</div>
									<div class="form-group">
										<label>Developer</label>
										<select data-placeholder="Select a Developer..." class="select-size-lg" name="developer" id="developer" required>
											<option value=""></option>
											<?php if( $developerList ) { foreach( $developerList as $devList ) {?>
											<option value="<?=$devList->id?>"><?=$devList->developer?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Reservation Date</label>
										<input type="date" class="form-control" name="reservation_date" required >
									</div>
									<div class="form-group">
										<label>Financing Scheme</label>
										<input type="text" class="form-control" name="financing_scheme" placeholder="Enter financing scheme" required >
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
										<input type="text" class="form-control" name="blk_floor" placeholder="Enter Blk/Floor" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Lot/Unit</label>
										<input type="text" class="form-control" name="lot_unit" placeholder="Enter Lot/Unit" required >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Phase</label>
										<input type="text" class="form-control" name="phase" placeholder="Enter Phase" required >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Net Total Contract Price</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" class="form-control amount_field" name="net_total_contract_price" placeholder="Enter Net Total Contract Price" required >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>DAS Amount</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" class="form-control amount_field" name="das_amount" placeholder="Enter DAS Amount" required >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Sales Person</label>
										<input type="text" class="form-control" name="sales_person" placeholder="Enter the sales person" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>TL/SD</label>
										<input type="text" class="form-control" name="tl_sd" placeholder="Enter TL/SD" value="<?=$userDetails->tl_sd?>" required>
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
											<input type="text" class="form-control amount_field" name="miscellaneous" placeholder="Enter Miscellaneous" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Downpayment</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" class="form-control amount_field" name="downpayment" placeholder="Enter downpayment" >
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
											<input type="text" class="form-control amount_field" name="schedule_downpayment" placeholder="Enter schedule of downpayment" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Monthly D/P</label>
										<div class="input-group">
											<span class="input-group-addon">&#8369;</span>
											<input type="text" class="form-control amount_field" name="monthly_dp" placeholder="Enter monthly D/P" >
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
								<input type="text" class="form-control" name="address" placeholder="Enter the buyer's name">
							</div>
							<div class="form-group">
								<label>Occupation</label>
								<input type="text" class="form-control" name="occupation" placeholder="Enter the buyer's occupation">
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
								<input type="text" class="form-control" name="location" placeholder="Enter project location">
							</div>
							<div class="form-group">
								<label>Lot Area</label>
								<input type="text" class="form-control" name="lot_area" placeholder="Enter lot area">
							</div>
							<div class="form-group">
								<label>Floor Area</label>
								<input type="text" class="form-control" name="floor_area" placeholder="Enter floor area">
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

$("#formNewSR :input").change(function() {
	var formdata = $('#formNewSR').serialize();
	$.ajax({
		url: base_url + "create_new_sr/validateBuyer",
		data: formdata,
		type: 'POST',
		dataType: 'JSON',
		success: function(data) {
			if( data.success ) {
				$('#btnsubmit').hide();
				$('#errorMsg').html("<div class='alert alert-danger'><i class='icon-exclamation'></i> "+data.longmessage+"</div>");
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
			} else {
				$('#btnsubmit').show();
				$('#errorMsg').html("");
			}
		}
	});
});

$('#developer').on('change', function() {
	var developer_id = $(this).val();

	var $element = $('#name_of_project').select2();

	$('#name_of_project').empty();

	var $request = $.ajax({
	  url: base_url + "create_new_sr/getProjects/" + developer_id
	});

	$request.then(function (data) {

		// console.log(data);
		// var option = new Option("", "", true, true);

		for (var d = 0; d < data.length; d++) {
			var item = data[d];

			var option = new Option(item.text, item.id);

			$element.append(option);
		}

		// $element.trigger('change');	
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

$(".styled").uniform();

$('#formNewSR').on('submit', function(e) {
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