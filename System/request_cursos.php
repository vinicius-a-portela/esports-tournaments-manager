<?php
	include 'conexao.php';

	function getCurso($curso_atual, $cursos){
		for($i=0;$i<sizeof($cursos);$i++){
			if($cursos[$i][0] == $curso_atual){
				return $cursos[$i][1];
			}
		}
	}

	$sql = "SELECT * FROM `cursos`";
	$query = mysqli_query($con, $sql) or die("Erro ao se Conectar ao Banco de Dados");

	$cursos = mysqli_fetch_all($query);

	$sql = "SELECT * FROM `turmas`";
	$query2 = mysqli_query($con, $sql) or die("Erro ao se Conectar ao Banco de Dados");

	while($row = mysqli_fetch_array($query2)){
		echo "<option value='".$row['ID']."' selected>".getCurso($row['curso'], $cursos)." ".$row['ano']."</option>";
	}