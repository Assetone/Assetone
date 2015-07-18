<?php
// index.php
// Datum: 18.07.2015

include ("../include/Controller.php");

class IndexController extends Controller
{
	public function login()
	{
		$username = $_POST["username"];
		$userpassword = $_POST["userpassword"];
		
		$_SESSION["currentUser"]["logedin"] = true;
		
		$_SESSION["currentUser"]["name"] = $username;
		$_SESSION["currentUser"]["role"] = "Systembetreuer";
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

new IndexController();
?>