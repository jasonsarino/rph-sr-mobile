<div class="content">

	<!-- Breadcrumb placement title -->
	<h6 class="content-group text-semibold">
		Jobseekers - Edit Jobseeker
	</h6>
	<!-- /breadcrumb placement title -->

	<!-- Ajax sourced data -->
	<form class="form-horizontal" action="<?=base_url('users/save_jobseeker_edit')?>" method="post" id="formSaveJobseeker">
	<input type="hidden" name="jobseeker_id" value="<?=$jobseekerDetails->id?>">
	<input type="hidden" name="passport_image_old" value="<?=$jobseekerDetails->passport_image?>">
	<input type="hidden" name="visa_image_old" value="<?=$jobseekerDetails->visa_image?>">
	<input type="hidden" name="driver_license_image_old" value="<?=$jobseekerDetails->driver_license_image?>">
	<input type="hidden" name="photo_old" value="<?=$jobseekerDetails->photo?>">
	<input type="hidden" name="old_password" value="<?=$jobseekerDetails->password?>">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Jobseeker</h5>
			<div class="heading-elements">
				<button type="submit" name="btnsubmit" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> <?=$this->lang->line('common_text_03')?>" class="btn bg-slate-800 btn-loading">
					<i class="icon-floppy-disk position-left"></i> <?=$this->lang->line('common_text_02')?>
				</button>
        	</div>
		</div>
		<div class="panel-body">
			<h4>Personal Information</h4>
			<div class="row">
		    	<div class="col-md-6">
		    		<div class="row form-group">
		                <label class="control-label col-md-3">Full Name*</label>
		                <div class="col-md-4">
		                    <input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("registration_text062")?>" name="firstname" required value="<?=$jobseekerDetails->firstname?>"  />
		                </div>
		                <div class="col-md-4">
		                    <input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("registration_text063")?>" name="lastname" required value="<?=$jobseekerDetails->lastname?>"  />
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("login_text_05")?>*</label>
		                <div class="col-md-8">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("login_text_05")?>" name="email_address" required value="<?=$jobseekerDetails->email_address?>"  />
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("customer_text_10")?>*</label>
		                <div class="col-md-8">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("customer_text_10")?>" name="phone_number" required value="<?=$jobseekerDetails->phone_number?>"  />
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("modal_text008")?> <?=( $jobseekerDetails->password == "" ) ? "*" : ""?></label>
		                <div class="col-md-8">
						<input type="text" class="form-control col-md-12" placeholder="<?=$this->lang->line("modal_text008")?>" name="password" <?=( $jobseekerDetails->password == "" ) ? "required" : ""?>  />
		                <?php if( $jobseekerDetails->password != "" ){?>
						<small class="form-text text-muted">This user has already password. Leave blank if no changes.</small>
						<?php }?>
						</div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text035")?>*</label>
		                <div class="col-md-8">
		                    <select required="required" class="form-control select-size-lg" placeholder="<?=$this->lang->line("registration_text036")?>" id="select-country-edit" name="country" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getCounties ) {
		                            foreach( $getCounties as $country ) {
		                        ?>
		                        <option value="<?=$country->id?>" <?php if( $jobseekerDetails->country == $country->id ){ echo "selected"; }?>><?=$country->name?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text014")?>*</label>
		                <div class="col-md-8">
		                    <select required="required" class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text037")?>" id="select-states-edit" name="city" style="width:100%;">
		                        <option></option>
		                    </select>
		                    
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("client_text003")?>*</label>
		                <div class="col-md-8">
		                    <select required="required" class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text038")?>" name="nationality" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getNationalities ) {
		                            foreach( $getNationalities as $nationality ) {
		                        ?>
		                        <option value="<?=$nationality->id?>" <?php if( $jobseekerDetails->nationality_id == $nationality->id ){ echo "selected"; }?>><?=$nationality->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                    
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("domestic_worker_text002")?>*</label>
		                <div class="col-md-8">
		                    <select required="required" class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text039")?>" name="religion" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getReligion ) {
		                            foreach( $getReligion as $religion ) {
		                        ?>
		                        <option value="<?=$religion->id?>" <?php if( $jobseekerDetails->religion_id == $religion->id ){ echo "selected"; }?>><?=$religion->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                    
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text065")?>*</label>
		                <div class="col-md-8">
		                	<div class="radio-inline">
		                		<input type="radio" name="gender" class="styled" value="Male" <?php if($jobseekerDetails->gender == "Male"){ echo "checked";}?>> Male
		                	</div>
		                	<div class="radio-inline">
		                		<input type="radio" name="gender" class="styled" value="Female" <?php if($jobseekerDetails->gender == "Female"){ echo "checked";}?>> Female
		                	</div>
		                </div>
		            </div>
		            <div class="row form-group is-invalid">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text068")?>*</label>
		                <div class="col-md-8">
		                    <input type="date" name="dob" class="form-control datepicker_edit col-md-12" required="required" value="<?=$jobseekerDetails->dob?>">
		                    
		                </div>
		            </div>
		    	</div>
		    	<div class="col-md-6">
		    		<div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text069")?></label>
		                <div class="col-md-8">
		                    <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text071")?>" name="current_occupation" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getOccupation ) {
		                            foreach( $getOccupation as $occupation ) {
		                        ?>
		                        <option value="<?=$occupation->id?>" <?php if( $jobseekerDetails->current_occupation_id == $occupation->id ){ echo "selected"; }?>><?=$occupation->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
		            <?php $has_passport_for_set = unserialize($jobseekerDetails->has_passport_for);?>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text070")?></label>
		                <div class="col-md-8">
		                    <select class="form-control col-md-10 select-size-lg" multiple placeholder="<?=$this->lang->line("registration_text070")?>" name="has_passport_for[]" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getCounties ) {
		                            foreach( $getCounties as $hasPassport ) {
										$hasPassPortSelected = "";
										if( count($has_passport_for_set) > 0 ) {
											$hasPassPortSelected = in_array($hasPassport->id, $has_passport_for_set) ? "selected" : "";
										}
										
		                        ?>
		                        <option value="<?=$hasPassport->id?>" <?=$hasPassPortSelected?> ><?=$hasPassport->name?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text072")?></label>
		                <div class="col-md-8">
		                    <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text073")?>" name="education" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getEducation ) {
		                            foreach( $getEducation as $educ ) {
		                        ?>
		                        <option value="<?=$educ->id?>" <?php if( $jobseekerDetails->education_id == $educ->id ){ echo "selected"; }?>><?=$educ->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
		            <?php $languageSet = unserialize($jobseekerDetails->languages);?>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text074")?></label>
		                <div class="col-md-8">
		                    <select multiple class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text075")?>" name="languages[]" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getLanguage ) {
		                            foreach( $getLanguage as $language ) {
										$langSelected = "";
										if( count($languageSet) > 0 ) {
											$langSelected = in_array($language->id, $languageSet) ? "selected" : "";
										}
		                        ?>
		                        <option value="<?=$language->id?>" <?=$langSelected?> ><?=$language->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
					<div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("custom007")?></label>
		                <div class="col-md-8">
		                    <select class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("registration_text073")?>" name="how_did_you_hear_about_amaalah" style="width:100%;">
		                        <option></option>
		                        <?php 
		                        if( $getHowDidYou ) {
		                            foreach( $getHowDidYou as $getHowDidYou ) {
		                        ?>
		                        <option value="<?=$getHowDidYou->id?>" <?php if( $jobseekerDetails->how_did_you_hear_about_amaalah == $getHowDidYou->id ){ echo "selected"; }?>><?=$getHowDidYou->param_value?></option>
		                        <?php } } ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text076")?></label>
		                <div class="col-md-8">
		                	<div class="radio-inline">
		                		<input type="radio" name="drivers_license" class="styled" value="1" <?php if($jobseekerDetails->drivers_license == "1"){ echo "checked";}?>> Yes
		                	</div>
		                	<div class="radio-inline">
		                		<input type="radio" name="drivers_license" class="styled" value="0" <?php if($jobseekerDetails->drivers_license == "0"){ echo "checked";}?>> No
		                	</div>
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text077")?>*</label>
		                <div class="col-md-8">

		                	<div class="radio-inline">
		                		<input type="radio" name="has_health_problem" class="styled hasHealthProblem" value="1" <?php if($jobseekerDetails->has_health_problem == "1"){ echo "checked";}?>> Yes
		                	</div>
		                	<div class="radio-inline">
		                		<input type="radio" name="has_health_problem" class="styled hasHealthProblem" value="0" <?php if($jobseekerDetails->has_health_problem == "0"){ echo "checked";}?>> No
		                	</div>

		                    <br />
		                    <input type="text" class="form-control col-md-9 <?php if($jobseekerDetails->has_health_problem == "0"){ echo "hide";}?>" placeholder="<?=$this->lang->line("registration_text078")?>" id="what_is_health_problem_edit" name="has_health_problem_value" value="<?=$jobseekerDetails->has_health_problem_value?>">
		                </div>
		            </div>
		            <div class="row form-group">
		                <label class="control-label col-md-3"><?=$this->lang->line("registration_text079")?></label>
		                <div class="col-md-8">
		                	<div class="radio-inline">
		                		<input type="radio" name="do_you_smoke" class="styled" value="1" <?php if($jobseekerDetails->do_you_smoke == "1"){ echo "checked";}?>> Yes
		                	</div>
		                	<div class="radio-inline">
		                		<input type="radio" name="do_you_smoke" class="styled" value="0" <?php if($jobseekerDetails->do_you_smoke == "0"){ echo "checked";}?>> No
		                	</div>
		                </div>
		            </div>
		    	</div>
		    </div>
		    <h4>Skills & Experience</h4>
		    <?php 
	      	$skillsSet = unserialize($jobseekerDetails->skills);
	      	?>
	      	<div class="row">
	          <div class="col-md-6">
	            <div class="row form-group">
	                <label class="control-label col-md-3"><?=$this->lang->line("domestic_worker_text007")?></label>
	                <div class="col-md-8">
	                    <select multiple class="form-control col-md-10 select-size-lg" placeholder="<?=$this->lang->line("client_account_text011")?>" name="skills[]" style="width:100%;">
	                        <option></option>
	                        <?php 
	                        if( $getSkills ) {
	                            foreach( $getSkills as $skill ) {
	                        ?>
	                        <option value="<?=$skill->id?>" <?php if( in_array($skill->id, $skillsSet) ){ echo "selected"; }?>><?=$skill->param_value?></option>
	                        <?php } } ?>
	                    </select>
	                </div>
	            </div>
	            <div class="row form-group">
	                <label class="control-label col-md-3"><?=$this->lang->line("registration_text081")?></label>
	                <div class="col-md-8">
	                	<div class="radio-inline">
	                		<input type="radio" name="reference" class="styled" value="1" <?php if($jobseekerDetails->reference == "1"){ echo "checked";}?>> Yes
	                	</div>
	                	<div class="radio-inline">
	                		<input type="radio" name="reference" class="styled" value="0" <?php if($jobseekerDetails->reference == "0"){ echo "checked";}?>> No
	                	</div>
	                </div>
	            </div>
	            <div class="row form-group">
	                <label class="control-label col-md-12"><?=$this->lang->line("registration_text082")?></label>
	            </div>
	            <div class="row form-group">
	                <label class="control-label col-md-3"><?=$this->lang->line("registration_text083")?></label>
	                <div class="col-md-8">
	                    <select class="form-control col-md-12 select-size-lg" placeholder="<?=$this->lang->line("registration_text084")?>" name="expected_salary" style="width:100%;">
	                        <option></option>
	                        <?php if( $getSalaryRange ) {
	                            foreach( $getSalaryRange as $salaryRange ) {
	                              $salaryRange = $salaryRange->salary_range_from."-".$salaryRange->salary_range_to;
	                          ?>
	                          <option value="<?=$salaryRange?>" <?php if( $jobseekerDetails->expected_salary == $salaryRange ){ echo "selected"; }?>><?=$salaryRange?> SAR</option>
	                          <?php } }?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="col-md-6">
	              <div class="row form-group">
	                <label  class="control-label col-md-5"><?=$this->lang->line("registration_text085")?>*</label>
	                <div class="col-md-7">
	                    <select class="form-control col-md-10 select-size-lg" name="have_child_care_experience" required="required" placeholder="<?=$this->lang->line("registration_text053")?>" style="width:100%;">
	                        <option></option>
	                        <?php for($x=1; $x<=10; $x++) {?>
	                        <option value="<?=$x?>" <?php if($jobseekerDetails->have_child_care_experience == $x){ echo "selected";}?>><?=$x?> years</option>
	                        <?php }?>
	                    </select>
	                    
	                </div>
	            </div>
	            <div class="row form-group">
	                <label class="control-label col-md-5"><?=$this->lang->line("registration_text086")?>*</label>
	                <div class="col-md-7">
	                    <select required="required" class="form-control col-md-10 select-size-lg" name="have_elderly_care_experience" placeholder="<?=$this->lang->line("registration_text053")?>" style="width:100%;">
	                        <option></option>
	                        <?php for($x=1; $x<=10; $x++) {?>
	                        <option value="<?=$x?>" <?php if($jobseekerDetails->have_elderly_care_experience == $x){ echo "selected";}?>><?=$x?> years</option>
	                        <?php }?>
	                    </select>
	                    
	                </div>
	            </div>
	            <div class="row form-group">
	                <label class="control-label col-md-7"><?=$this->lang->line("registration_text087")?></label>
	                <div class="col-md-5">
	                	<div class="radio-inline">
	                		<input type="radio" name="do_you_have_prev_job" class="styled do_you_have_prev_job" value="1" <?php if($jobseekerDetails->do_you_have_prev_job == "1"){ echo "checked";}?>> Yes
	                	</div>
	                	<div class="radio-inline">
	                		<input type="radio" name="do_you_have_prev_job" class="styled do_you_have_prev_job" value="0" <?php if($jobseekerDetails->do_you_have_prev_job == "0"){ echo "checked";}?>> No
	                	</div>
	                </div>
	            </div>
	            <?php 
		      	$jobexpSet = unserialize($jobseekerDetails->job_experience);
		      	?>
	            <div id="jobexperience_agency_edit" class="<?php if($jobseekerDetails->do_you_have_prev_job == "0"){ echo "hide";}?>">
	            	
	            	<?php 
	            	if( count($jobexpSet) > 0 ) {
	            		foreach( $jobexpSet as $jobexper ) {
	            			if( !empty($jobexper['job_title']) ) {
	            	?>
	            	<div class="row form-group">
	            		<div class="col-md-4">
	                        <input type="text" name="job_title[]" class="form-control" placeholder="<?=$this->lang->line("registration_text088")?>" value="<?=$jobexper['job_title']?>">
	                    </div>
	                    <div class="col-md-4">
	                        <input type="text" name="job_city[]" class="form-control" placeholder="<?=$this->lang->line("registration_text089")?>" value="<?=$jobexper['job_city']?>">
	                    </div>
	                    <div class="col-md-4">
	                        <input type="text" name="job_date[]" class="form-control" placeholder="<?=$this->lang->line("registration_text090")?>" value="<?=$jobexper['job_date']?>">
	                    </div>
	            	</div>
	            	<?php } } }?>
	            	
	                <div class="row form-group" id="jobtitlerow_agency_edit">
	                        <div class="col-md-4">
	                            <input type="text" name="job_title[]" class="form-control" placeholder="Enter <?=$this->lang->line("registration_text088")?>">
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" name="job_city[]" class="form-control" placeholder="Enter <?=$this->lang->line("registration_text089")?>">
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" name="job_date[]" class="form-control" placeholder="Enter <?=$this->lang->line("registration_text090")?>">
	                        </div>
	                </div>
	                    <div id="jobanother_agency_edit"></div>
	                    <div class="row form-group">
	                        <div class="col-md-5">
	                            <p><?=$this->lang->line("registration_text091")?></p>
	                        </div>
	                        <div class="col-md-4">
	                            <button type="button" class="btn btn-default" id="addjobrow_agency_Edit"><i class="fa fa-plus" style="margin-right:15px;"></i> <?=$this->lang->line("registration_text092")?></button>
	                        </div>
	                </div>
	            </div>
	          </div>
	      </div>
			<h4>About Me</h4>
			<div class="row">
        <div class="col-md-6">
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("domestic_worker_text008")?>*</strong> </label>
                <div class="col-md-8">
                    <select class="form-control col-md-10 select-size-lg" placeholder="Please select one" name="visa_status" id="visa_status_edit" required="required" style="width:100%;">
                        <option></option>
                        <option value="transfer_sponsorship" <?php if($jobseekerDetails->visa_status == 'transfer_sponsorship'){ echo "selected";}?>><?=$this->lang->line("client_account_text012")?></option>
                        <option value="recruit_now" <?php if($jobseekerDetails->visa_status == 'recruit_now'){ echo "selected";}?>><?=$this->lang->line("view_jobseeker_page_text013")?></option>
                        <option value="hire_worker" <?php if($jobseekerDetails->visa_status == 'hire_worker'){ echo "selected";}?>><?=$this->lang->line("client_account_text013")?></option>
                    </select>
                    
                </div>
            </div>	
            <?php 
            $query = $this->db->query("SELECT * FROM `agency_workers` WHERE `jobseeker_id` = " . $jobseekerDetails->id);
            if( $query->num_rows() == 1 ) {
            	
            $rsQuery = $query->row();
            $visaStatusFields = unserialize($rsQuery->visa_status_fields);
            // echo '<pre>'.print_r($visaStatusFields, TRUE).'</pre>';
            ?>
            <div id="to-transfer-sponsorship-row-edit" class="<?=($jobseekerDetails->visa_status == 'transfer_sponsorship') ? '' : "hide"?>">
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text005")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[transfer_reason]" value="<?=$visaStatusFields['transfer_reason']?>" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text006")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[transfer_include]" value="<?=$visaStatusFields['transfer_include']?>"  />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text007")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[transfer_not_include]" value="<?=$visaStatusFields['transfer_not_include']?>"  />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-7"><strong><?=$this->lang->line("view_jobseeker_page_text008")?></strong></label>
                    <div class="col-md-5">
                    	<div class="radio-inline">
	                		<input type="radio" name="visa_status_fields[transfer_negotiable]" class="styled" value="1" <?php if( isset($visaStatusFields['transfer_negotiable']) AND $visaStatusFields['transfer_negotiable']  == "1"){ echo "checked"; }?>> Yes
	                	</div>
	                	<div class="radio-inline">
	                		<input type="radio" name="visa_status_fields[transfer_negotiable]" class="styled" value="0" <?php if( isset($visaStatusFields['transfer_negotiable']) AND $visaStatusFields['transfer_negotiable']  == "0"){ echo "checked"; }?>> No
	                	</div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text028")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[transfer_price]" value="<?=$visaStatusFields['transfer_price']?>" />
                    </div>
                </div>
            </div>

            <div id="recruit-now-row_edit" class="<?=($jobseekerDetails->visa_status == 'recruit_now') ? '' : "hide"?>">
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text006")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[recruit_include]" value="<?=$visaStatusFields['recruit_include']?>" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text007")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[recruit_not_include]" value="<?=$visaStatusFields['recruit_not_include']?>" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text014")?> </strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[recruit_recruiting_cost]" value="<?=$visaStatusFields['recruit_recruiting_cost']?>" />
                    </div>
                </div>
            </div>

            <div id="to-hire-worker-row_edit" class="<?=($jobseekerDetails->visa_status == 'hire_worker') ? '' : "hide"?>">
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text015")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[has_visa_for]" value="<?=$visaStatusFields['has_visa_for']?>" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("view_jobseeker_page_text016")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[working_for]" value="<?=$visaStatusFields['working_for']?>" />
                    </div>
                </div>
                <div class="row form-group" style="margin-bottom:0px;">
                    <div class="col-md-6"><label class="control-label"><strong><?=$this->lang->line("request_status_text038")?></strong> </label></div>
                    <div class="col-md-6"><label class="control-label"><strong><?=$this->lang->line("registration_text028")?></strong> </label></div>
                </div>
                <?php 
                $hire_price_list = $visaStatusFields['hire_price'];
                $contract_duration_list = $visaStatusFields['contract_duration'];
                $counthpl = 0;
                foreach($hire_price_list as $hpl) {
                	if($hpl != "") {
                ?>
                <div class="row form-group" id="contract-duration-orig-edit">
                    <div class="col-md-6">
                        <select class="form-control" placeholder="<?=$this->lang->line("registration_text093")?>" id="contract_duration_select" name="visa_status_fields[contract_duration][]" style="width:100%;">
                            <option></option>
                            <?php for( $x = 1; $x <= 32; $x++ ) {?>
                            <option value="<?=$x?>" <?php if($contract_duration_list[$counthpl] == $x){ echo "selected";}?>><?=$x?> months</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control col-md-12 hire_price" name="visa_status_fields[hire_price][]" value="<?=$hpl?>"  />
                    </div>
                </div>
                <?php $counthpl++; } }?>
                <div class="row form-group" id="contract-duration-orig-edit">
                    <div class="col-md-6">
                        <select class="form-control" placeholder="<?=$this->lang->line("registration_text093")?>" id="contract_duration_select" name="visa_status_fields[contract_duration][]" style="width:100%;">
                            <option></option>
                            <?php for( $x = 1; $x <= 32; $x++ ) {?>
                            <option value="<?=$x?>"><?=$x?> months</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control col-md-12 hire_price" name="visa_status_fields[hire_price][]" />
                    </div>
                </div>

                <div id="contract-duration-row-edit"></div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <span style="color:#666;"><?=$this->lang->line("client_account_text014")?> <a href="javascript:;" id="add-contract-duration-edit" style="border:1px solid #01317e; margin-left:5px; color: #01317e; border-radius:50px; padding-left:20px; padding-right:20px;"><i class="fa fa-plus"></i> <?=$this->lang->line("registration_text092")?></a></span>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="control-label col-md-7"><strong><?=$this->lang->line("client_account_text015")?></strong></label>
                    <div class="col-md-5">
                    	<div class="radio-inline">
	                		<input type="radio" name="visa_status_fields[to_be_sponsorship]" class="styled to_be_transfer_checkbox_edit" value="1" <?php if( isset($visaStatusFields['to_be_sponsorship']) AND $visaStatusFields['to_be_sponsorship']  == "1"){ echo "checked"; }?>> Yes
	                	</div>
	                	<div class="radio-inline">
	                		<input type="radio" name="visa_status_fields[to_be_sponsorship]" class="styled to_be_transfer_checkbox_edit" value="0" <?php if( isset($visaStatusFields['to_be_sponsorship']) AND $visaStatusFields['to_be_sponsorship']  == "0"){ echo "checked"; }?>> No
	                	</div>
                    </div>
                </div>
                <div class="row form-group <?=( isset($visaStatusFields['to_be_sponsorship']) AND $visaStatusFields['to_be_sponsorship'] == "1" ) ? "" : "hide"?>" id="hire_worker_price_transfer_edit">
                    <label class="control-label col-md-3"><strong><?=$this->lang->line("client_account_text016")?></strong> </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control col-md-12" name="visa_status_fields[hire_transfer_price]" value="<?=$visaStatusFields['hire_transfer_price']?>" />
                    </div>
                </div>
            </div>  
            <?php } ?>

            <div class="row form-group">
                <label class="control-label col-md-12"><strong><?=$this->lang->line("registration_text094")?></strong></label>
                <label class="control-label col-md-12"><?=$this->lang->line("registration_text095")?></label>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text096")?></strong></label>
                <div class="col-md-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="passport_image" name="passport_image">
                        <label class="custom-file-label" for="passport_image"><?=$this->lang->line("registration_text097")?></label>
                      </div>
                    <small class="form-text text-muted"><?=$this->lang->line("registration_text098")?></small>
                    <?php 
                    if( $jobseekerDetails->passport_image != "" ) {
                    ?>
                    <small class="form-text text-muted"><?=$this->lang->line("jobseeker_account_text018")?></small>
                    <img src="../../../files/images/jobseeker/passport/<?=$jobseekerDetails->passport_image?>" class="img-responsive" style="height:150px;">
                    <?php }?>
                </div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text099")?></strong></label>
                <div class="col-md-8">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="visa_image" name="visa_image">
                    <label class="custom-file-label" for="visa_image"><?=$this->lang->line("registration_text097")?></label>
                  </div>
                  <small class="form-text text-muted"><?=$this->lang->line("registration_text098")?></small>
                  <?php 
                    if( $jobseekerDetails->visa_image != "" ) {
                    ?>
                    <small class="form-text text-muted"><?=$this->lang->line("jobseeker_account_text018")?></small>
                    <img src="../../../files/images/jobseeker/visa/<?=$jobseekerDetails->visa_image?>" class="img-responsive" style="height:150px;">
                    <?php }?>
                </div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text076")?></strong></label>
                <div class="col-md-8">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="driver_license_image" name="driver_license_image">
                    <label class="custom-file-label" for="driver_license_image"><?=$this->lang->line("registration_text097")?></label>
                  </div>
                  <small class="form-text text-muted"><?=$this->lang->line("registration_text098")?></small>
                  <?php 
                    if( $jobseekerDetails->driver_license_image != "" ) {
                    ?>
                    <small class="form-text text-muted"><?=$this->lang->line("jobseeker_account_text018")?></small>
                    <img src="../../../files/images/jobseeker/driver_license/<?=$jobseekerDetails->driver_license_image?>" class="img-responsive" style="height:150px;">
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text011")?></strong></label>
                <div class="col-md-9">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo"><?=$this->lang->line("registration_text097")?></label>
                  </div>
                  <small class="form-text text-muted"><?=$this->lang->line("registration_text098")?></small>
                  <?php 
                    if( $jobseekerDetails->photo != "" ) {
                    ?>
                    <small class="form-text text-muted"><?=$this->lang->line("jobseeker_account_text018")?></small>
                    <img src="../../../files/images/jobseeker/photo/<?=$jobseekerDetails->photo?>" class="img-responsive" style="height:150px;">
                    <?php }?>
                </div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-3"><strong><?=$this->lang->line("registration_text061")?></strong></label>
                <div class="col-md-9">
                    <textarea class="form-control" name="about_me" rows="7"><?=$jobseekerDetails->about_me?></textarea>
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

$('#add-contract-duration-edit').on('click', function() {
        $("#contract-duration-orig-edit").clone().appendTo("#contract-duration-row-edit");  
}); 

$('.to_be_transfer_checkbox_edit').on('click', function(){
    var val = $(this).val();
    if( val == "1" ) {  
      $('#hire_worker_price_transfer_edit').removeClass('hide');
    } else if( val == "0" ) {
      $('#hire_worker_price_transfer_edit').addClass('hide');
    }
});

$('#visa_status_edit').on('change', function() {
var val = $(this).val();
if( val == "transfer_sponsorship" ) {
  $('#to-hire-worker-row_edit').addClass('hide');
  $('#recruit-now-row_edit').addClass('hide')
  $('#to-transfer-sponsorship-row-edit').removeClass('hide')
} else if( val == "recruit_now" ) {
  $('#to-hire-worker-row_edit').addClass('hide');
  $('#recruit-now-row_edit').removeClass('hide');
  $('#to-transfer-sponsorship-row-edit').addClass('hide')
} else if ( val == "hire_worker") {
  $('#to-hire-worker-row_edit').removeClass('hide');
  $('#recruit-now-row_edit').addClass('hide');
  $('#to-transfer-sponsorship-row-edit').addClass('hide')
}
});

function loadM(val, city) {
	$.ajax({
        url: "<?=base_url('general/getCities')?>/" + val,
        dataType: "json",
        success: function(data) {
        	
          if(data.success) {  
          	console.log(data);
            $('#select-states-edit').html('').select2({data: [{id: '', text: ''}]});
            
            var $element = $('#select-states-edit').select2({theme: 'bootstrap4',placeholder: $(this).attr('placeholder')});
            
            for (var d = 0; d < data.list.length; d++) {
              var item = data.list[d];
              var option = new Option(item.state, item.id);
              $element.append(option);
            }

            $element.val(city);

            $element.trigger('change');
          }
        }
      });
}

loadM('<?=$jobseekerDetails->country?>','<?=$jobseekerDetails->city?>');

$('#select-country-edit').on('change', function(){
var val = $(this).val();

$.ajax({
    url: "<?=base_url('general/getCities')?>/" + val,
    dataType: "json",
    success: function(data) {
      if(data.success) {  
        $('#select-states-edit').html('').select2({data: [{id: '', text: ''}]});
        
        var $element = $('#select-states-edit').select2({theme: 'bootstrap4',placeholder: $(this).attr('placeholder')});
        
        for (var d = 0; d < data.list.length; d++) {
          var item = data.list[d];
          var option = new Option(item.state, item.id);
          $element.append(option);
        }
        $element.trigger('change');
      }
    }
  });
});

$('#addjobrow_agency_Edit').on('click', function() {
    $("#jobtitlerow_agency_edit").clone().appendTo("#jobanother_agency_edit");
});

$('.hasHealthProblem').on('click', function() {
	var val = $(this).val();
	if( val == '1' ) {
	  $('#what_is_health_problem_edit').removeClass('hide');
	} else {
	  $('#what_is_health_problem_edit').addClass('hide');
	}
});


$('.do_you_have_prev_job').on('click', function() {
	var val = $(this).val();
	if( val == '1' ) {
	  $('#jobexperience_agency_edit').removeClass('hide');
	} else {
	  $('#jobexperience_agency_edit').addClass('hide');
	}
});

$('#formSaveJobseeker').on('submit', function(e) {
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
				setTimeout(function(){ window.location = base_url + 'users/jobseekers'; }, 2000);
			} else {
				notif('ERROR', data.message, 'bg-danger');
			}
		}, beforeSend: function() {
			btn.button('loading');
		}
	});
	

});	



</script>