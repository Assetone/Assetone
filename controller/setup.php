<?php
// setup.php
// Datum: 29.01.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if (isset($_GET["import"]))
{
	// Are all arguments given
	if (!isset($_POST["username"]) || !isset($_POST["userpassword"]))
		return;
	
	// Open database connection
	$sqlManager = new SQLManager($_POST["username"], $_POST["userpassword"]);
	
	// Read database setup file
	$databaseSetupFile = fopen("../setupfiles/database.sql", "r");
	$databaseSetupSQL = fread($databaseSetupFile, filesize("../setupfiles/database.sql"));
	fclose($databaseSetupFile);
	
	// Import
	if ($sqlManager->query($databaseSetupSQL, true))
		echo "successfull";
	
	// Save DB-User
	if(isset($_POST["saveasdefaultuser"]))
		$settingsManager->Set("dbConfig", ["username" => $_POST["username"], "userpassword" => $_POST["userpassword"]]);
}
?>