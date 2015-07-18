<?php
// Controller.php
// Datum: 13.07.2015

class Controller
{
	public function __construct()
	{
		session_start();
		
		$splitterPosition = strpos($_SERVER["QUERY_STRING"], '&');
		
		if ($splitterPosition)
			$methodName = substr($_SERVER["QUERY_STRING"], 0, $splitterPosition);
		else
			$methodName = substr($_SERVER["QUERY_STRING"], 0);
		
		echo json_encode($this->$methodName());
	}
}
?>