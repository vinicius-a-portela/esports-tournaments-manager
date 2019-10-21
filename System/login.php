<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

	$system->session();
	
	include 'conexao.php';

	$email = $_POST['email'];
	$senha = hash('sha256',$_POST['senha']);

	$sql = "SELECT * FROM `contas` WHERE `contas`.`email`='$email' AND `contas`.`senha`='$senha'";
	$result = mysqli_query($con, $sql);

	if($result){
		if(mysqli_num_rows($result)){
			$row = mysqli_fetch_array($result);
			$_SESSION['logged'] = 'ok';
			if($row['nickname'] != null){
				$_SESSION['nickname'] = $row['nickname'];
			}
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['nome'] = $row['nome'];
			$_SESSION['idade'] = $row['idade'];
			$_SESSION['pagamento'] = $row['pagamento'];
			$_SESSION['instituicao'] = $row['instituicao'];
			$_SESSION['CR'] = $row['CR'];
			$_SESSION['CS'] = $row['CS'];
			$_SESSION['FIFA'] = $row['FIFA'];
			$_SESSION['FF'] = $row['FF'];
			$_SESSION['perm_pagamento'] = $row['perm_pagamento'];
			$_SESSION['perm_editar'] = $row['perm_editar'];
			$_SESSION['perm_visualizar'] = $row['perm_visualizar'];
			$_SESSION['favorito'] = $row['favorito'];

			header("location: ".$system->root('Conta/'));
		}else{
			$_SESSION['login_error'] = 'error';
			header("location: ".$system->root('Entrar/'));
		}
	}else echo mysqli_error($con);
?>