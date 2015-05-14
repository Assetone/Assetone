<?php
// rooms.php
// Datum: 14.05.2015

include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

if(isset($_GET["show"]))
{
	// Open database connection
	$sqlManager = initializeSQLManager($settingsManager);
	
	// Get rooms
	$queryResult = $sqlManager->query("SELECT * FROM rooms;");
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