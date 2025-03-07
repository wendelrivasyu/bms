<?php
	//import model
	//include_once '../model/authenticateModel.php';
	
	//start session
	session_start();
	//check for active session
	if (isset($_SESSION['user_id'])){
		//session is active
		
		//page info.
		$page['page'] = 'Administrator';
		$page['subpage'] = isset($_GET['subpage'])? $_GET['subpage']:'landingpage';
		
		//catch for error detection
		try{
			
			//see for an active method
			if (isset($_GET['function'])){
				//action class
				new ActiveAdmin($page);
			}else{
				//navigation class
				new Admin($page);
			}
			
		}catch(Throwable $e){
			echo '404';
			echo $e->getMessage();
		}
		
	}else{
		//session is not active
		//redirect to landing page
		
		header('location: ../page/authenticate.php');
	}
	
#	-------------------------------------------------
	class Admin{
		
		private $page = '';
		private $subpage = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			
			//method to be selected
			$this->{$page['subpage']}();
		}
		
		function landingpage(){
			include '../views/admin/dashboard.php';
		}
	}

?>