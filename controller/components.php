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
	// Are all arguments given
	if (!isset($_POST["componentname"]) || !isset($_POST["componenttype"]))
		return;
	
	$sqlManager = initializeSQLManager($settingsManager);
	
	$queryResult = $sqlManager->query("INSERT INTO components (name, ctID) VALUES ('".
		$sqlManager->prepareValue($_POST["componentname"])	."', ".
		$sqlManager->prepareValue($_POST["componenttype"]) .");");
}

if (isset($_GET["componenttypes"]))
{
	$sqlManager = initializeSQLManager($settingsManager);
	
	$queryResult = $sqlManager->query("SELECT ID, name FROM componenttypes;");
	$resultTable = [];
	
	while ($row = mysqli_fetch_assoc($queryResult))
		$resultTable[] = $row;
	
	echo json_encode($resultTable);
}

function initializeSQLManager($settingsManager)
{
	$dbConfig = $settingsManager->Get("dbConfig");
	return new SQLManager($dbConfig["username"], $dbConfig["userpassword"], "assetone");
}
?>