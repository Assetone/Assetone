<?php
// Controller.php
// Datum: 13.07.2015

class Controller
{
	private $sqlManager;
	
	public function __construct()
	{
		session_start();
		
		// Open database connection
		$this->sqlManager = $this->initializeSQLManager(SettingsManager::getInstance());
		
		$splitterPosition = strpos($_SERVER["QUERY_STRING"], '&');
		
		if ($splitterPosition)
			$methodName = substr($_SERVER["QUERY_STRING"], 0, $splitterPosition);
		else
			$methodName = substr($_SERVER["QUERY_STRING"], 0);
		
		if (isset($this->customRights))
		{
			if (isset($this->customRights[$methodName]))
			{
				if ($this->customRights[$methodName]())
					echo json_encode($methodName());
				else if ($this->hasRights())
					echo json_encode($methodName());
			}
		}
		else
		{
			if ($this->hasRights())
				echo json_encode($methodName());
		}
	}
	
	private function hasRights($controller, $mehtod)
	{		
		// Get rights
		$queryResult = $this->sqlManager->query("SELECT u.ID, ug.name AS userrole FROM user AS u ".
			"JOIN usergroup AS ug ON ug.ID = u.ugID ".
			"WHERE ".
			"u.name ='".$this->sqlManager->prepareValue($_POST["username"])."' AND ".
			"u.password ='".$this->sqlManager->prepareValue(hash("SHA512", $_POST["userpassword"]))."';");
		
		if ($row = mysqli_fetch_assoc($queryResult))
		{
			$_SESSION["currentUser"]["logedin"] = true;
			
			$_SESSION["currentUser"]["name"] = $_POST["username"];
			$_SESSION["currentUser"]["role"] = $row["userrole"];
		}
		
		return true;
	}
	
	private function initializeSQLManager($settingsManager)
	{
		$dbConfig = $settingsManager->Get("dbConfig");
		return new SQLManager($dbConfig["username"], $dbConfig["userpassword"], "assetone");
	}
}
?>