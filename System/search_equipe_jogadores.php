<?php
	include 'conexao.php';
	$equipe = $_POST['equipe'];

	$sql = "SELECT * FROM `equipecontas` WHERE `equipecontas`.`equipe` = '$equipe'";
	$query = mysqli_query($con, $sql) or die("Erro ao Conectar ao Banc	o de Dados");

	$arr = mysqli_fetch_all($query);
	echo sizeof($arr);