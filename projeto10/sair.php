<?php 
	session_start();
	session_destroy();
	setcookie("nome", "", time()-1);
	setcookie("email", "", time()-1);
	setcookie("adm", "", time()-1);
	header("Location: index.php");
 ?>