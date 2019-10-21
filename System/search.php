<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	require $system->includer->core('conexao', [NAME_ONLY]);
	$search = $_POST['search'];

	$sql = "SELECT * FROM `equipes` WHERE `nome` LIKE '%$search%'";
	$query = mysqli_query($con, $sql) or die("Erro ao Conectar ao Banco de Dados");

	$arr = mysqli_fetch_all($query);

	for($i=0;$i<sizeof($arr);$i++){
		
		for($j=0;$j<count($arr[0]);$j++){
			echo $arr[$i][$j].",";
		}
		echo ";";	
	}