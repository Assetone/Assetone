<?php
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author darkredz
 */
class SettingsController extends DooController{



    public function index(){
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = 'Einstellungen';
		$this->data['user']['name'] = 'Phillipp Busch';
		$this->data['user']['type'] = 'Systembetreuer';
		$this->data['template'] = "settings/index";
		
		$this->render('index', $this->data,true);
	}
	

}
?>