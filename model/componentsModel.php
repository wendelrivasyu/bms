<?php
	//import database connector
	require_once 'connector.php';
	
	//-------------------------------//
	class ComponentsModel extends Connector{
		function __construct(){
			parent::__construct();
		}
		
#	------------GET REPORTS-------------------------------------------------------------
		function get_mfopap(){
			$sql = "SELECT * FROM mfo_pap_tb ORDER BY mp_number ASC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		function get_uacs(){
			$sql = "SELECT * FROM uacs_tb ORDER BY uacs_id ASC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		function get_AC(){
			$sql = "SELECT * FROM allotment_class_tb ORDER BY ac_code ASC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		function get_FC(){
			$sql = "SELECT * FROM fund_cluster_tb ORDER BY fc_number ASC";
			$query = $this->conn->prepare($sql);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
#	------------ADD DATA----------------------------------------------------------------
		function addMFOPAP($post){
			$sql = "INSERT INTO `mfo_pap_tb`(`mp_number`, `mp_desc`) VALUES (?,?)";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['mfopap_id']);
			$query->bindParam(2, $post['mfopap_desc']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function addUACS($post){
			$sql = "INSERT INTO `uacs_tb`(`uacs_number`, `uacs_desc`) VALUES (?,?)";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['uacs_number']);
			$query->bindParam(2, $post['uacs_desc']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function addAC($post){
			$sql = "INSERT INTO `allotment_class_tb`(`ac_number`, `ac_code`, `ac_abbr`, `ac_desc`) 
											 VALUES (?,?,?,?)";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['ac_num']);
			$query->bindParam(2, $post['ac_code']);
			$query->bindParam(3, $post['ac_abbr']);
			$query->bindParam(4, $post['ac_desc']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function addFC($post){
			$sql = "INSERT INTO `fund_cluster_tb`(`fc_number`, `fc_desc`, `fc_color`) 
											 VALUES (?,?,?)";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fc_number']);
			$query->bindParam(2, $post['fc_desc']);
			$query->bindParam(3, $post['fc_color']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
#	------------UPDATE DATA-------------------------------------------------------------
		function updateMFOPAP($post){
			$sql = "UPDATE `mfo_pap_tb` SET `mp_number`=?, `mp_desc`=? WHERE `mp_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['mfopap_number']);
			$query->bindParam(2, $post['mfopap_desc']);
			$query->bindParam(3, $post['mp_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function updateUACS($post){
			$sql = "UPDATE `uacs_tb` SET `uacs_number`=?, `uacs_desc`=? WHERE `uacs_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['uacs_number']);
			$query->bindParam(2, $post['uacs_desc']);
			$query->bindParam(3, $post['uacs_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function updateAC($post){
			$sql = "UPDATE `allotment_class_tb` SET `ac_number`=?,`ac_code`=?,`ac_abbr`=?,`ac_desc`=? WHERE `ac_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['ac_num']);
			$query->bindParam(2, $post['ac_code']);
			$query->bindParam(3, $post['ac_abbr']);
			$query->bindParam(4, $post['ac_desc']);
			$query->bindParam(5, $post['ac_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function updateFC($post){
			$sql = "UPDATE `fund_cluster_tb` SET `fc_number`=?,`fc_desc`=?,`fc_color`=? WHERE `fc_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $post['fc_number']);
			$query->bindParam(2, $post['fc_desc']);
			$query->bindParam(3, $post['fc_color']);
			$query->bindParam(4, $post['fc_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
#	------------DELETE DATA-------------------------------------------------------------
		function deleteMFOPAP($get){
			$sql = "DELETE FROM mfo_pap_tb WHERE `mp_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['mp_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function deleteUACS($get){
			$sql = "DELETE FROM uacs_tb WHERE `uacs_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['uacs_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function deleteAC($get){
			$sql = "DELETE FROM `allotment_class_tb` WHERE `ac_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['ac_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
		function deleteFC($get){
			$sql = "DELETE FROM `fund_cluster_tb` WHERE `fc_id`=?";
			$query = $this->conn->prepare($sql);
			$query->bindParam(1, $get['fc_id']);
			$query->execute();
			
			return $this->conn->lastInsertId();
		}
	}
?>