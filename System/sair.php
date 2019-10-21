<?php
	include 'conexao.php';

	$conta = $_POST['jogador'];
	$equipe = $_POST['equipe'];

	function isCaptain($conta, $equipe, $con){
		$sql = "SELECT * FROM `equipes` WHERE `equipes`.`ID` = '$equipe' AND `equipes`.`capitao` = '$conta'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
		if(mysqli_num_rows($query)>0){
			return 1;
		}else return 0;
	}

	//Ver se tem outro jogador na equipe, se não tiver, apagar equipe
	function hasOther($conta, $equipe, $con){
		$sql = "SELECT * FROM `equipecontas` WHERE `equipecontas`.`equipe` = '$equipe' AND `equipecontas`.`conta` != '$conta'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
		if(mysqli_num_rows($query)>0){
			$row = mysqli_fetch_array($query);
			return $row['conta'];
		}else return 0;
	}

	if(isCaptain($conta, $equipe, $con)){
		if(hasOther($conta, $equipe, $con)){
			//Se não for o último, leva o capitao para outra pessoa
			$sql = "DELETE FROM `equipecontas` WHERE `equipecontas`.`conta` = '$conta' AND `equipecontas`.`equipe` = '$equipe'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
			$outro = hasOther($conta, $equipe, $con);
			$sql = "UPDATE `equipes` SET `equipes`.`capitao` = '$outro' WHERE `equipes`.`ID` = '$equipe'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
		}else{
			//Se ele for o último, apaga time
			$sql = "DELETE FROM `equipecontas` WHERE `equipecontas`.`conta` = '$conta' AND `equipecontas`.`equipe` = '$equipe'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
			$sql = "DELETE FROM `equipes` WHERE `equipes`.`ID` = '$equipe'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
		}
	}else{
		//Só sai da equipe
		$sql = "DELETE FROM `equipecontas` WHERE `equipecontas`.`conta` = '$conta' AND `equipecontas`.`equipe` = '$equipe'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
	}

	echo 'ok';