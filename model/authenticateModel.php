<?php
	//import database connector
	require_once 'connector.php';
	
	//-------------------------------//
	class AuthenticateModel extends Connector{
		function __construct(){
			parent::__construct();
		}
		
		function login($post){
			$sql = "SELECT * FROM user_tb WHERE user_pword = :pass && user_uname = :uname";
			$query = $this->conn->prepare($sql);
			$query->bindParam('uname', $post['username']);
			$query->bindParam('pass', $post['password']);
			$query->execute();
			
			return $query->fetch(PDO::FETCH_ASSOC);
		}
	}
?>