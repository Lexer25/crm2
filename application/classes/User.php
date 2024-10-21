<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Class User - информация о текущем авторизованном пользователей.
 * 
 * 
 */
Class User {

	public $id_pep;
	public $id_org;
	public $id_orgctrl;
	public $login;
	public $role;
	

	
	public function __construct($default = array())
	{
		
		$_config = Kohana::$config->load('auth');
		$_session = Session::instance($_config['session_type']);
		$ddd = $_session->get($_config['session_key'], $default);
		
		$this->id_pep=Arr::get($ddd, 'ID_PEP');
		$this->id_org=Arr::get($ddd, 'ID_ORG');
		$this->id_orgctrl=Arr::get($ddd, 'ID_ORGCTRL');
		$this->login=Arr::get($ddd, 'LOGIN');
		$this->role=Arr::get($ddd, 'ROLE');
	}

	
	

} // End User
