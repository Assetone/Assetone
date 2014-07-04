<?php
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author darkredz
 */
class ComponentsController extends DooController{

    public function index(){
		Doo::loadClass('class.userMgmt');
		$userMgmt = new userMgmt();

/*		$firstName = $userMgmt->getUserDetails(1, $_SESSION["userDetails"]["B_ID"])["B_Vorname"];
		$lastName = $userMgmt->getUserDetails(1, $_SESSION["userDetails"]["B_ID"])["B_Nachname"];
		$groupName = $userMgmt->getUserDetails(2, $_SESSION["userDetails"]["B_ID"])["Bg_Bezeichnung"];
		$lastLoginTimestamp = $userMgmt->getUserDetails(1, $_SESSION["userDetails"]["B_ID"])["B_LastLogin"];
*/

		$firstName = $userMgmt->getUserDetails(1, 1)["B_Vorname"];
		$lastName = $userMgmt->getUserDetails(1, 1)["B_Nachname"];
		$groupName = $userMgmt->getUserDetails(2, 1)["Bg_Bezeichnung"];
		$lastLoginTimestamp = $userMgmt->getUserDetails(1, 1)["B_LastLogin"];

		/* Get date and time from login timestamp */
		preg_match("/([0-9]{4}-[0-9]{2}-[0-9]{2})/", $lastLoginTimestamp, $lastLoginDate);
		preg_match("/([0-9]{2}:[0-9]{2})/", $lastLoginTimestamp, $lastLoginTime);

		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['page']['title'] = 'Komponenten';
		$this->data['user']['name'] = "$firstName $lastName";
		$this->data['user']['type'] = "$groupName";
		$this->data['user']['lastlogin_ddmmyy'] = date("d.M Y", strtotime($lastLoginDate[0]));
		$this->data['user']['lastlogin_hhmm'] = $lastLoginTime[0];
		$this->data['template'] = "components/index";
		
		$this->render('index', $this->data,true);
	}
	
	public function getComponents(){
		Doo::loadModel('component');
        $component = new component;
		echo '{"data": ' . json_encode($this->utf8_encode_all($component->getComponents())). '}';
		    
	}
	public function getComponentType(){
		Doo::loadModel('componentType');
        $componentType = new componentType;
		echo '{"data": ' . json_encode($this->utf8_encode_all($componentType->getComponentType())). '}';
		    
	}
	public function getDistributors(){
		Doo::loadModel('distributor');
        $distributor = new distributor;
		echo '{"data": ' . json_encode($this->utf8_encode_all($distributor->getDistributors())). '}';
		    
	}

	public function insertComponents(){
		
		Doo::loadModel('component');
        $component = new component;
        if(isset($this->params[0])) {
		$component -> K_Name = $this->params[0] ;
		$component -> K_Art = $this->params[1];
		$component -> K_Einkaufsdatum = $this->params[2];
		$component -> K_Hersteller = $this->params[3];
		$component -> K_Gewaehrleistung = $this->params[4];
		$component -> L_ID = $this->params[5];
		$component -> R_ID = $this->params[6];
		} else {
		$component -> K_Name = $this->params['K_Name'] ;
		$component -> K_Art = $this->params['K_Art'];
		$component -> K_Einkaufsdatum = $this->params['K_Einkaufsdatum'];
		$component -> K_Hersteller = $this->params['K_Hersteller'];
		$component -> K_Gewaehrleistung = $this->params['K_Gewaehrleistung'];
		$component -> L_ID = $this->params['L_ID'];
		$component -> R_ID = $this->params['R_ID'];
		}
		$result = Doo::db()->insert($component);
	}
	
	public function getRooms(){
		Doo::loadModel('room');
        $room = new room;
		echo '{"data": ' . json_encode($this->utf8_encode_all($room->getRooms())). '}';
		    
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