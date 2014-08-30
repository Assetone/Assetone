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
	
		Doo::loadModel('user');
		$u = new User;
		$u->B_Vorname = 'Udo';
		$result = Doo::db()->find($u, array('limit'=>2));


		
		$results = array();
		$new = array();
		
		foreach($result as $row) {
		
       		foreach($this as $key => $value) {
           		$new[] = $value;
       		}
             
        }
             
        $results[] = $new;
        
        
		$this->data['data'] = json_encode($results);
        
        
		/*
		$file = '/var/www/protected/controller/data.txt';

		$myfile = fopen($file, "w");

		$txt = json_encode($result);
		fwrite($myfile, $txt);

		fclose($myfile);*/

		
		
		
		
		$this->render('index', $this->data,true);
	}
	public function getData(){
		Doo::loadModel('user');
		$u = new User;
		$u->B_Vorname = 'Udo';
		$result = Doo::db()->find($u, array('limit'=>2));
	}
}
?>