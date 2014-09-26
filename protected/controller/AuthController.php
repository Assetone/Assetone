<?php
//session_start();
//$_SESSION['loggedin'] = false;
class AuthController extends DooController{
    function auth(){
		if(!isset($_SESSION))
			session_start();
		$_SESSION['loggedin'] = true;
		
        if($_SESSION['loggedin'] !== true) {
            return array('/login', 302);
		} else {
                //do something, but return nothing
		}
    }
	
	public function login(){
		if(isset($this->params['user']) && isset($this->params['pass']) ){

			//check User existance in DB, if so start session and redirect to home page.
			if(!empty($this->params['user']) && !empty($this->params['pass'])){
				$user = Doo::loadModel('User', true);
				$user->username = $this->params['user'];
				$user->pwd = $this->params['pass'];
				$user = $this->db()->find($user, array('limit'=>1));
				
				if($user){
					session_start();
					unset($_SESSION['user']);
					$_SESSION['user'] = array(
											'id'=>$user->id, 
											'username'=>$user->username
										);
					return Doo::conf()->APP_URL;
				}
			}
		}
		
		
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = 'Failed to login!';
		$this->data['template'] = "login/index";
		$this->data['user']['name'] = "nix";
		$this->data['user']['type'] = "weniger";
		
		$this->renderc('login/index', $this->data);
	}
	
	public function logout(){
		session_start();
		unset($_SESSION['user']);
		session_destroy();
		return Doo::conf()->APP_URL;
	}
}