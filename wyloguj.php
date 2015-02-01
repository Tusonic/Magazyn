<?php
	
			session_start();
			unset($_SESSION['login']);
			unset($_SESSION['acc']);
			unset($_SESSION['haslo']);
			session_destroy();
			Header ('Location: index.php');
	
?>
