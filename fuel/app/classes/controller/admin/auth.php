<?php
namespace Controller;

class Admin_Auth extends Admin_Base
{
	public function post_login()
	{
		$arr = array('status' => 'error', 'info' => 'request', 'token' => \Security::fetch_token());
		
		\Auth::dont_remember_me();
		\Auth::logout();
		
		if(\Input::is_ajax()){
			
			if(\Auth::login(\Input::post('email', ''), \Input::post('password', ''))){
				
				if(\Input::post('remember', false)){
					\Auth::remember_me();
				} else {
					\Auth::dont_remember_me();
				}
				
				$arr['status'] = 'ok';
				$arr['info'] = 'logged';
				
			} else {
				$arr['info'] = 'invalid-user';
			}
			
		}
		
		return \Response::forge(json_encode($arr), 200, array('Content-Type' => 'application/json'));
	}
	
	public function post_senha()
	{
		$arr = array('status' => 'error', 'info' => 'request', 'token' => \Security::fetch_token());
		
		if(\Input::is_ajax()){
			
			if($email = \Input::post('email', false)){
				
				if($user = \Model\Auth_User::find_by_email($email)){
					$hash = str_replace('/', '-', \Auth::instance()->hash_password(Str::random()).$user->id);
					\Auth::update_user(
						array(
							'lostpassword_hash' => $hash,
							'lostpassword_created' => time()
						),
						$user->username
					);
					
					$emailData = array('userName' => $user->name, 'urlReset' => \Uri::create('admin/login/senha/' . $hash));
					
					\Package::load('email');
					$email = \Email::forge();
					$email->html_body(\View::forge('email/reset-senha', $emailData));
					$email->subject('Recuperar senha');
					
					$from = \Config::get('email.defaults.from');
					$email->from($from['email'], $from['name']);
					$email->to($user->email, $user->name);
					
					try{
						$email->send();
						$arr['status'] = 'ok';
						$arr['info'] = $user->email;
					}
					catch(\EmailValidationFailedException $e){
						$arr['info'] = 'invalid-email';
					}
					catch(\Exception $e){
						logger(\Fuel::L_ERROR, '*** Error sending email ('.__FILE__.'#'.__LINE__.'): '.$e->getMessage());
						$arr['info'] = 'error-sending-email';
					}
					
				} else {
					$arr['info'] = 'invalid-email';
				}
				
			}
			
		}
		
		return \Response::forge(json_encode($arr), 200, array('Content-Type' => 'application/json'));
	}
	
	public function action_login()
	{
		$this->pageData['title'] = 'Login - ' . $this->pageData['title'];
		
		return \View::forge('auth/login', $this->pageData);
	}
	
	public function action_logout()
	{
		\Auth::dont_remember_me();
		\Auth::logout();
		
		return \Response::redirect('auth/login');
	}
	
	public function action_senha($hash = NULL)
	{
		if($hash !== null){
			$user = substr($hash, 44);
			
			if($user = \Model\Auth_User::find_by_id($user)){
				if(isset($user->lostpassword_hash) and $user->lostpassword_hash == $hash and time() - $user->lostpassword_created < 86400){
					\Auth::update_user(
						array(
							'lostpassword_hash' => null,
							'lostpassword_created' => null
						),
						$user->username
					);
					
					if(\Auth::force_login($user->id)){
						Session::set('resetPasswd', $user->id);
						\Response::redirect('admin/alterar-senha/');
					}
				}
			}
		}
		
		\Response::redirect('admin/login/');
	}
}