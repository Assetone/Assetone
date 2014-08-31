<?php
Doo::loadCore('db/DooSmartModel');
class component extends DooSmartModel{
    public $K_ID;
    public $K_Name;
    public $K_Art_Bezeichnung;
	public $K_Art;
	public $K_Einkaufsdatum;
	public $K_Hersteller;
	public $K_Gewaehrleistung;
	public $L_ID;
	public $R_ID;
	
	public $_table = 'Komponente';
    public $_primarykey = 'K_ID';
    public $_fields = array('K_ID', 'K_Name', 'K_Art_Bezeichnung', 'K_Art', 'K_Einkaufsdatum', 'K_Hersteller', 'K_Gewaehrleistung', 'L_ID' , 'R_ID');

	
	public function getComponents()
	{
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$smt = Doo::db()->query("SELECT `K_ID` , `K_Name` , K_Art_Bezeichnung, count(*) as count 
FROM `Komponente`
JOIN Komponentenarten ON K_ART = K_ART_ID group by K_Name");
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
	public function getRoomComponents($name)
	{
		if(!$name) $name = "'%'";
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$str = "SELECT `K_ID` , K_Art_Bezeichnung, `K_Name` , `L_Name` , `R_Bezeichnung` , `K_Einkaufsdatum` , `K_Hersteller` , `K_Gewaehrleistung` , COUNT( * ) AS count FROM `Komponente`
						JOIN Komponentenarten
						JOIN Lieferant
						JOIN Raum ON Komponente.K_Art = Komponentenarten.K_Art_ID AND Komponente.R_ID = Raum.R_ID AND Komponente.L_ID = Lieferant.L_ID
						WHERE Raum.R_Bezeichnung = '".$name."' 
						AND NOT
							EXISTS (SELECT NULL FROM Subkomponenten WHERE Sub_Nr = Komponente.K_ID)
						GROUP BY `K_Name` , L_Name";
		$smt = Doo::db()->query($str);
		$tables = $smt->fetchAll();
		
		return $tables;
			   
	}
	
	public function getRoomPcs($id)
	{

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$str = "SELECT COUNT( * ) as pcs
FROM  `Komponente` 
LEFT JOIN Komponentenarten ON Komponentenarten.K_Art_ID = Komponente.K_Art
WHERE R_ID =".$id."
AND K_Art_Bezeichnung =  'PC'";

		$smt = Doo::db()->query($str);
		$tables = $smt->fetchAll();
		return $tables;
			   
	}
	public function getRoomBeamers($id)
	{

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];
		$str = "SELECT COUNT( * ) as beamers 
FROM  `Komponente` 
LEFT JOIN Komponentenarten ON Komponentenarten.K_Art_ID = Komponente.K_Art
WHERE R_ID =".$id."
AND K_Art_Bezeichnung =  'Beamer'";

		$smt = Doo::db()->query($str);
		$tables = $smt->fetchAll();
		return $tables;
			   
	}
}
?>


