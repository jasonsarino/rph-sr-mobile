<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" id="formImportEmployee" enctype="multipart/form-data" action="<?=base_url('test/import')?>">
		<input type="file" name="import_file">
		<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Please wait..." class="btn bg-slate-800 btn-loadings btn-sm">
			<i class="icon-upload position-left"></i> Import
		</button>
	</form>
</body>
</html>