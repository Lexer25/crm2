<?php defined('SYSPATH') or die('No direct script access.');

    class Controller_Login
        extends Controller {
			
	public function before()
	{
			
	}
	

        public function action_index() {
			
		
            if (Auth::instance()->logged_in()) {
                $this->redirect('/');
            }
	
            if (Arr::get($_POST, 'hidden') == 'form_sent') {
				
                if (Auth::instance()->login(Arr::get($_POST, 'username'), Arr::get($_POST, 'password'), Arr::get($_POST, 'remember'))
                        //->login(Arr::get($_POST, 'username', 'admin'), Arr::get($_POST, 'password', '333'), Arr::get($_POST, 'remember'))
                        //->force_login(Arr::get($_POST, 'username'), Arr::get($_POST, 'password'), Arr::get($_POST, 'remember'))
                        
                ) {
                   $user = Auth::instance()->get_user();
                
                   Session::instance()
						->set('language', 'ru-ru')
						->set('listsize', Kohana::$config->load('config_newcrm')->table_view_max_contact))
						->set('org_control', Arr::get($user, 'ID_PEP'));
						;
						
						//ACL::instance();
						//echo Debug::vars('32', ACL::instance()); exit;	
                    $this->redirect('/');
                }
                
            }
			
            //$this->request->response = View::factory('login');
            $this->response->body(View::factory('login'));
           
        }

    }

