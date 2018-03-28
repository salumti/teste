<?php 
	session_start();
	$id = $_POST['id'];
	$adm = $_POST['adm'];
	$nome = strip_tags($_POST['nome']);
	$identidade = strip_tags($_POST['identidade']);
	$cpf = strip_tags($_POST['cpf']);
	$nascimento = strip_tags($_POST['nascimento']);
	$endereco = strip_tags($_POST['endereco']);
	$cep = strip_tags($_POST['cep']);
	$complemento = strip_tags($_POST['complemento']);
	$numero = strip_tags($_POST['numero']);
	$bairro = strip_tags($_POST['bairro']);
	$cidade = strip_tags($_POST['cidade']);
	$estado = strip_tags($_POST['estado']);
	$email = strip_tags($_POST['email']);
	$senha = base64_encode($_POST['senha']);

	include "bd.php";
	$query = "update usuario set adm = '$adm', nome = '$nome', identidade = '$identidade', cpf = '$cpf', nascimento = '$nascimento', endereco = '$endereco', cep = '$cep', complemento = '$complemento', numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', email = '$email', senha = '$senha' where idusu = $id";

	
			mysqli_query($con, $query);
			echo "Cadastro atualizado com sucesso!";
			header("Refresh: 1, perfil.php");
		

 ?>