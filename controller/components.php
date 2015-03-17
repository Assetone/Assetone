<?php
// components.php
// Datum: 01.03.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if(isset($_GET["show"]))
{
	$sqlManager = initializeSQLManager($settingsManager);
	
	echo json_encode(mysqli_fetch_assoc($sqlManager->query("SELECT * FROM components;")));
}

if (isset($_GET["new"]))
{
	
}

function initializeSQLManager($settingsManager)
{
	$dbConfig = $settingsManager->Get("dbConfig");
	return new SQLManager($dbConfig["username"], $dbConfig["userpassword"], "assetone");
}
?>