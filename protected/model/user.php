<?php
Doo::loadCore('db/DooSmartModel');
class user extends DooSmartModel{
    public $B_ID;
    public $B_Vorname;
    public $B_Nachname;
    public $B_email;
    public $Bg_ID;
	public $B_LastLogin;
	public $B_Resethash;
	public $B_Username;
	public $B_Passwort;
	
    public $_table = 'Benutzer';
    public $_primarykey = 'B_ID';
    public $_fields = array('B_ID', 'B_Vorname', 'B_Nachname', 'B_email', 'Bg_ID', 'B_LastLogin', 'B_Resethash','B_Username','B_Passwort');
	
	function __construct(){
		parent::$className = __CLASS__;
	}


/** This is logic and belongs in the controller
 *  query should be replaced with find()
 
	public function getUsers()
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT `B_ID`,`B_Vorname`,`B_Nachname`,`B_email`,`Bg_Bezeichnung`,`B_LastLogin`, 'B_Username' FROM  `Benutzer` left join Benutzergruppen on Benutzer.Bg_ID = Benutzergruppen.Bg_ID");
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
**/	
	
	
}
?>