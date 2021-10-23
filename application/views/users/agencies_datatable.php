<table class="table datatable-designation">
	<thead>
		<tr>
            <th></th>
            <th>AGENCY NAME</th>
            <th>EMAIL ADDRESS</th>
            <th>PHONE NUMBER</th>
            <th>CITY</th>
            <th>DATE REGISTERED</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($user_list){
		foreach($user_list as $gl){ 
			$agency_photo = ($gl->photo != "") ? $gl->photo : "default.jpg";
		?>
		<tr>
			<td style="width:5%;"><div class="ratio img-responsive img-circle" style="background-image: url('<?=MAIN_BASE_URL. 'files/images/agencies/photo/' . $agency_photo?>');"></div></td>
			<td><?=$gl->agency_name?></td>
			<td><?=($gl->email_address != "") ? $gl->email_address : "-"?></td>
			<td><?=$gl->phone_number?></td>
			<td><?=$gl->state?></td>
			<td><?=date("Y-m-d", $gl->date_registered)?></td>
			<td><div class="badge badge-<?=($gl->nStatus == 1) ? "success" : "danger"?>"><?=($gl->nStatus == 1) ? "Enable" : "Diable"?></div></td>
			<td>
				<?php 
				if( $gl->nStatus == 1 ) {
					if( (isset($user_privileges['disable.agency']) AND $user_privileges['disable.agency'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
						echo '&nbsp;<i class="icon-cancel-circle2 tooltip-actions" data-popup="tooltip" title="Disable"  onClick=\'disableUsers("'.$gl->id.'", "users", "agency")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Disable" data-placement="top" data-container="body"></i>';
					}
				} else {
					if( (isset($user_privileges['enable.agency']) AND $user_privileges['enable.agency'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
						echo '&nbsp;<i class="icon-check tooltip-actions" data-popup="tooltip" title="Enable"  onClick=\'enableUsers("'.$gl->id.'", "users", "agency")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Enable" data-placement="top" data-container="body"></i>';
					}
				}

				if( (isset($user_privileges['edit.agency']) AND $user_privileges['edit.agency'] == 1) OR $user_privileges == 'FULL-ACCESS' ) { ?>
					&nbsp;<i class="icon-pencil3 tooltip-actions" onClick="location.href='<?=base_url('users/edit_agency/' . $gl->id)?>'" style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;
				 <?php }
				
				if( (isset($user_privileges['delete.agency']) AND $user_privileges['delete.agency'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
					echo '&nbsp;<i class="icon-trash tooltip-actions" data-popup="tooltip" title="Delete"  onClick=\'deleteUsers("'.$gl->id.'", "users", "agency")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>';
				}
				
				
				?>
			</td>
		</tr>
		<?php } }?>
	</tbody>
</table>
<script>
// $('.datatable-designation').dataTable();

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

// Custom button
$('.datatable-designation').dataTable({
	"aaSorting": [],
	"order": [],
    buttons: [
    	{
            text: '<i class="icon-spinner11"></i>',
            className: 'btn bg-slate-800 marginright',
            action: function(e, dt, node, config) {
            	datatable();
            }
        }
    ]
});


$('[data-popup=tooltip]').tooltip({
	template: '<div class="tooltip"><div class="bg-slate-800"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
});
</script>