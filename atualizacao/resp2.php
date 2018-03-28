<?php 
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
	$query = "select * from usuario where email = 'email' and senha = 'senha' limit 1";

	$consulta = mysqli_query($con, $query);
	$total = mysqli_num_rows($consulta);
		if($total == 1){
			echo "E-mail já cadastrado! Tente outro.";
			header("Refresh: 3, index.php");
		}else{
			$query = "insert into usuario(nome, identidade, cpf, nascimento, endereco, cep, complemento, numero, bairro, cidade, estado, email, senha) values ('$nome', '$identidade', '$cpf', '$nascimento', '$endereco', '$cep', '$complemento', '$numero', '$bairro', '$cidade', '$estado', '$email', '$senha')";
			mysqli_query($con, $query);
			echo "Usuário cadastrado com sucesso!";
			session_start();
			$_SESSION['nome'] = $nome;
			$_SESSION['email'] = $email;
			header("Refresh: 3, index.php");
		}

 ?>