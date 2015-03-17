<?php
// components.php
// Datum: 01.03.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if(isset($_GET["show"]))
{
	$sqlManager = initializeSQLManager($settingsManager);
	
	$queryResult = $sqlManager->query("SELECT * FROM components;");
	$resultTable = [];
	
	while ($row = mysqli_fetch_assoc($queryResult))
		$resultTable[] = $row;
	
	echo json_encode($resultTable);
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