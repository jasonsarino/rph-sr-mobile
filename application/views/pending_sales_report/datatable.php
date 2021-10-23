<table class="table datatable-designation table-striped table-hover">
	<thead>
		<tr class="bg-success">
            <th>BUYER NAME</th>
            <th>RESERVATION DATE</th>
            <th>FINANCING SCHEME</th>
            <th>PROJECT DETAILS</th>
            <th >TCP</th>
            <th>ACTIONS</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($pendingSRList){
			$count = 0;
		foreach($pendingSRList as $gl){ 
			$count++;
			$bg = ( $count % 2 == 0 ) ? "success" : "";
		?>
		<tr class="<?= $bg?>">
			<td onclick="viewData(<?=$gl->id?>, 'pending')" style="cursor:pointer;"><?=$gl->buyer_name?></td>
			<td onclick="viewData(<?=$gl->id?>, 'pending')" style="cursor:pointer;"><?=date("M d, Y", strtotime($gl->reservation_date))?></td>
			<td onclick="viewData(<?=$gl->id?>, 'pending')" style="cursor:pointer;"><?=$gl->financing_scheme?></td>
			<td onclick="viewData(<?=$gl->id?>, 'pending')" style="cursor:pointer;">
				Name of Project: <strong><?=$gl->name_of_project?></strong><br />
				Phase: <strong><?=$gl->phase?></strong>
				Blk: <strong><?=$gl->blk_floor?> </strong>
				Lot: <strong><?=$gl->lot_unit?></strong><br />
				<?php if($gl->lot_area != "") {?>Lot Area: <strong><?=$gl->lot_area?></strong><?php } ?>
				<?php if($gl->floor_area != "") {?>Floor Area: <strong><?=$gl->floor_area?></strong><?php } ?>
			</td>
			<td style="text-align:right;" onclick="viewData(<?=$gl->id?>, 'pending')" style="cursor:pointer;">&#8369; <?=number_format($gl->net_total_contract_price, 2)?></td>
			<td>
				<?php 

				if( (isset($user_privileges['edit.sales_report']) AND $user_privileges['edit.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
					echo '<a href="'.base_url('pending_sales_report/edit/' . $gl->id . '/pending').'"><i class="icon-pencil3 tooltip-actions" data-popup="tooltip" title="Edit" style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i></a>&nbsp;';
				}
				if( (isset($user_privileges['delete.sales_report']) AND $user_privileges['delete.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
					echo '&nbsp;<i class="icon-trash tooltip-actions" data-popup="tooltip" title="Delete"  onClick=\'deleteSR("'.$gl->id.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>';
				}

				if( (isset($user_privileges['view_pending.sales_report']) AND $user_privileges['view_pending.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
					echo '&nbsp;<i class="icon-eye tooltip-actions" data-popup="tooltip" title="View" onClick=\'viewData("'.$gl->id.'", "pending")\' style="cursor:pointer;" data-popup="tooltip-custom" title="View" data-placement="top" data-container="body"></i>';
				}

				if($userDetails->privileges == "FULL-ACCESS") {
					echo '&nbsp;<i class="icon-check tooltip-actions" data-popup="tooltip" title="Approve" onClick=\'approveSR("'.$gl->id.'", "pending")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Approve" data-placement="top" data-container="body"></i>';
				}
				
				?>
			</td>
		</tr>
		<?php } }?>
	</tbody>
</table>
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


function viewData(id, srStatus) {
	window.location.href = "<?=base_url('pending_sales_report/view/')?>" + id + "/" + srStatus;
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
					datatable();
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

var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
elems.forEach(function(html) {
    var switchery = new Switchery(html);
});

$.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
    }
});

<?php 
$hideClassName = ( (isset($user_privileges['add.sales_report']) AND $user_privileges['add.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ? '' : 'hide';
?>

// Custom button
$('.datatable-designation').dataTable({
	"aaSorting": [],
	"order": [],
    buttons: [
    	{
            text: '<i class="icon-spinner11"></i>',
            className: 'btn btn-bg-primary marginright',
            action: function(e, dt, node, config) {
            	datatable();
            }
        },
        {
            text: '<i class="icon-plus3"></i> Create New SR',
            className: 'btn btn-bg-primary marginleft <?=$hideClassName?>',
            action: function(e, dt, node, config) {
            	location.href=base_url+'create_new_sr';
            }
        }
    ]
});


$('[data-popup=tooltip]').tooltip({
	template: '<div class="tooltip"><div class="btn-bg-primary"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
});
</script>