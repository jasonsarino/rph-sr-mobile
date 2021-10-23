<!-- sidebar-fixed for dark theme -->
<!-- sidebar-default for light theme -->
<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user-material hide">
			<div class="category-content">
				<div class="sidebar-user-material-content">
					<?php $profile_avatar = ($userDetails->profile_picture) ? $userDetails->profile_picture : 'default_avatar.jpg';?>
					<a href="#"><img src="<?=base_url('assets/images/users/' . $profile_avatar)?>" class="img-circle img-responsive" alt=""></a>
					<h6><?=$userDetails->firstname.' '.$userDetails->lastname?></h6>
					<span class="text-size-small"><?=$userDetails->group_name?></span>
				</div>
											
				<div class="sidebar-user-material-menu">
					<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
				</div>
			</div>
			
			<div class="navigation-wrapper collapse" id="user-nav">
				<ul class="navigation">
					<li><a href="<?=base_url('account_settings')?>"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
					<li><a href="<?=base_url('logout')?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding" style="margin-top:60px;">
				<ul class="navigation navigation-main navigation-accordion" style="padding:0px !important;">

					<li class="<?=(isset($active_menu) AND $active_menu == 'dashboard') ? 'active' : ''?>">
						<a href="<?=base_url('dashboard')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-home2"></i> <span>Dashboard</span></a>
					</li>

					<!-- Create new sr -->
					<?php if( ( (isset($user_privileges['add.sales_report']) AND $user_privileges['add.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
					<li class="<?=(isset($active_menu) AND $active_menu == 'create_new_sr') ? 'active' : ''?>">
						<a href="<?=base_url('create_new_sr')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-plus2"></i> <span>Create New SR</span></a>
					</li>
					<?php } ?>
					<!-- Create new sr -->

					<!-- Sales Report -->
					<?php if( 
							( 
								isset($user_privileges['view_pending.sales_report']) AND $user_privileges['view_pending.sales_report'] == 1 OR 
								isset($user_privileges['view_approved.sales_report']) AND $user_privileges['view_approved.sales_report'] == 1
							) 
							OR $user_privileges == 'FULL-ACCESS' ){?>
					<li style="text-transform:uppercase;font-weight:normal;">
						<a href="#" style="text-transform:uppercase;font-weight:normal;"><i class="icon-graph"></i> <span>Sales Report</span></a>
						<ul>
							<?php if( (isset($user_privileges['add.manage_users']) AND $user_privileges['add.manage_users'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'pendingSalaryReport' OR $active_menu == 'approved_sales_report') ? 'active' : ''?>">
								<a href="javascript:;" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Broker</a>
								<?php if( ( (isset($user_privileges['view_pending.sales_report']) AND $user_privileges['view_pending.sales_report'] == 1 AND $user_privileges['view_approved.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
								<ul>
									<li class="<?=(isset($active_menu) AND $active_menu == 'pendingSalaryReport') ? 'active' : ''?>"><a href="<?=base_url('sales_report/broker/pending')?>"><i class="icon-circle-small"></i> Pending</a></li>
									<li class="<?=(isset($active_menu) AND $active_menu == 'approved_sales_report') ? 'active' : ''?>"><a href="<?=base_url('sales_report/broker/approved')?>"><i class="icon-circle-small"></i> Approved</a></li>
								</ul>
								<?php } ?>
							</li>
							<?php }?>

							<?php if( (isset($user_privileges['view.inter']) AND $user_privileges['view.inter'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'inter') ? 'active' : ''?>"><a href="<?=base_url('inter')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Internal User</a></li>
							<?php }?>

						</ul>
					</li>
					<?php }?>
					<!-- Sales Report -->

					<!-- Announcements -->
					<?php if( ( (isset($user_privileges['view.announcements']) AND $user_privileges['view.announcements'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
					<li class="hide <?=(isset($active_menu) AND $active_menu == 'announcements') ? 'active' : ''?>">
						<a href="<?=base_url('announcements')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-pushpin"></i> <span>Announcements</span></a>
					</li>
					<?php } ?>
					<!-- Announcements -->
					

					<!-- Systsem Users -->
					<?php if( 
							( 
								isset($user_privileges['add.manage_users']) AND $user_privileges['add.manage_users'] == 1 OR 
								isset($user_privileges['view.manage_users']) AND $user_privileges['view.manage_users'] == 1	 OR 
								isset($user_privileges['view.group']) AND $user_privileges['view.group'] == 1
							) 
							OR $user_privileges == 'FULL-ACCESS' ){?>
					<li style="text-transform:uppercase;font-weight:normal;">
						<a href="#" style="text-transform:uppercase;font-weight:normal;"><i class="icon-users"></i> <span>Users</span></a>
						<ul>
							<?php if( (isset($user_privileges['add.manage_users']) AND $user_privileges['add.manage_users'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'add_new_user') ? 'active' : ''?>"><a href="<?=base_url('manage_users/add')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Add New User</a></li>
							<?php }?>
							<?php if( (isset($user_privileges['view.manage_users']) AND $user_privileges['view.manage_users'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'manage_users') ? 'active' : ''?>"><a href="<?=base_url('manage_users')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Manage Users</a></li>
							<?php }?>
							<?php if( (isset($user_privileges['view.manage_groups']) AND $user_privileges['view.manage_groups'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'manage_groups') ? 'active' : ''?>"><a href="<?=base_url('manage_groups')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> <?=$this->lang->line('sidebar_menu_text_14')?></a></li>
							<?php }?>
						</ul>
					</li>
					<?php }?>
					<!-- Systsem Users -->

					<!-- Settings -->
					<?php if( 
							( 
								isset($user_privileges['add.manage_users']) AND $user_privileges['add.manage_users'] == 1 OR 
								isset($user_privileges['view.manage_users']) AND $user_privileges['view.manage_users'] == 1	 OR 
								isset($user_privileges['view.group']) AND $user_privileges['view.group'] == 1
							) 
							OR $user_privileges == 'FULL-ACCESS' ){?>
					<li style="text-transform:uppercase;font-weight:normal;">
						<a href="#" style="text-transform:uppercase;font-weight:normal;"><i class="icon-cog2"></i> <span>Settings</span></a>
						<ul>
							<?php if( (isset($user_privileges['add.manage_divisions']) AND $user_privileges['add.manage_divisions'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'manage_divisions') ? 'active' : ''?>"><a href="<?=base_url('manage_divisions')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Manage Divisions</a></li>
							<?php }?>
							<?php if( (isset($user_privileges['view.manage_positions']) AND $user_privileges['view.manage_positions'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'manage_positions') ? 'active' : ''?>"><a href="<?=base_url('manage_positions')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Manage Positions</a></li>
							<?php }?>
							<?php if( (isset($user_privileges['view.manage_developers']) AND $user_privileges['view.manage_developers'] == 1) OR $user_privileges == 'FULL-ACCESS' ){?>
							<li class="<?=(isset($active_menu) AND $active_menu == 'manage_developers') ? 'active' : ''?>"><a href="<?=base_url('manage_developers')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-circle-right2"></i> Manage Developers</a></li>
							<?php }?>
						</ul>
					</li>
					<?php }?>
					<!-- Settings -->

					<!-- Reports-->
					<?php if( ( (isset($user_privileges['reports.sales_report']) AND $user_privileges['reports.sales_report'] == 1) OR $user_privileges == 'FULL-ACCESS' ) ) {?>
					<li class="<?=(isset($active_menu) AND $active_menu == 'reports') ? 'active' : ''?>">
						<a href="<?=base_url('reports')?>" style="text-transform:uppercase;font-weight:normal;"><i class="icon-file-text"></i> <span>Reports</span></a>
					</li>
					<?php } ?>
					<!-- Reports-->
					
					
					<!-- /page kits -->

				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>