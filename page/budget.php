<?php
	//import model
	include_once '../model/budgetModel.php';
	
	//start session
	session_start();
	//check for active session
	if (isset($_SESSION['user_id'])){
		//session is active
		
		//page info.
		$page['page'] = 'Budget';
		$page['subpage'] = isset($_GET['subpage'])? $_GET['subpage']:'landingpage';
		
		//catch for error detection
		try{
			
			//see for an active method
			if (isset($_GET['function'])){
				//action class
				new ActiveBudget($page);
			}else{
				//navigation class
				new Budget($page);
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
	class Budget{
		
		private $page = '';
		private $subpage = '';
		
		protected $model = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			$this->model = new BudgetModel();
			//method to be selected
			$this->{$page['subpage']}();
		}
		
		function sby(){
			$fiscal_year = $this->model->get_fiscal_year();
			
			include '../views/admin/fiscal_year_budget.php';
		}
		
		function fyb(){
			$fiscal_year = $this->model->get_fiscal_year();
			
			$get_fiscal_year_budget = $this->model->get_fiscal_year_budget();
			
			include '../views/admin/fyb.php';
		}
		
		function afyb(){
			$fiscal_year = $this->model->get_fiscal_year();
			
			$get_fiscal_year_budget = $this->model->get_fiscal_year_budget();
			
			include '../views/admin/afyb.php';
		}
	}

#	-------------------------------------------------
	class ActiveBudget{
		
		private $page = '';
		private $subpage = '';
		
		protected $model = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			$this->model = new BudgetModel();
			
			//method to be selected
			$this->{$_GET['function']}();
		}
	#	--------FISCAL YEAR MATTERS---------------------------------------------------------
		function addFY(){
			$addFY = $this->model->addFY($_POST);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
		
		function updateFY(){
			$updateFY = $this->model->updateFY($_POST);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
		
		function deleteFY(){
			$deleteFY = $this->model->deleteFY($_GET);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
	#	--------FISCAL YEAR BUDGET MATTERS--------------------------------------------------
		function addFYB(){
			$addFYB = $this->model->addFYB($_POST);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			$get_fiscal_year_budget = $this->model->get_fiscal_year_budget();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
		function updateFYB(){
			$updateFYB = $this->model->updateFYB($_POST);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			$get_fiscal_year_budget = $this->model->get_fiscal_year_budget();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
		
		function deleteFYB(){
			$deleteFYB = $this->model->deleteFYB($_GET);
			
			$fiscal_year = $this->model->get_fiscal_year();
			
			$get_fiscal_year_budget = $this->model->get_fiscal_year_budget();
			
			header('location: ../page/budget.php?subpage='.$this->subpage);
		}
	}

?>