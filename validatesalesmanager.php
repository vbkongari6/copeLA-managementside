<?php
	session_start();
	if($_SESSION['usertype'] == "salesmanager"){
		if(isset($_SESSION['timeout']) && (time()-$_SESSION['timeout']) > 300) {			
			session_destroy();
			require "login.php";
			exit;
		}
		$_SESSION['timeout'] = time();	
	}
	else{
		require "login.php";
		exit;
	}		
?>