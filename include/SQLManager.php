<?php
// SQLManager.php
// Datum: 29.01.2015

class SQLManager
{
	private $connection;

	public function __construct($username, $userpw, $database = "")
	{
		$this->connection = new mysqli("localhost", $username, $userpw, $database);
	}
	
	public function query($sql, $multiquery = false)
	{
		if ($multiquery == true)
			return $this->connection->multi_query($sql);
		else		
			return $this->connection->query($sql);
	}
	
	public function prepareValue($value)
	{
		return $this->connection->real_escape_string($value);
	}
	
	public function __destruct()
	{
		$this->connection->Close();
	}
}
?>