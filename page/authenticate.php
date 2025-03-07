<?php
	//import model
	include_once '../model/authenticateModel.php';
	
	//start session
	session_start();
	//check for active session
	if (!isset($_SESSION['user_id'])){
		//session is not active
		
		//page info.
		$page['page'] = 'Authentication';
		$page['subpage'] = isset($_GET['subpage'])? $_GET['subpage']:'login';
		
		//catch for error detection
		try{
			
			//see for an active method
			if (isset($_GET['function'])){
				//action class
				new ActiveAuthentication($page);
			}else{
				//navigation class
				new Authentication($page);
			}
			
		}catch(Throwable $e){
			echo '404';
			echo $e->getMessage();
		}
		
	}else{
		//session is active
		//redirect to landing page
		header('location: ../page/admin.php');
	}
	
#	-------------------------------------------------
	class Authentication{
		
		private $page = '';
		private $subpage = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			
			//method to be selected
			$this->{$page['subpage']}();
		}
		
		function login(){
			include '../views/login/login.php';
		}
	}
	
#	-------------------------------------------------
	class ActiveAuthentication{
		
		private $page = '';
		private $subpage = '';
		private $funtion = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			
			//method to be selected
			$this->{$_GET['function']}();
		}
		
		function validate(){
			
			//instantiate
			$admin = new AuthenticateModel();
			
			//authenticate login
			$login = $admin->login($_POST);
			
			if ($login){
				//variable in session
				$_SESSION['user_id'] = 'Admin';
				$_SESSION['user_fullname'] = $login['user_fullname'];
				header('location: ../page/admin.php');
			}else{
				$msg = 'Invalid Username or Password!';
				
				//view
				include '../views/login/login.php';
			}
		}
	}
	
?>