<?php
	//import model
	//import model
	include '../model/admin_model.php';

	$page_info['page'] = 'home'; //for page that needs to be called
	$page_info['sub_page'] = isset($_GET['sub_page'])? $_GET['sub_page'] : 'home'; //for function to be loaded
		

		//if(isset($_SESSION['user_id'])){
			try {//used try to catch unfortunate errors
			//check for active function
			
					new HomePage($page_info);
			
		}catch (Throwable $e){ //get the encountered error
			echo '<h1>ERROR 404</h1>';
			echo $e->getMessage();
		}//end of validation

		//}else{ 
			//header('Location: authentication.php');
		//}

	class HomePage{
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
		function home(){
			//instantiate model
			$admin = new AdminModel();
			
			//get accounts
			$image = $admin->getImages();
			
			include '../views/user/index.php';
		}
	}
?>