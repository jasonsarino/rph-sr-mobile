<table class="table datatable-designation">
	<thead>
		<tr>
            <th></th>
            <th>NAME</th>
            <th>EMAIL ADDRESS</th>
            <th>PHONE NUMBER</th>
            <th>COUNTRY</th>
            <th>RELIGION</th>
            <th>NATIONALITY</th>
            <th>STATUS</th>
            <th>HIDE/SHOW</th>
            <th>ACTIONS</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($user_list){
		foreach($user_list as $gl){ 
			$jobseeker_photo = ($gl->photo != "") ? $gl->photo : "blank_".strtolower($gl->gender).".jpg";
		?>
		<tr>
			<td style="width:5%;"><div class="ratio img-responsive img-circle" style="background-image: url('<?=MAIN_BASE_URL. 'files/images/jobseeker/photo/' . $jobseeker_photo?>');"></div></td>
			<td><?=$gl->firstname. ' '. $gl->lastname?></td>
			<td><?=($gl->email_address != "") ? $gl->email_address : "-"?></td>
			<td><?=($gl->phone_number != "") ? $gl->phone_number : "-"?></td>
			<td><?=$gl->country_name?></td>
			<td><?=$gl->religion?></td>
			<td><?=$gl->nationality?></td>
			<td>
			<?php 
			if( $gl->nStatus == 0 OR $gl->nStatus == 1 ) { ?>
				<div class="badge badge-<?=($gl->nStatus == 1) ? "success" : "danger"?>"><?=($gl->nStatus == 1) ? "ENABLE" : "DISABLE"?></div>
			<?php } else if( $gl->nStatus == 2 ) { ?>
				<div class="badge badge-info">PENDING COMPLETE REGISTRATION</div>
			<?php } else if( $gl->nStatus == 4 ) {
			?>
				<div class="badge badge-info">PENDING ACTIVATION</div>
			<?php }?>
			</td>
			<td>
				<select name="show_hide" id="show_hide" class="form-control" onchange="show_hide(this.value, '<?=$gl->id?>')">
					<option value="1" <?=( $gl->hide_show == 1 ) ? "selected" : "" ?> >SHOW</option>
					<option value="0" <?=( $gl->hide_show == 0 ) ? "selected" : "" ?>>HIDE</option>
				</select>
			</td>
			<td>
				<?php 
				if( $gl->nStatus == 1 OR $gl->nStatus == 0 ) {
					if( $gl->nStatus == 1 ) {
						if( (isset($user_privileges['disable.jobseeker']) AND $user_privileges['disable.jobseeker'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
							echo '&nbsp;<i class="icon-cancel-circle2 tooltip-actions" data-popup="tooltip" title="Disable"  onClick=\'disableUsers("'.$gl->id.'", "users", "jobseeker")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Disable" data-placement="top" data-container="body"></i>';
						}
					} else {
						if( (isset($user_privileges['enable.jobseeker']) AND $user_privileges['enable.jobseeker'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
							echo '&nbsp;<i class="icon-check tooltip-actions" data-popup="tooltip" title="Enable"  onClick=\'enableUsers("'.$gl->id.'", "users", "jobseeker")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Enable" data-placement="top" data-container="body"></i>';
						}
					}


				} 


				
				if( $gl->nStatus == 0 OR $gl->nStatus == 1 ) {
				if( (isset($user_privileges['edit.jobseeker']) AND $user_privileges['edit.jobseeker'] == 1) OR $user_privileges == 'FULL-ACCESS' ) { ?>
					&nbsp;<i class="icon-pencil3 tooltip-actions" onClick="location.href='<?=base_url('users/edit_jobseeker/' . $gl->id)?>'" style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;
				 <?php } }
				
				if( (isset($user_privileges['delete.jobseeker']) AND $user_privileges['delete.jobseeker'] == 1) OR $user_privileges == 'FULL-ACCESS' ){
					echo '&nbsp;<i class="icon-trash tooltip-actions" data-popup="tooltip" title="Delete"  onClick=\'deleteUsers("'.$gl->id.'", "users", "jobseeker")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>';
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

function show_hide( nStatus, id ) {
	
	if( nStatus == 1 ) {
		stats = "Show";
	} else {
		stats = "Hide";
	}

	swal({
        title: stats + " jobseeker?",
        text: "Are you sure you wanto " + stats + " jobseeker",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, " + stats + " it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + 'users/show_hide/' + id + "/" + nStatus,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
                    title: "Success!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
}
</script>