<?php
	session_start();
	
	session_destroy();

	echo "<script>window.location.href='../../page/Authenticate.php';</script>";
	
?>