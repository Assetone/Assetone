<?php
class Komponente{
    public $K_ID;
    public $K_Name;
	public $K_Art_Bezeichnung;
	
    public $_table = 'Komponente';
    public $_primarykey = 'K_ID';
    public $_fields = array('K_ID', 'K_Name');

}
?>