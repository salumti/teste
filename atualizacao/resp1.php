<?php 
	$email = strip_tags($_POST['email']);
	$senha = base64_encode($_POST['senha']);
	$conect = 0;

	include "bd.php";
	$query = "select * from usuario where email = '$email' and senha = '$senha' limit 1";

	$consulta = mysqli_query($con, $query);

	$total = mysqli_num_rows($consulta);

	if($total == 0){
		echo "Usuário ou senha inválidos!";
		header("Refresh: 2, index.php");
	}

	if(isset($_POST['conect'])){
		$conect = 1;
	}
	
	while($usuario = mysqli_fetch_array($consulta)){
			$nome = $usuario['nome'];
			$adm = $usuario['adm'];
	

	if($conect == 0){
		session_start();
		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		$_SESSION['adm'] = $adm;
	
	}else{
		setcookie("email", $email, time()+60*60*24);
		setcookie("nome", $nome, time()+60*60*24);
		setcookie("adm", $adm, time()+60*60*24);
		}
	
	header("Location: index.php");
	
	}
 ?>