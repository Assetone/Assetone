<?php
class componentType{
    public $K_Art_Bezeichnung ="test";
	
    public $_table = 'Komponentenarten';
    public $_primarykey = 'K_Art_ID';
    public $_fields = array( '$K_Art_Bezeichnung');

	public function getComponentType()
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT `K_Art_ID` , `K_Art_Bezeichnung` 
FROM `Komponentenarten`");
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
}
?>