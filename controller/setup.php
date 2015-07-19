<?php
// setup.php
// Datum: 29.01.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if (isset($_GET["import"]))
{
	// Are all arguments given
	if (!isset($_POST["dbusername"]) || !isset($_POST["dbuserpassword"]))
		return;
	
	// Open database connection
	$sqlManager = new SQLManager($_POST["dbusername"], $_POST["dbuserpassword"]);
	
	// Read database setup file
	$databaseSetupFile = fopen("../setupfiles/database.sql", "r");
	$databaseSetupSQL = fread($databaseSetupFile, filesize("../setupfiles/database.sql"));
	fclose($databaseSetupFile);
	
	// Import
	if ($sqlManager->query($databaseSetupSQL, true))
		echo "successfull";
	
	// Save DB-User
	if(isset($_POST["saveasdefaultdbuser"]))
		$settingsManager->Set("dbConfig", ["username" => $_POST["dbusername"], "userpassword" => $_POST["dbuserpassword"]]);
}
?>