<?php 
	
	$nomeprod = strip_tags($_POST['nomeprod']);
	$preco = strip_tags($_POST['preco']);
	$categoria = strip_tags($_POST['categoria']);
	$marca = strip_tags($_POST['marca']);
	$quantidade = strip_tags($_POST['quantidade']);

	include "bd.php";
	$query = "insert into produto(nomeprod, preco, categoria, marca, quantidade) values ('$nomeprod', '$preco', '$categoria', '$marca', '$quantidade')";
		mysqli_query($con, $query);

		echo "Produto cadastrado com sucesso!";
		header("Refresh: 1, upfoto.php");

 ?>