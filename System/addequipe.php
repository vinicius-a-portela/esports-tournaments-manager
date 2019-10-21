<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	include 'conexao.php';

	$nome = $_POST['nomeequipe'];
	$modalidade = $_POST['modalidade'];
	$capitao = $_POST['id'];
	$img = ($_FILES["teamlogo"]["name"]!='')?($_FILES["teamlogo"]["name"]):null;

	// Upload Image - Code From: https://www.w3schools.com/php/php_file_upload.asp
	if($img != null){
		$ext = pathinfo($img, PATHINFO_EXTENSION);
		$current_file = basename($img, $ext);

		$target_dir = $system->systemRoot()."Imgs/";
		$target_file = $target_dir . basename($_FILES["teamlogo"]["name"]);
		$uploadOk = 1;
		
		if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["teamlogo"]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	        echo "image ok";
	    } else {
	    		header("location: user_account.php?error=Arquivo não válido");
	        $uploadOk = 0;
	        echo "not a image";
	    }
		}

		// Check if file already exists
		if (file_exists($target_dir.$current_file."0")){
			echo "FILE EXISTS";
			$index = 0;

			do{
				$index++;
				$target_file = $target_dir.$current_file.$index;
				echo $target_file;
				$img = $current_file.$index;
			} while(file_exists($target_file));

			if ($uploadOk == 0) {
			    header("location: ".$system->root("Conta/")."?error=Erro ao enviar a imagem");
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["teamlogo"]["tmp_name"], $target_dir.$current_file.$index)) {
			    } else {
			      header("location: ".$system->root("Conta/")."?error=Erro ao enviar a imagem");
			    }
			}
		}else{
			if ($uploadOk == 0) {
		    header("location: ".$system->root("Conta/")."?error=Erro ao enviar a imagem");
			// if everything is ok, try to upload file
			} else {
				$img = $target_dir.$current_file."0";
				echo $img."<br>";
		    if (move_uploaded_file($_FILES["teamlogo"]["tmp_name"], $img)) {
		    	$img = $current_file."0";
		    } else {
		      header("location: ".$system->root("Conta/")."?error=Erro ao enviar a imagem");
		    }
			}
		}
	}

	echo $img."<br>";

	$sql = "INSERT INTO `equipes`(nome, modalidade, capitao".(($img!=null)?(',logo'):('')).") VALUES ('$nome', '$modalidade','$capitao'".(($img!=null)?(',\''.$img.'\''):('')).")";

	$query = mysqli_query($con, $sql) or die(header("location: ".$system->root("Conta/")."?error=Erro ao conectar ao banco de dados"));

	$last_id = $con->insert_id;

	$sql = "INSERT INTO `equipecontas`(equipe, conta) VALUES ('$last_id','$capitao')";
	
	$query = mysqli_query($con, $sql) or die(header("location: ".$system->root("Conta/")."?error=Erro ao conectar ao banco de dados"));
	header("location: ".$system->root("Conta/"));