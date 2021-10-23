<table class="table partner-skills-dt">
	<thead>
		<tr>
            <th>PARTNER SKILL <small><i>(Arabic)</i></small></th>
            <th>PARTNER SKILL <small><i>(English)</i></small></th>
            <th>ACTIONS</th>
        </tr>
	</thead>
	<tbody>
		<?php 
		if($param_list){
		foreach($param_list as $gl){ 
		?>
		<tr>
			<td><?=$gl->skills_arabic?></td>
			<td><?=$gl->skills?></td>
			<td>
				<i class="icon-pencil3 tooltip-actions" onclick="editParam('<?=$gl->id?>', 'partner_skills')" data-popup="tooltip" title="Edit" style="cursor:pointer;" data-popup="tooltip-custom" title="Edit" data-placement="top" data-container="body"></i>&nbsp;&nbsp;
				<i class="icon-trash tooltip-actions" onclick="deleteParam('<?=$gl->id?>', 'partner_skills')" data-popup="tooltip" title="Delete" style="cursor:pointer;" data-popup="tooltip-custom" title="Delete" data-placement="top" data-container="body"></i>&nbsp;&nbsp;
			</td>
		</tr>
		<?php } }?>
	</tbody>
</table>
<script>
// $('.partner-skills-dt').dataTable();

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
$('.partner-skills-dt').dataTable({
	"aaSorting": [],
	"order": [],
    buttons: [
    	{
            text: '<i class="icon-spinner11"></i> Refresh',
            className: 'btn btn-bg-primary marginright',
            action: function(e, dt, node, config) {
            	loadPartnerSkills();
            }
        },
        {
            text: '<i class="icon-plus3"></i> Add Partner Type',
            className: 'btn btn-bg-primary marginleft',
            action: function(e, dt, node, config) {
            	addParam('partner_skills');
            }
        }
    ]
});


$('[data-popup=tooltip]').tooltip({
	template: '<div class="tooltip"><div class="btn-bg-primary"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
});
</script>