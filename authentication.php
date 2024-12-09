<?php
	//import model
	include_once '../model/authenticationModel.php';

	$page_info['page'] = 'login'; //for page that needs to be called
	$page_info['sub_page'] = isset($_GET['sub_page'])? $_GET['sub_page'] : 'login'; //for function to be loaded
		
	try {
		if (isset($_GET['function'])){
			new LoginActive($page_info);
		}else{
			new Login($page_info);
		}		
		
	}catch (Throwable $e){ 
		echo '<h1>ERROR 404</h1>';
		echo $e->getMessage();
	}//end of validation
	class Login{
		//set default page info
		private $page = '';
		private $sub_page = '';
		
		//run function construct
		function __construct($page_info){
			//assign page info
			$this->page = $page_info['page'];
			$this->sub_page = $page_info['sub_page'];
			
			//run the function
			$this->{$page_info['sub_page']}();
		}
		
		//-----------------------------//
		//--   function start here   --//
		function login(){
			include '../views/admin/login.php';
		}
	}

	class LoginActive{
		//set default page info
		private $page = '';
		private $sub_page = '';
		
		//run function construct
		function __construct($page_info){
			//assign page info
			$this->page = $page_info['page'];
			$this->sub_page = $page_info['sub_page'];
			
			//run the function
			$this->{$page_info['sub_page']}();
		}
		
		function login(){
			//stanciation
			$authentication = new authenticationModel();
			
			//authenticat login
			$login = $authentication->authenticaLogin($_POST);
			
			//check if login success
			if ($login){
				header('location:../pages/dashboard.php');
			}else{
				$msg = "Invalid Username or Password!";
				include '../views/admin/login.php';
			}
		}
	}
?>