<div class="content">

	<!-- Breadcrumb placement title -->
	<h6 class="content-group text-semibold">
		Clients - Edit Client
	</h6>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<form class="form-horizontal" action="<?=base_url('users/save_client_edit')?>" method="post" id="formSaveClient">
	<input type="hidden" name="client_id" value="<?=$cDetails->id?>">
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
		    		<h4>Personal Information</h4>
		            <div class="row form-group">
		                <label class="control-label col-md-4">Photo</label>
		                <div class="col-md-6">
		                	<input type="file" class="custom-file-input" id="photo" name="photo">
		                	<span class="help-block">Accepts .jpg, .png, .jpeg only with 2MB max filesize.</span>
		                	<?php 
		                	if($cDetails->photo != "") {?>
		                	<span class="help-block">Leave blank if no changes</span>
		                		<img src="../../../files/images/clients/photo/<?=$cDetails->photo?>" class="img-responsive" style="height:150px;">
		                	<?php }?>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-4">Full Name *</label>
		                <div class="col-md-6">
		                	<input type="text" required="required" class="form-control col-md-11" placeholder="Enter Full Name" name="fullname" value="<?=$cDetails->fullname?>"  />
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-4">Currently Live In *</label>
		                <div class="col-md-6">
		                	<select required="required" class="form-control col-md-11 select-size-lg" placeholder="<?=$this->lang->line("registration_text036")?>" id="select-country" name="country">
                                <option></option>
                                <?php 
                                if( $getCounties ) {
                                    foreach( $getCounties as $country ) {
                                ?>
                                <option value="<?=$country->id?>" <?php if($cDetails->country == $country->id){ echo "selected";}?>><?=$country->name?></option>
                                <?php } } ?>
                            </select>
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-4"><?=$this->lang->line("login_text_05")?>*</label>
		                <div class="col-md-6">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("login_text_05")?>" name="email_address" required value="<?=$cDetails->email_address?>"  />
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-4"><?=$this->lang->line("customer_text_10")?>*</label>
		                <div class="col-md-6">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("customer_text_10")?>" name="phone_number" required value="<?=$cDetails->phone_number?>"  />
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
		            <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("client_text003")?>*</label>
                        <div class="col-md-6">
                            <select required="required" class="form-control col-md-11 select-size-lg" placeholder="<?=$this->lang->line("registration_text038")?>" name="nationality">
                                <option></option>
                                <?php 
                                if( $getNationalities ) {
                                    foreach( $getNationalities as $nationality ) {
                                ?>
                                <option value="<?=$nationality->id?>" <?php if($cDetails->nationality == $nationality->id){ echo "selected";}?>><?=$nationality->param_value?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("domestic_worker_text002")?>*</label>
                        <div class="col-md-6">
                            <select required="required" class="form-control col-md-11 select-size-lg" placeholder="<?=$this->lang->line("registration_text039")?>" name="religion">
                                <option></option>
                                <?php 
                                if( $getReligion ) {
                                    foreach( $getReligion as $religion ) {
                                ?>
                                <option value="<?=$religion->id?>" <?php if($cDetails->religion == $religion->id){ echo "selected";}?>><?=$religion->param_value?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text040")?>*</label>
                        <div class="col-md-6">
                            <select required="required" class="form-control col-md-11 select-size-lg" placeholder="<?=$this->lang->line("registration_text041")?>" name="number_people_living">
                                <option value=""></option>
                                <?php for( $x = 1; $x <= 25; $x++ ) {?>
                                <option value="<?=$x?>" <?php if($cDetails->number_people_living == $x){ echo "selected";}?>><?=$x?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
		    	</div>
		    	<div class="col-md-6">
		    		<h4>Job Information</h4>
				    <div class="row">
				    	<div class="col-md-12">
				            <div class="row form-group">
				                <label class="control-label col-md-4">Starting Date</label>
				                <div class="col-md-6">
				                	<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control pickadate" value="<?=date('Y-m-d', strtotime($cDetails->starting_date))?>" name="starting_date">
									</div>
				                </div>
				            </div>
				            <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text043")?></label>
		                        <div class="col-md-6">
		                            <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text044")?>" name="duration_of_stay">
		                                <option value=""></option>
		                                <?php for( $x = 1; $x <= 25; $x++ ) {?>
		                                <option value="<?=$x?>" <?php if($cDetails->duration_of_stay == $x){ echo "selected";}?>><?=$x?> years</option>
		                              <?php }?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text045")?></label>
		                        <div class="col-md-6">
		                            <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text046")?>" name="looking_for">
		                                <option value=""></option>
		                                <?php 
		                                if( $getOccupation ) {
		                                    foreach( $getOccupation as $occupation ) {
		                                ?>
		                                <option value="<?=$occupation->id?>" <?php if($cDetails->looking_for == $occupation->id){ echo "selected";}?>><?=$occupation->param_value?></option>
		                                <?php } } ?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group is-invalid">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text047")?></label>
		                        <div class="col-md-6">
		                            <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text048")?>" name="preferred_nationalities">
		                                <option value=""></option>
		                                <?php 
		                                if( $getNationalities ) {
		                                    foreach( $getNationalities as $nationality ) {
		                                ?>
		                                <option value="<?=$nationality->id?>" <?php if($cDetails->preferred_nationalities == $nationality->id){ echo "selected";}?>><?=$nationality->param_value?></option>
		                                <?php } } ?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text049")?></label>
		                        <div class="col-md-6">
		                        	<div class="radio-inline">
				                		<input type="radio" name="driving_required" class="styled" value="1" <?php if($cDetails->driving_required == "1"){ echo "checked";}?>> Yes
				                	</div>
				                	<div class="radio-inline">
				                		<input type="radio" name="driving_required" class="styled" value="0" <?php if($cDetails->driving_required == "0"){ echo "checked";}?>> No
				                	</div>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text050")?></label>
		                        <div class="col-md-6">
		                          <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text051")?>" name="monthly_salary">
		                                <option value=""></option>
		                                <?php if( $getSalaryRange ) {
				                            foreach( $getSalaryRange as $salaryRange ) {
				                              $salaryRange = $salaryRange->salary_range_from."-".$salaryRange->salary_range_to;
				                          ?>
				                          <option value="<?=$salaryRange?>" <?php if( $cDetails->monthly_salary == $salaryRange ){ echo "selected"; }?>><?=$salaryRange?> SAR</option>
				                          <?php } }?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text052")?></label>
		                        <div class="col-md-6">
		                          <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text053")?>" name="child_people_take_care_of">
		                                <option value=""></option>
		                                <?php for( $x = 1; $x <= 25; $x++ ) {?>
		                                <option value="<?=$x?>" <?php if($cDetails->child_people_take_care_of == $x){ echo "selected";}?>><?=$x?></option>
		                              <?php }?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text054")?></label>
		                        <div class="col-md-6">
		                          <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text055")?>" name="require_education_level">
		                                <option></option>
		                                <?php 
		                                if( $getEducation ) {
		                                    foreach( $getEducation as $educ ) {
		                                ?>
		                                <option value="<?=$educ->id?>" <?php if($cDetails->require_education_level == $educ->id){ echo "selected";}?>><?=$educ->param_value?></option>
		                                <?php } } ?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row form-group">
		                        <label class="control-label col-md-4"><?=$this->lang->line("registration_text056")?></label>
		                        <div class="col-md-6">
		                          <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text057")?>" name="min_child_exp">
		                                <option value=""></option>
		                                <?php for( $x = 1; $x <= 25; $x++ ) {?>
		                                <option value="<?=$x?>" <?php if($cDetails->min_child_exp == $x){ echo "selected";}?>><?=$x?> years</option>
		                              <?php }?>
		                            </select>
		                        </div>
		                    </div>
							<div class="row form-group">
								<label class="control-label col-md-4"><?=$this->lang->line("custom007")?></label>
								<div class="col-md-6">
									<select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text073")?>" name="how_did_you_hear_about_amaalah" style="width:100%;">
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
				        </div>
				    </div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-6">
		    		<h4>Job Requirements</h4>
		    		<div class="row form-group">
                        <?php if( $getSkills ) {?>
                        <?php 
                        $skills = unserialize($cDetails->skills);
                        foreach( $getSkills as $skill ) { 
                          $ischeck = '';
                          if( $cDetails->skills != "") {
                            $ischeck = (in_array($skill->id, $skills)) ? 'checked' : '';
                          }
                          
                        ?>
                        <div class="col-md-6">

                          <div class="checkbox">
							<label>
								<input type="checkbox" class="styled" name="skills[]" value="<?=$skill->id?>" <?=$ischeck?>>
								<?=$skill->param_value?>
							</label>
						</div>
                          
                        </div>
                        <?php }?>
                        <?php }?>
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




$('#formSaveClient').on('submit', function(e) {
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
				setTimeout(function(){ window.location = base_url + 'users/clients'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	



</script>