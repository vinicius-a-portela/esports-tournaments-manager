<?php
	include 'conexao.php';

	$equipe = $_POST['equipe'];
	$conta = $_POST['jogador'];

	$sql = "SELECT * FROM `requisicoes` WHERE `requisicoes`.`conta` = '$conta' AND `requisicoes`.`equipe` = '$equipe'";
	$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados!</h1>");

	if(mysqli_num_rows($query)>0){
		echo 'exists';
	}else{
		$sql = "INSERT INTO `requisicoes`(conta, equipe) VALUES ('$conta', '$equipe')";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados!</h1>");

		echo 'ok';
	}