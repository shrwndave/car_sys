<?php

class Connector{
	
	//database variables
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	
	protected $conn;
	function __construct(){
		try {
			$this->conn = new PDO("mysql:host=$this->servername;dbname=system", $this->username, $this->password);
			// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
}


