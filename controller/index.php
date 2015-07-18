<?php
// index.php
// Datum: 18.07.2015

include ("../include/Controller.php");
include ("../include/SQLManager.php");
include ("../include/SettingsManager.php");

class IndexController extends Controller
{
	public function login()
	{
		// Open database connection
		$sqlManager = initializeSQLManager(SettingsManager::getInstance());
		
		// Get user
		$queryResult = $sqlManager->query("SELECT u.ID, ug.name AS userrole FROM user AS u ".
			"JOIN usergroup AS ug ON ug.ID = u.ugID ".
			"WHERE ".
			"u.name ='".$sqlManager->prepareValue($_POST["username"])."' AND ".
			"u.password ='".$sqlManager->prepareValue(hash("SHA512", $_POST["userpassword"]))."';");
		
		if ($row = mysqli_fetch_assoc($queryResult))
		{
			$_SESSION["currentUser"]["logedin"] = true;
			
			$_SESSION["currentUser"]["name"] = $_POST["username"];
			$_SESSION["currentUser"]["role"] = $row["userrole"];
		}
	}
	
	public function logout()
	{
		$_SESSION["currentUser"]["logedin"] = false;
		session_unset();
		session_destroy();
	}
	
	public function getCurrentUser()
	{
		if (isset($_SESSION["currentUser"]))
			return $_SESSION["currentUser"];
	}
}

function initializeSQLManager($settingsManager)
{
	$dbConfig = $settingsManager->Get("dbConfig");
	return new SQLManager($dbConfig["username"], $dbConfig["userpassword"], "assetone");
}

new IndexController();
?>