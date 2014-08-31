<?php
//session_start();
//$_SESSION['loggedin'] = false;
class AuthController extends DooController{
    function auth(){
		if(!isset($_SESSION))
			session_start();
		$_SESSION['loggedin'] = true;
		
        if($_SESSION['loggedin'] !== true) {
            return array('/err/login', 404);
		} else {
                //do something, but return nothing
		}
    }
}