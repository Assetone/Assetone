<?php
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author darkredz
 */
class SettingsController extends DooController{
	var $users;
	

    public function index(){
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = 'Einstellungen';
		$this->data['user']['name'] = 'Phillipp Busch';
		$this->data['user']['type'] = 'Systembetreuer';
		$this->data['template'] = "settings/index";
		
		$this->render('index', $this->data,true);
	}
	
	public function getUsers(){
		Doo::loadModel('user');
        $user = new user;
		echo '{"data": ' . json_encode($this->utf8_encode_all($user->getUsers())). '}';;
		    
	}
	function utf8_encode_all($dat) // -- It returns $dat encoded to UTF8 
	{ 
	  if (is_string($dat)) return utf8_encode($dat); 
	  if (!is_array($dat)) return $dat; 
	  $ret = array(); 
	  foreach($dat as $i=>$d) $ret[$i] = $this->utf8_encode_all($d); 
	  return $ret; 
	} 
	
	
	
}
	


?>