<?php
class Komponentenart{
    public $K_Art_ID;
    public $K_Art_Bezeichnung;
	
    public $_table = 'Komponentenarten';
    public $_primarykey = 'K_Art_ID';
    public $_fields = array('K_Art_ID', '$K_Art_Bezeichnung');

}
?>