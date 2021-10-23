<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Broker Commission</h4>
</div>
<div class="modal-body">

<?php 
if( $srDetails ) {
?>
	<form method="post" id="formApprove" action="<?=base_url('pending_sales_report/approve')?>">
	<input type="hidden" name="id" value="<?=$srDetails->id?>">
		<dl class="dl-horizontal">
			<dt><strong>Broker Name</strong></dt>
			<dd><?=$srDetails->createdBy?></dd>
			<dt><strong>Broker TL/SD</strong></dt>
			<dd><?=$srDetails->tl_sd?></dd>
			<dt><strong>Commission setup</strong></dt>
			<dd>
				<div class="input-group" style="width:55%;">
					<input type="number" required id="commission" name="commission" min="1" step=".01" class="form-control" style="background-color: #f8f8f8;" placeholder="Enter commission setup" autofocus>
					<span class="input-group-addon">%</span>
				</div>
			</dd>
		</dl>
		<center>
			<button type="submit" style="margin-top:20px;" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn btn-bg-primary btn-loading">
				<i class="icon-check position-left"></i> Approve and set commission
			</button>
		</center>
	</form>
	
<?php } else { ?>
<div class="alert alert-warning"><strong>Error! </strong> Invalid sales report data</div>
<?php } ?>

</div>


<script>
$('#formApprove').on('submit', function(e) {

	e.preventDefault();

	var formdata = $(this).serialize();
	var url = $(this).attr("action");
	var btn = $('.btn-loading');

	swal({
        title: "Approve",
        text: "Are you sure you want to approve?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, approve it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {

    	$.ajax({
			url: url,
			data: formdata,
			type: 'post',
			dataType: 'json',
			success: function(data){

				if(data.success) {
					swal({
	                    title: "Approved!",
	                    text: data.message,
	                    confirmButtonColor: "#66BB6A",
	                    type: "success"
	                }, function() {
	                	window.location.href = base_url + "pending_sales_report";
	                });
					
				} else {	
					swal({
	                    title: "Error!",
	                    text: data.message,
	                    type: "error"
	                });
				}

			}
		});
    });

	
});
</script>