<?php
	include 'conexao.php';
	
	$id = $_POST['id'];
	$sql = "DELETE FROM `requisicoes` WHERE `requisicoes`.`ID`='$id'";
	$query = mysqli_query($con, $sql) or die('<h1>Erro ao conectar ao banco de dados</h1>');

	echo 'ok';