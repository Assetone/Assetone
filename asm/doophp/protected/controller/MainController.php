<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MainController extends DooController{

    public function index(){
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = '&Uuml;bersicht';
		$this->data['user']['name'] = 'Phillipp Busch';
		$this->data['user']['type'] = 'Systembetreuer';
		$this->data['template'] = "main/index";
		
		
		
		Doo::loadModel('user');
		$u = new User;
		$u->B_Vorname = "Udo";
		$result = Doo::db()->find($u, array('limit'=>2));
		
		
		var_dump($result);
		$this->data['user']['data'] = "test";
		$this->render('index', $this->data,true);
	}
    
	
	
}
?>