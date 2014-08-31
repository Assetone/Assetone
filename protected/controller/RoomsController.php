<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class RoomsController extends DooController{

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
		$this->data['page']['title'] = 'R&auml;ume';
		$this->data['user']['name'] = "$firstName $lastName";
		$this->data['user']['type'] = "$groupName";
		$this->data['user']['lastlogin_ddmmyy'] = date("d.M Y", strtotime($lastLoginDate[0]));
		$this->data['user']['lastlogin_hhmm'] = $lastLoginTime[0];
		$this->data['template'] = "rooms/index";
		
		$this->renderc('index', $this->data,true);
	}
	
	public function insertRoom(){
		Doo::loadModel("room");
		$room = new room;
		
		$room->R_Bezeichnung = $this->params['name'];
		
		Doo::db()->insert($room);
	}
	
	public function getRooms(){
		Doo::loadModel('room');
        $room = new room;
		echo '{"data": ' . json_encode($this->utf8_encode_all($room->getRooms())). '}';
		    
	}
	public function getRoomInfo(){
		
		Doo::loadModel('room');
        $room = new room;
		echo '{"data": ' . json_encode($this->utf8_encode_all($room->getRooms($id))). '}';
		    
	}
	public function getRoomComponents(){
		$name = $this->params['name'];
		Doo::loadModel('component');
        $component = new component;
		echo '{"data": ' . json_encode($this->utf8_encode_all($component->getRoomComponents($name))). '}';
		    
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