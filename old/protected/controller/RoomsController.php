<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class RoomsController extends DooController{

    public function index(){
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = 'R&auml;ume';
		$this->data['user']['name'] = 'Phillipp Busch';
		$this->data['user']['type'] = 'Systembetreuer';
		$this->data['template'] = "rooms/index";
		
		$this->render('index', $this->data,true);
	}
}
?>