<?php

class dbcon{
	public $dbhost;
	public $dbuser;
	public $dbpass;
	public $dbname;
	public $conn;

	function __construct(){
		$this-> conn = new mysqli('localhost','root','','CedHosting');
		if($this-> conn-> connect_error){
			die("Connection failed: " . $conn->connect_error);
			echo ("notconnected");
		}
	}
}
?>