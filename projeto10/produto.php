<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include "index.php";
		include "bd.php";
		$exibir = 10;
		if(empty($_GET['pi'])){
			$inicial = 0;			
		}else{
			$inicial = $_GET['pi'];
		}
		$query2 = "select * from produto";
		$consulta2 = mysqli_query($con, $query2);
		$total = mysqli_num_rows($consulta2);

		$query = "select * from produto limit $inicial,$exibir";
		$consulta = mysqli_query($con, $query);

		$paginas = ceil($total / $exibir);


		while($p = mysqli_fetch_array($consulta)){
			$id = $p['id'];
			$nomeprod = utf8_encode($p['nomeprod']);
			$precoprod = $p['precoprod'];

			echo "	<div>
						<h1>$nomeprod</h1>
						<p>Valor: $precoprod</p>
						<hr /> 
					</div>
				 ";
		}
		echo "<a href='teste.php?pi=0'>Primeiro</a>";
		for($i = 1; $i <= $paginas; $i++){
			if($i == 1){
				$pi = 0;
			}else{
				$pi = $pi + $exibir;
			}
			echo "<a href='teste.php?pi=$pi'>$i</a>";
		}
		echo "<a href='teste.php?pi=$pi'>ultimo</a>";
	?>
</body>
</html>


