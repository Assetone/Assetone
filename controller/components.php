<?php
// components.php
// Datum: 01.03.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if(isset($_GET["show"]))
{
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Get components
	$queryResult = $sqlManager->query("SELECT * FROM components;");
	$resultTable = [];
	
	while ($row = mysqli_fetch_assoc($queryResult))
		$resultTable[] = $row;
	
	echo json_encode($resultTable);
}

if (isset($_GET["new"]))
{
	// Are all arguments given
	if (!isset($_POST["componentname"]) || !isset($_POST["componenttype"]) || !isset($_POST["room"]))
		return;
	
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Insert new component
	$queryResult = $sqlManager->query("INSERT INTO components (name, ctID, rID) VALUES ('".
		$sqlManager->prepareValue($_POST["componentname"]) ."', ".
		$sqlManager->prepareValue($_POST["componenttype"]) .", ".
		$sqlManager->prepareValue($_POST["room"]) .");");
}

if (isset($_GET["componenttypes"]))
{
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Get componenttypes
	$queryResult = $sqlManager->query("SELECT ID, name FROM componenttypes;");
	$resultTable = [];
	
	while ($row = mysqli_fetch_assoc($queryResult))
		$resultTable[] = $row;
	
	echo json_encode($resultTable);
}

if (isset($_GET["rooms"]))
{
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Get rooms
	$queryResult = $sqlManager->query("SELECT ID, CONCAT(name, ', ', description) as room FROM rooms;");
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