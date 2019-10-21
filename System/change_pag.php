<?php
	require "checklogin.php";
	require "checkperm.php";
	require "checkperm_editar.php";

	include 'conexao.php';

	$jogador = $_POST['jogador'];

	$sql = "SELECT pagamento FROM `contas` WHERE `contas`.`ID`='$jogador'";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));

	$row = mysqli_fetch_array($query);
	$sts = ($row[0])==0?1:0;

	$sql = "UPDATE `contas` SET `pagamento`='$sts' WHERE `contas`.`ID`='$jogador'";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));

	echo "ok";