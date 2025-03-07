<?php
	//import model
	include_once '../model/componentsModel.php';
	
	//start session
	session_start();
	//check for active session
	if (isset($_SESSION['user_id'])){
		//session is active
		
		//page info.
		$page['page'] = 'Components';
		$page['subpage'] = isset($_GET['subpage'])? $_GET['subpage']:'mfopap';
		
		//catch for error detection
		try{
			
			//see for an active method
			if (isset($_GET['function'])){
				//action class
				new ActiveUACS($page);
			}else{
				//navigation class
				new UACS($page);
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
	class UACS{
		
		private $page = '';
		private $subpage = '';
		
		protected $model = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			$this->model = new ComponentsModel();
			//method to be selected
			$this->{$page['subpage']}();
		}
		
		function mfopap(){
			$mfopap = $this->model->get_mfopap();
			
			include '../views/admin/mfo_pap.php';
		}
		
		function uacs(){
			$get_uacs = $this->model->get_uacs();
			
			include '../views/admin/uacs.php';
		}
		
		function allotment(){
			$allotment_class = $this->model->get_AC();
			
			include '../views/admin/allotment.php';
		}
		
		function fc(){
			$fund_cluster = $this->model->get_FC();
			
			include '../views/admin/fc.php';
		}
	}

#	-------------------------------------------------
	class ActiveUACS{
		
		private $page = '';
		private $subpage = '';
		
		protected $model = '';
		
		//default method
		function __construct($page){
			$this->page = $page['page'];
			$this->subpage = $page['subpage'];
			$this->model = new ComponentsModel();
			
			//method to be selected
			$this->{$_GET['function']}();
		}

	#	-------MFO/PAP----------------------------------------------------------------------
		function addMFOPAP(){
			$addMFOPAP = $this->model->addMFOPAP($_POST);
			
			$mfopap = $this->model->get_mfopap();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function updateMFOPAP(){
			$updateMFOPAP = $this->model->updateMFOPAP($_POST);
			
			$mfopap = $this->model->get_mfopap();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function deleteMFOPAP(){
			$deleteMFOPAP = $this->model->deleteMFOPAP($_GET);
			
			$mfopap = $this->model->get_mfopap();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
	
	#	-------UACS OBLIGATION CODE---------------------------------------------------------
		function addUACS(){
			$addUACS = $this->model->addUACS($_POST);
			
			$get_uacs = $this->model->get_uacs();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function updateUACS(){
			$updateUACS = $this->model->updateUACS($_POST);
			
			$get_uacs = $this->model->get_uacs();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function deleteUACS(){
			$deleteUACS = $this->model->deleteUACS($_GET);
			
			$get_uacs = $this->model->get_uacs();
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
	#	-------UACS OBLIGATION CODE---------------------------------------------------------
		function addAC(){
			$addAC = $this->model->addAC($_POST);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function updateAC(){
			$updateAC = $this->model->updateAC($_POST);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function deleteAC(){
			$deleteAC = $this->model->deleteAC($_GET);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
	#	-------FUND CLUSTER-----------------------------------------------------------------
		function addFC(){
			$addFC = $this->model->addFC($_POST);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function updateFC(){
			$updateFC = $this->model->updateFC($_POST);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
		function deleteFC(){
			$deleteFC = $this->model->deleteFC($_GET);
			
			header('location: ../page/components.php?subpage='.$this->subpage);
		}
		
	}

?>