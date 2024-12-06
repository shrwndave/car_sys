<?php
	//import database connector
	require_once 'connector.php';
	
	//-------------------------------//
	//--class for login page active--//
	//-------------------------------//
	class authenticationModel extends Connector{
		function __construct(){
			parent::__construct();
		}
		
		//-------------------------------//
		//--  function starts here      --//
		function authenticaLogin($post){
			//prepare the sql
			$sql = "SELECT * FROM `users` WHERE user_email = ? and user_password = ?";
			//prepare query
			$query = $this->conn->prepare($sql);
			
			//bind the query parameter
			$query->bindParam(1, $post['username']);
			$query->bindParam(2, $post['password']);
			//execute query
			$query->execute();
			//return
			return $query->fetch(PDO::FETCH_ASSOC);
		}
	}
?>