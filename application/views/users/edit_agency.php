<div class="content">

	<!-- Breadcrumb placement title -->
	<h6 class="content-group text-semibold">
		Agency - Edit Agency
	</h6>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<form class="form-horizontal" action="<?=base_url('users/save_agency_edit')?>" method="post" id="formSaveAgency">
	<input type="hidden" name="agency_id" value="<?=$cDetails->id?>">
	<input type="hidden" name="old_photo" value="<?=$cDetails->photo?>">
	<input type="hidden" name="old_password" value="<?=$cDetails->password?>">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Client</h5>
			<div class="heading-elements">
				<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn bg-slate-800 btn-loading">
					<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
				</button>
        	</div>
		</div>
		<div class="panel-body">
			
			<div class="row">
		    	<div class="col-md-6">
		            <div class="row form-group">
		                <label class="control-label col-md-4">Photo</label>
		                <div class="col-md-6">
		                	<input type="file" class="custom-file-input" id="photo" name="photo">
		                	<span class="help-block">Accepts .jpg, .png, .jpeg only with 2MB max filesize.</span>
		                	<?php 
		                	if($cDetails->photo != "") {?>
		                	<span class="help-block">Leave blank if no changes</span>
		                		<img src="../../../files/images/agencies/photo/<?=$cDetails->photo?>" class="img-responsive" style="height:150px;">
		                	<?php }?>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-4">Agency Name *</label>
		                <div class="col-md-6">
		                	<input type="text" required="required" class="form-control col-md-11" name="agency_name" value="<?=$cDetails->agency_name?>"  />
		                </div>
		            </div>
		            <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("modal_text007")?>*</label>
                        <div class="col-md-6">
                            <input type="email" name="email_address" class="form-control" value="<?=$cDetails->email_address?>" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text002")?>*</label>
                        <div class="col-md-6">
                            <input type="phone_number" name="phone_number" class="form-control" value="<?=$cDetails->phone_number?>" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text014")?>*</label>
                        <div class="col-md-6">
                            <select required="required" class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text014")?>" id="select-states" name="city" id="city">
                                <option></option>
                                <?php 
                                if( $getCities ) {
                                    foreach( $getCities as $city ) {
                                ?>
                                <option value="<?=$city->id?>" <?php if($cDetails->city == $city->id){ echo "selected";}?>><?=$city->state?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text015")?>*</label>
                        <div class="col-md-6">
                            <input type="text" required="required" class="form-control col-md-12" placeholder="<?=$this->lang->line("registration_text015")?>" name="commercial_register" id="commercial_register" value="<?=$cDetails->commercial_register?>" />
                        </div>
                    </div>
					<div class="row form-group">
		                <label class="control-label col-md-4"><?=$this->lang->line("custom007")?></label>
		                <div class="col-md-6">
		                    <select class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text073")?>" name="how_did_you_hear_about_amaalah" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getHowDidYou ) {
		                            foreach( $getHowDidYou as $getHowDidYou ) {
		                        ?>
		                        <option value="<?=$getHowDidYou->id?>" <?php if( $cDetails->how_did_you_hear_about_amaalah == $getHowDidYou->id ){ echo "selected"; }?>><?=$getHowDidYou->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
					<div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("menubar_text01")?>*</label>
                        <div class="col-md-6">
                            <input type="text" required="required" class="form-control col-md-12" placeholder="<?=$this->lang->line("menubar_text01")?>" name="about_us" id="about_us" value="<?=$cDetails->about_us?>" />
                        </div>
                    </div>
					<div class="row form-group">
		                <label class="control-label col-md-4"><?=$this->lang->line("modal_text008")?>*</label>
		                <div class="col-md-6">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("modal_text008")?>" name="password" required  />
		                <?php if( $cDetails->password != "" ){?>
						<small class="form-text text-muted">This user has already password. Leave blank if no changes.</small>
						<?php }?>
						</div>
		            </div>
                    <?php 
                    $recruiting_from_arr = array();
                    if( $cDetails->recruiting_from != "" ) {
                    	$recruiting_from_arr = unserialize($cDetails->recruiting_from);
                    }
                    ?>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text016")?></label>
                        <div class="col-md-8">
                            <select multiple class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text016")?>" id="select-country" name="country[]">
                                <option></option>
                                <?php 
                                if( $getCounties ) {
                                    foreach( $getCounties as $country ) {
                                ?>
                                <option value="<?=$country->id?>" <?php if( in_array($country->id, $recruiting_from_arr) ){ echo "selected";}?>><?=$country->name?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
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
$(".styled").uniform();




$('#formSaveAgency').on('submit', function(e) {
	e.preventDefault();
	var form = $(this)[0];
    var formdata = new FormData(form);
	var btn = $('.btn-loading');
	var url = $(this).attr('action');
	$.ajax({
		url: url,
		data: formdata, 
		dataType: 'json',
		type: 'post',
		contentType: false,
        processData: false,
		success: function(data) {
			btn.button('reset')
			if(data.success) {
				notif('SUCCESS', data.message, 'bg-success');
				setTimeout(function(){ window.location = base_url + 'users/agencies'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	



</script>