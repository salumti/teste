<?php 
	include "perfil.php";
	$vt = 0;
	//o comando abaixo, verifica se tem valor no get idproduto que adiciona produto ao carrinho
	if(isset($_GET['idproduto'])){
		//o comando abaixo, verifica se a pessoa está conectada
		if(empty($_COOKIE['email'])){
			// se não tiver conectado, estamos encaminhando para página entrar.php
			$idproduto = $_GET['idproduto'];
			header("Location:perfil.php?idproduto=$idproduto");
		}else{
			// caso esteja conectado, iremos adicionar ao carrinho o produto com este id
			$idproduto = $_GET['idproduto'];
			$qtd = 1;
			$email = $_COOKIE['email'];
			include "bd.php";
			
			$consultac = mysqli_query($con, "select * from carrinho where usuario = '$email' and idproduto = $idproduto");
			
			$existe = mysqli_num_rows($consultac);

			if($existe == 0){
				mysqli_query($con, "insert into carrinho(idproduto, qtd, usuario) values ($idproduto, $qtd, '$email')");
			}else{
				mysqli_query($con, "update carrinho set qtd = qtd+1 where idproduto = $idproduto and usuario = '$email'");
			}
				header("Location: carrinho.php");
		}
	}else{
		if(empty(($_COOKIE['email']))){
			header("Location: entrar.php");
		}
	}

	include "bd.php";
	$email = $_COOKIE['email'];
	$query = "select p.img, p.titulo, p.valor, c.qtd, c.idcarrinho, p.idproduto from carrinho c, produto p where c.usuario = '$email' and c.idproduto = p.idproduto";
	$c = mysqli_query($con, $query);
	$total = mysqli_num_rows($c);

	if($total == 0){
		echo "Carrinho vazio";
	}else{
		echo "<table border='1'>";
		echo "	<tr>
					<th>Foto</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Quantidade</th>
					<th>Sub-total</th>
					<th>Excluir</th>
				</tr>";
		while($produto = mysqli_fetch_array($c)){
			$img = $produto[0];
			$titulo = $produto[1];
			$valor = $produto[2];
			$qtd = $produto[3];
			$iditem = $produto[4];
			$idproduto = $produto[5];
			$st = $valor * $qtd;
			$vt = $vt + $st;
			echo "	<tr>
						<td><img src='imgproduto/$img' width='30' /></td>
						<td>$titulo</td>
						<td>R$ $valor</td>
						<td><a href='remove.php?idproduto=$idproduto'>-</a> $qtd <a href='carrinho.php?idproduto=$idproduto'>+</a></td>
						<td>$st</td>
						<td><a href='exc.php?id=$iditem'>Excluir</a></td>
					</tr>";
		}


		echo "</table>";
		echo "R$ $vt";
	}


?>