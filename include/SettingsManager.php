<?php
// setup.php
// Datum: 15.03.2015

$settingsManager = SettingsManager::getInstance();

class SettingsManager
{
	private static $instance = null;
	
	private $standardSettingsFile;
	private $settings = [];
	
	private function __construct()
	{
		// Build settings-file-path
		$docPath = $_SERVER["PHP_SELF"];
		$docPath = substr($docPath, 0, strrpos($docPath, "/"));
		$this->standardSettingsFile = $_SERVER["DOCUMENT_ROOT"].$docPath."/../include/settings.ini";
		
		$this->loadSettings();
	}
	
	public static function getInstance()
	{
		// Create a new instance if no exists
		if (self::$instance == null)
			self::$instance = new SettingsManager();
		
		return self::$instance;
	}
	
	public function Get($key)
	{
		return $this->settings[$key];
	}
	
	public function Set($key, $value)
	{
		$this->settings[$key] = $value;
	}
	
	private function loadSettings()
	{
		if (!file_exists($this->standardSettingsFile))
		{
			$settingsFile = fopen($this->standardSettingsFile, "x+");
			fclose($settingsFile);
		}
		
		$this->settings = parse_ini_file($this->standardSettingsFile);
		
		var_dump($this->settings);
	}
	
	private function saveSettings()
	{
		$settingsFile = fopen($this->standardSettingsFile, "w");
		$this->writeIniFile($this->settings, $settingsFile);
		
		fclose($settingsFile);
	}
	
	private function writeIniFile(&$setting, &$fileHandle, $settingKey = null)
	{
		if (is_array($setting))
		{
			foreach($setting as $key => &$value)
			{
				if($settingKey == null)
				{
					if (is_int($key))
						$key = $settingKey."[]";
					else
						$key = $settingKey."[\"".$key."\"]";
				}
				
				$this->writeIniFile($value, $fileHandle, $key);
			}
		}
		else
		{
			fwrite($fileHandle, "$settingKey = $setting;");
		}
	}
	
	public function __destruct()
	{
		$this->saveSettings();
	}
}
?>