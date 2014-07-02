<?php
class user{
    public $B_ID;
    public $B_Vorname;
    //public $B_Nachname;
    //public $B_email;
    //public $Bg_ID;
	//public $B_LastLogin;
	//public $B_Resethash;
	
    public $_table = 'Benutzer';
    public $_primarykey = 'B_ID';
    public $_fields = array('B_ID', 'B_Vorname');
	//, 'B_Nachname', 'email', 'Bg_ID', 'B_LastLogin', 'B_Resethash'
}
?>