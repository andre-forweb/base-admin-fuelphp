<?php
namespace Controller;

class Base extends \Controller
{
	protected $pageData;
	
	public function before()
	{
		$this->pageData = array(
			'title' => 'Exemplo',
			'baseUrl' => \Config::get('base_url')
		);
		
		/*
		\Asset::css(array('jquery-ui-1.10.3.custom.min.css', 'bootstrap.min.css', 'style.css'), array(), 'css');
		
		\Asset::js(array('jquery-1.10.2.min.js', 'jquery.migrate.js', 'bootstrap.min.js', 'jquery.ui-1.10.3.js', 'jquery.mousewheel-3.0.6.pack.js', 'jquery.metadata.js', 'jquery.validate.min.js', 'spin.min.js', 'rules.js'), array(), 'js');
		
		$uri = \Uri::segments();
		
		if(!isset($uri[0]) || (isset($uri[0]) && $uri[0] != 'login')){
			if(!\Auth::check()){
				\Session::set('urlRedirect', \Uri::current());
				\Response::redirect('login');
			}
			if(\Session::get('resetPasswd', false) && (!isset($uri[0]) || (isset($uri[0]) && $uri[0] != 'alterar-senha'))){
				\Response::redirect('alterar-senha');
			}
		} else {
			if($urlRedirect = \Session::get('urlRedirect', false)){
				$this->pageData['urlRedirect'] = $urlRedirect;
				\Session::delete('urlRedirect');
			}
		}
		*/
	}
	
	/*
	public function after($response)
	{
		return \Response::forge($response, 200, array(
			'Cache-Control' => 'no-cache, max-age=0, must-revalidate',
			'Expires' => 'Mon, 01 Jul 1988 05:00:00 GMT',
			'Pragma' => 'no-cache'
		));
	}
	*/

	protected function forgeViews($content, $data)
	{
		return array(
			'header' => \View::forge('include/header', $data),
			'content' => \View::forge($content, $data),
			'footer' => \View::forge('include/footer', $data)
		);
	}
}
