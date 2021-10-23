<table class="table datatable-groups">
	<thead>
		<tr class="bg-success">
            <th>GROUP NAME</th>
            <th>DESCRIPTION</th>
            <th>ACTIONS</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($groups_list){
			$count = 0;
		foreach($groups_list as $gl){ 
			$count++;
			$bg = ( $count % 2 == 0 ) ? "success" : "";
		?>
		<tr class="<?= $bg?>">
			<td><?=$gl->group_name?></td>
			<td><?=$gl->group_desc?></td>
			<td>
				<?php 
				if($gl->isFixed == 1) {
					echo "<code><i>(default)</i></code>";
				} else {
					if( (isset($user_privileges['edit.' . $moduleName]) AND $user_privileges['edit.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ) {
						echo '<i class="icon-pencil3 tooltip-actions" onClick=\'edit("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;';
					}
					if( (isset($user_privileges['delete.' . $moduleName]) AND $user_privileges['delete.' . $moduleName] == 1) OR $user_privileges == 'FULL-ACCESS' ) {
						echo '&nbsp;<i class="icon-trash tooltip-actions" onClick=\'deleteData("'.$gl->id.'", "'.$moduleName.'")\' style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>';
					}
				}
				?>
			</td>
		</tr>
		<?php } }?>
	</tbody>
</table>

<script>
var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
elems.forEach(function(html) {
    var switchery = new Switchery(html);
});
// $('.datatable-designation').dataTable();

// Setting datatable defaults
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
$('.datatable-groups').dataTable({
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
            text: '<i class="icon-plus3"></i> <?=$this->lang->line("group_text_02")?>',
            className: 'btn btn-bg-primary marginleft <?=$hideClassName?>',
            action: function(e, dt, node, config) {
            	location.href=base_url+'manage_groups/add';
            }
        }
    ]
});


$('[data-popup=tooltip]').tooltip({
	template: '<div class="tooltip"><div class="btn-bg-primary"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
});
</script>