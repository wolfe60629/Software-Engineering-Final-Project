<?php
session_start();
if(isset($_SESSION['userlogin'])) {
		session_destroy();
		header("Location: Login.php");
	}else{ 
		header("Location: Login.php");
	}
	

?>
