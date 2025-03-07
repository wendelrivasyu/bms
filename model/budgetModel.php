<?php
	//import database connector
	require_once 'connector.php';
	
	//-------------------------------//
	class BudgetModel extends Connector{
		function __construct(){
			parent::__construct();
		}
		
	#	-------FISCAL YEAR------------------------------------------------------------------
		function get_fiscal_year(){
			$sql = "SELECT * FROM fiscal_year_tb ORDER BY fy_year DESC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		function addFY($post){
			$sql = "INSERT INTO `fiscal_year_tb`(`fy_year`) VALUES (?)";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fy']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		
		function updateFY($post){
			$sql = "UPDATE `fiscal_year_tb` SET `fy_year`=? WHERE `fy_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fy']);
			$query->bindParam(2, $post['fy_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		
		function deleteFY($get){
			$sql = "DELETE FROM fiscal_year_tb WHERE `fy_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['fy_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		
	#	-------FISCAL YEAR BUDGET-----------------------------------------------------------
		function get_fiscal_year_budget(){
			$sql = "SELECT * FROM fiscal_year_budget_tb ORDER BY budget_id DESC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		function addFYB($post){
			if (isset($post['additional'])){
				$sql = "INSERT INTO `fiscal_year_budget_tb`(`budget_fy_id`, `budget_allotment`, `budget_desc`, `budget_additional`) 
												VALUES (?,?,?,'1')";
			}else{
				$sql = "INSERT INTO `fiscal_year_budget_tb`(`budget_fy_id`, `budget_allotment`, `budget_desc`) 
												VALUES (?,?,?)";
			}
			
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fy']);
			$query->bindParam(2, $post['budget']);
			$query->bindParam(3, $post['desc']);		
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		
		function updateFYB($post){
			if (isset($post['additional'])){
				$sql = "UPDATE `fiscal_year_budget_tb` SET `budget_fy_id`=?,`budget_allotment`=?,`budget_desc`=?,`budget_additional`='1' WHERE `budget_id`=?";
			}else{
				$sql = "UPDATE `fiscal_year_budget_tb` SET `budget_fy_id`=?,`budget_allotment`=?,`budget_desc`=?,`budget_additional`='0' WHERE `budget_id`=?";
			}
			
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fy']);
			$query->bindParam(2, $post['budget']);
			$query->bindParam(3, $post['desc']);		
			$query->bindParam(4, $post['budget_id']);		
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		
		function deleteFYB($get){
			$sql = "DELETE FROM `fiscal_year_budget_tb` WHERE `budget_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['fyb_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
	}
?>