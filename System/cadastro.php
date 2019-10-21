<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	$system->session();
	include 'conexao.php';

	$email = $_POST['email'];
	$senha = hash('sha256',($_POST['senha']));
	$nome = $_POST['nome'];
	$nickname = $_POST['nickname'];
	$instituicao = $_POST['instituicao'];
	$idade = (int)$_POST['idade'];
	$fav = $_POST['fav'];
	$matricula = (isset($_POST['matricula']))?$_POST['matricula']:null;
	$turma = (isset($_POST['turma']))?$_POST['turma']:null;
	$cpf = (isset($_POST['cpf']))?$_POST['cpf']:null;
	$telefone = (int)$_POST['telefone'];

	if($cpf != null){
		preg_match_all('/\d+/', $cpf, $cpf_arr);
		$cpf = "";

		for($i=0;$i<count($cpf_arr[0]);$i++){
			$cpf = $cpf.$cpf_arr[0][$i];
		}
	}	

	$CR = isset($_POST['cr'])? 1 : 0;
	$CS = isset($_POST['cs'])? 1 : 0;
	$FIFA = isset($_POST['fifa'])? 1 : 0;
	$FF = isset($_POST['ff'])? 1 : 0;

	$sql = "INSERT INTO `contas`(email, senha, nome, instituicao, CR, CS, FF, FIFA, idade, telefone, favorito".($cpf!=null?", cpf":",matricula, turma").") VALUES ('$email','$senha','$nome','$instituicao','$CR','$CS','$FF','$FIFA', '$idade', '$telefone' , '$fav'".($cpf!=null?", '$cpf'":",'$matricula', '$turma'").")";

	echo $sql;
	
	$modalidades = 0;
	$valor = 0;

	$CR==1?$modalidades++:null;
	$CS==1?$modalidades++:null;
	$FIFA==1?$modalidades++:null;
	$FF==1?$modalidades++:null;

	switch ($modalidades) {
		case 0:
			$valor = 0;
			break;

		case 1:
			$valor = 5;
			break;
		
		default:
			$valor = 5 + (2*($modalidades-1));
	}

	$result = mysqli_query($con, $sql);
	if($result){
		//Deixar Logado
		$sql2 = "SELECT * FROM `contas` WHERE `contas`.`email`='$email' AND `contas`.`senha`='$senha'";
		$result2 = mysqli_query($con, $sql2);

		if($result2){
			if(mysqli_num_rows($result2)){
				$row = mysqli_fetch_array($result2);
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
				$_SESSION['login_success'] = "ok";
			}else{
				header("location: account.php");
			}
		}else echo mysqli_error($con);

		header("location: ".$system->includer->core('mailer', [NAME_ONLY, ROOT_PATH])."?nome=$nome&email=$email&cr=$CR&cs=$CS&ff=$FF&fifa=$FIFA&telefone=$telefone&turma=$turma&valor=$valor&nickname=$nickname");
	} else echo mysqli_error($con);
?>