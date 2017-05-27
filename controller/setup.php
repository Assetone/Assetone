<?php
// setup.php
// Datum: 29.01.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if (isset($_GET["importdb"]))
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

if(isset($_GET["createDefaultUser"]))
{
	// Are all arguments given
	if (!isset($_POST["defaultusername"]) || !isset($_POST["defaultuserpassword"]) || !isset($_POST["administratorsusergroup"]))
		return;
	
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Create administrators usergroup
	$sqlManager->query("INSERT INTO usergroup (name) VALUES ('".$sqlManager->prepareValue($_POST["administratorsusergroup"])."');");
	
	if ($row = mysqli_fetch_assoc($sqlManager->query("SELECT ID FROM usergroup WHERE name = '".$sqlManager->prepareValue($_POST["administratorsusergroup"])."';")))
	{
		// Create default user
		$result = $sqlManager->query("INSERT INTO user (name, password, ugID) VALUES ('".
			$sqlManager->prepareValue($_POST["defaultusername"])."', '".
			$sqlManager->prepareValue(hash("SHA512", $_POST["defaultuserpassword"]))."', ".
			$row["ID"].");");
		
		if ($result)
			echo "successfull";
	}
}

function initializeSQLManager($settingsManager)
{
	$dbConfig = $settingsManager->Get("dbConfig");
	return new SQLManager($dbConfig["username"], $dbConfig["userpassword"], "assetone");
}
?>