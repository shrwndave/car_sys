<?php
	//import model
	//import model
	include '../model/admin_model.php';

	$page_info['page'] = 'landing_page'; //for page that needs to be called
	$page_info['sub_page'] = isset($_GET['sub_page'])? $_GET['sub_page'] : 'landing_page'; //for function to be loaded
		

		//if(isset($_SESSION['user_id'])){
			try {//used try to catch unfortunate errors
			//check for active function
			
				if (isset($_GET['function'])){
					new Landing_PageActive($page_info);
				}else{
					//no active function, use the default page to view
					new Landing_Page($page_info);
				}
			
		}catch (Throwable $e){ //get the encountered error
			echo '<h1>ERROR 404</h1>';
			echo $e->getMessage();
		}//end of validation

		//}else{ 
			//header('Location: authentication.php');
		//}

	class Landing_page{
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
		function landing_page(){
			//instantiate model
			$admin = new AdminModel();
			
			//get accounts
			$image = $admin->getImages();
			
			include '../views/admin/landing_page.php';
		}
	}
	class Landing_PageActive{
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
		
		function addImage(){																					//addprovince
			//instanciate model
			$admin = new AdminModel();
			
			//add images
			$addImage = $admin->addImages($_POST, $_FILES);
			
			$image = $admin->getImages();
			
			include '../views/admin/landing_page.php';
		}

	}
?>