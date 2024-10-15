<?php
//	echo Debug::vars('32', $_SESSION, $_COOKIE);
//	echo Debug::vars('3', Auth::instance()->logged_in('admin'));
//	echo Debug::vars('3', Auth::instance()->logged_in('aa'));
//echo Kohana::version();
//echo phpinfo(INFO_GENERAL);
?>
<div id="header">
	<div id="logo"><img src="images/logo2.png" alt="logo"/></div>
	

	<div id="search">
		<?php 
		
//		if(Kohana::$config->load('config_newcrm')->view_settings) echo HTML::anchor('settings/mainManual', HTML::image('images/shortcut/setting.png', array('width'=>20))) . ' | '. HTML::anchor('logout', __('logout'));
		if(Arr::get(Session::instance()->get('auth_user_crm'), 'ID_PEP') == 1) echo HTML::anchor('settings/mainManual', HTML::image('images/shortcut/setting.png', array('width'=>20)));
		echo ' | '. HTML::anchor('logout', __('logout'));

		?>
	</div>
	<div id="search">
		<?php echo  __('system.version'). Arr::get(Kohana::$config->load('config_newcrm')->version, 'minor').'.'.Arr::get(Kohana::$config->load('config_newcrm')->version, 'major'); ?>
	</div>

	<div id="account_info">
		<img src="images/icon_online.png" alt="Online" class="mid_align"/>
		<?php 
			$huser=Session::instance()->get('auth_user_crm');
			$userAdmin=new Contact(Arr::get($huser, 'ID_PEP'));
			//echo Debug::vars($huser, Arr::get($huser, 'ID_PEP'), iconv('CP1251', 'UTF-8', $userAdmin->surname));
			echo __('welcome') . ', <strong><i>' . iconv('CP1251', 'UTF-8', 
				$userAdmin->name. ' '
				.$userAdmin->surname. ' '
				.$userAdmin->patronymic)
				. '</i></strong>'; ?> 
	</div>
	<div>
	
				
	</div>

	
</div>
