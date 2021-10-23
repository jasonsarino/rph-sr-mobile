<table class="table datatable-designation">
	<thead>
		<tr class="bg-success">
            <th></th>
            <th>NAME</th>
            <th>EMAIL ADDRESS</th>
            <th>MOBILE NUMBER</th>
            <th>USER GROUP</th>
            <th>Actions</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($user_list){
			$count = 0;
		foreach($user_list as $gl){ 
			$profile_avatar = ($gl->profile_picture) ? $gl->profile_picture : 'default_avatar.jpg';
			$count++;
			$bg = ( $count % 2 == 0 ) ? "success" : "";
		?>
		<tr class="<?= $bg?>">
			<td style="width:4%;"><div class="ratio img-responsive img-circle" style="background-image: url('<?=base_url("assets/images/users/" .$profile_avatar)?>');"></div></td>
			<td><?=$gl->firstname. ' '. $gl->lastname?></td>
			<td><?=$gl->email?></td>
			<td><?=$gl->phone?></td>
			<td><?=$gl->group_name?></td>
			<td>
				<?php 
				if($gl->isAdmin) {
					echo "<code><i>(default)</i></code>";
				} else 
				{
					if( (isset($user_privileges['edit.' . $moduleName]) AND $user_privileges['edit.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ){
						echo '<i class="icon-pencil3 tooltip-actions" data-popup="tooltip" title="Edit"  onClick=\'edit("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;';
					}
					if( (isset($user_privileges['delete.' . $moduleName]) AND $user_privileges['delete.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ){
						echo '&nbsp;<i class="icon-trash tooltip-actions" data-popup="tooltip" title="Delete"  onClick=\'deleteData("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>&nbsp;';
					}

					if( $gl->isEnabled == 2 ) { // IF disable
						if( (isset($user_privileges['edit.' . $moduleName]) AND $user_privileges['edit.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ){
							echo '<i class="icon-check tooltip-actions" data-popup="tooltip" title="Enable this user"  onClick=\'edit("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;';
						}
					} 

					if( $gl->isEnabled == 1 ) { // IF enable
						if( (isset($user_privileges['edit.' . $moduleName]) AND $user_privileges['edit.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ){
							echo '<i class="icon-blocked tooltip-actions" data-popup="tooltip" title="Disable this user"  onClick=\'edit("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;';
						}
					}
					
					
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

<?php 
$hideClassName = ( (isset($user_privileges['add.' . $moduleName]) AND $user_privileges['add.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ) ? '' : 'hide';
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
            text: '<i class="icon-plus3"></i> <?=$this->lang->line("user_text_02")?>',
            className: 'btn btn-bg-primary marginleft <?=$hideClassName?>',
            action: function(e, dt, node, config) {
            	location.href=base_url+'manage_users/add';
            }
        }
    ]
});


$('[data-popup=tooltip]').tooltip({
	template: '<div class="tooltip"><div class="btn-bg-primary"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
});
</script>