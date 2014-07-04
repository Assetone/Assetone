<?php
class distributor{
    public $L_ID;
    public $L_Name;
	public $L_Strasse_Nr;
    public $L_Plz;
	public $L_Ort;
    public $L_Telefon;
    public $L_Fax;
	public $L_Mail;
	
    public $_table = 'Lieferant';
    public $_primarykey = 'L_ID';
    public $_fields = array('L_ID', 'L_Name', 'L_Strasse_Nr', 'L_Plz', 'L_Ort', 'L_Telefon', 'L_Mobil', 'L_Fax' , 'L_Mail');

	public function getDistributors()
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT `L_ID` , `L_Name` , `L_Strasse_Nr` , `L_Plz` , `L_Ort` , `L_Telefon` , `L_Fax`, L_Mail FROM `Lieferant`");
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
}
?>