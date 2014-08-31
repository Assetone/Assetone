<?php
/**
@TODO: Move Logic to controller; replace query() with find()
**/
Doo::loadCore('db/DooSmartModel');
class room extends DooSmartModel{
    public $R_ID;
    public $R_Bezeichnung;
	
    public $_table = 'Raum';
    public $_primarykey = 'R_ID';
    public $_fields = array('R_ID', 'R_Bezeichnung');

	public function getRooms()
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT  `R_ID` ,  `R_Bezeichnung` 
FROM  Raum ");
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
	public function getRoomInfo($id)
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT  * 
FROM  Raum WHERE R_ID =".$id);
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
	
}
?>