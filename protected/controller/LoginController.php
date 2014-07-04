<?php
	if(!isset($_SESSION)) {
		session_start();
	}
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class LoginController extends DooController{

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
		$this->data['page']['title'] = 'Login';
		$this->data['user']['name'] = "$firstName $lastName";
		$this->data['user']['type'] = "$groupName";
		$this->data['user']['lastlogin_ddmmyy'] = date("d.M Y", strtotime($lastLoginDate[0]));
		$this->data['user']['lastlogin_hhmm'] = $lastLoginTime[0];

		$this->data['template'] = "login/index";
		
		$this->render('index', $this->data,true);
	}
    
	
	
}
?>
