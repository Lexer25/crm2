<?php 
$arrAlert = Session::instance()->get('arrAlert');
Session::instance()->delete('arrAlert');
//echo Debug::vars('2-2', Auth::instance());//exit;
include Kohana::find_file('views','alert');
$configModule=Kohana::$config->load('config_newcrm')->module;
echo '<ul id="shortcut"><li>' . HTML::anchor('/', HTML::image('images/shortcut/home.png') . '<br />' . __('home')) . '</li>';
if (Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('owner')) {
	if(Arr::get($configModule, 'org')) echo '<li>' . HTML::anchor('companies', HTML::image('images/shortcut/company.png') . '<br />' . __('companies')) . '</li>';
	if(Arr::get($configModule, 'contact')) echo '<li>' . HTML::anchor('contacts', HTML::image('images/shortcut/contacts.png') . '<br />' . __('contacts')) . '</li>';
	if(Arr::get($configModule, 'card')) echo '<li>' . HTML::anchor('cards', HTML::image('images/shortcut/card.png') . '<br />' . __('cards')) . '</li>';
	
	if(Arr::get($configModule, 'event')) echo '<li>' . HTML::anchor('eventlog', HTML::image('images/shortcut/note_view.png') . '<br />' . __('eventlog')) . '</li>';
	if(Arr::get($configModule, 'queue')) echo '<li>' . HTML::anchor('queue', HTML::image('images/shortcut/data_out.png') . '<br />' . __('queue.short')) . '</li>';

	if(Arr::get($configModule, 'user')) echo '<li>' . HTML::anchor('users', HTML::image('images/shortcut/users.png') . '<br />' . __('users')) . '</li>';
	if(Arr::get($configModule, 'settings')) echo '<li>' . HTML::anchor('settings', HTML::image('images/shortcut/setting.png') . '<br />' . __('settings')) . '</li>';
	if(Arr::get($configModule, 'stat')) echo '<li>' . HTML::anchor('stats', HTML::image('images/shortcut/stat.png') . '<br />' . __('stat')) . '</li></ul>';
};
echo '</ul>';

if (false)
{

	echo 'Test';



//$acl=new ACL(true);// создаю 
$acl=new ACL();// создаю 
$acl->load();
echo Debug::vars('31', $acl);



echo Debug::vars('32', Auth::instance()->get_user());


//echo Debug::vars('36', $acl->allowed('acl', 'read')); //не смог я запустить это дело... придется с собой такать указать на id_pep

//echo Debug::vars('35', constants::MAX_VALUE, constants::DANGER);



}