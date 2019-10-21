<?php
	include 'conexao.php';

	$id = $_POST['id'];
	$sql = "SELECT * FROM `requisicoes` WHERE `requisicoes`.`ID` = '$id'";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$arr = mysqli_fetch_array($query);

	$equipe = $arr['equipe'];
	$conta = $arr['conta'];
	$sql = "INSERT INTO `equipecontas`(equipe, conta) VALUES ('$equipe', '$conta')";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));

	$sql = "DELETE FROM `requisicoes` WHERE `requisicoes`.`ID`='$id'";
	$query = mysqli_query($con, $sql) or die('<h1>Erro ao conectar ao banco de dados</h1>');
	
	echo 'ok';