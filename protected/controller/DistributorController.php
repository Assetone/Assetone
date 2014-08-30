<?php
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author darkredz
 */
class DistributorController extends DooController{

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
		$this->data['page']['title'] = 'Lieferanten';
		$this->data['user']['name'] = "$firstName $lastName";
		$this->data['user']['type'] = "$groupName";
		$this->data['user']['lastlogin_ddmmyy'] = date("d.M Y", strtotime($lastLoginDate[0]));
		$this->data['user']['lastlogin_hhmm'] = $lastLoginTime[0];
		$this->data['template'] = "distributor/index";
		
		$this->render('index', $this->data,true);
	}
	public function getDistributor(){
		Doo::loadModel('distributor');
        $distributor= new distributor;
		echo '{"data": ' . json_encode($this->utf8_encode_all($distributor->getDistributors())). '}';
		    
	}
	public function insertDistributor(){
		Doo::loadModel('distributor');

        $distributor = new distributor;
		if (isset($this->params[0])) {
			$distributor -> L_Name = $this->params[0];
			$distributor -> L_Strasse_Nr = $this->params[1];
			$distributor -> L_Plz = $this->params[2];
			$distributor -> L_Ort = $this->params[3];
			$distributor -> L_Telefon = $this->params[4];
			$distributor -> L_Fax = $this->params[5];
			$distributor -> L_Mail = $this->params[6];
		} else {
			$distributor -> L_Name = $this->params['L_Name'];
			$distributor -> L_Strasse_Nr = $this->params['L_Strasse_Nr'];
			$distributor -> L_Plz = $this->params['L_Plz'];
			$distributor -> L_Ort = $this->params['L_Ort'];
			$distributor -> L_Telefon = $this->params['L_Telefon'];
			$distributor -> L_Fax = $this->params['L_Fax'];
			$distributor -> L_Mail = $this->params['L_Mail'];
		}
		$result = Doo::db()->insert($distributor);
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