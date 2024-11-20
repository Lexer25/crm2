<?php defined('SYSPATH') or die('No direct script access.');
/*20.11.2024 Этот файл является основой всех контроллеров.
* сюда в раздел befor надо добавить проверку авторизации. Если неуспешно - то переход на ввод логина
* из других контроллеров авторизацию можно будет убрать.
*/

//class Controller_Template extends Controller_Template {
abstract class Controller_Template extends Kohana_Controller_Template {

	   public $template = 'template';
	
	public $siteName = 'Lumia Shop';
 
    public function before() {
        parent::before();
        View::set_global('title', 'Сайт');				
        View::set_global('description', 'Самый лучший сайт');
        $this->template->content = '';
        $this->template->styles = array('style'); // файлы стилей
        $this->template->scripts = array('jquery'); // файлы js
		//echo Debug::vars('17');exit;
    }
	
}

