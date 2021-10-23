<div class="navbar navbar-default navbar-fixed-top header-highlight" style="background-color: #f7fdf1">
	<div class="navbar-header" style="background-color: #5c9023  !important; height:70px;">
		<a class="navbar-brand" href="<?=base_url('dashboard')?>" style=""><img src="<?=base_url('assets/images/logo/logo-01.png')?>"></a>

		<ul class="nav navbar-nav visible-xs-block" style="margin-top:10px !important;">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			<?php if( isset($active_menu) AND $active_menu == "account_settings" ) {?>
			<li><a class="sidebar-mobile-detached-toggle legitRipple"><i class="icon-grid7"></i></a></li>
			<?php }?>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		
		<div class="navbar-right">
			<ul class="nav navbar-nav navbar-right" style="margin-top:10px;">
				<li class="dropdown language-switch hide">
					<a class="dropdown-toggle" data-toggle="dropdown">English<span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a class="deutsch">Deutsch</a></li>
					</ul>
				</li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown" style="color:#5d9023;">
						<?php $profile_avatar = ($userDetails->profile_picture) ? $userDetails->profile_picture : 'default_avatar.jpg';?>
						<img src="<?=base_url('assets/images/users/' . $profile_avatar)?>" alt="">
						<span><?=$userDetails->firstname.' '.$userDetails->lastname?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?=base_url('account_settings')?>"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?=base_url('logout')?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>