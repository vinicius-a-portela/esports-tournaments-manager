<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Mailer/src/Exception.php';
	require 'Mailer/src/PHPMailer.php';
	require 'Mailer/src/SMTP.php';

	function TurmaOf($id){
		echo "A: ".$id;
		include 'conexao.php';
		$sql = "SELECT * FROM `turmas` WHERE `turmas`.`ID`='$id'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
		$turmas = mysqli_fetch_all($query);

		if(mysqli_num_rows($query)){
			$turmaSQL = $turmas[0][1];

			$sql = "SELECT * FROM `cursos` WHERE `cursos`.`ID` = '$turmaSQL'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
			$cursos = mysqli_fetch_all($query);

			return $cursos[0][1]." ".$turmas[0][2];
		}
	}

	$nome = $_GET['nome'];
	$cr = $_GET['cr'];
	$cs = $_GET['cs'];
	$fifa = $_GET['fifa'];
	$ff = $_GET['ff'];
	$valor = $_GET['valor'];
	$nickname = $_GET['nickname'];
	$email = $_GET['email'];
	$telefone = $_GET['telefone'];
	$turma = $_GET['turma'];

	$sub = $nome." acabou de se cadastrar!";
	$body = "
				<body>
					<div class='container'>
						<img style='width:100%' src='https://simpx.net/jogoseletronicos/CabecalhoJogosEletronicos.png'>
						<div style='text-align: center'>
							<div style='background-color: #efefef;width: 100%;margin-top: -20px'>
								<h2 style='padding-top: 20px'>".$nome." acabou de se cadastrar!</h2>
								<h3>Modalidades:</h3>
								<div class='container reduced'>
									<div class='row'>
										<div class='col'>
											<div class='card'>
												<div class='card-body'>CLASH ROYALE: ".$cr."</div>
											</div>
										</div>
										<div class='col'>
											<div class='card'>
												<div class='card-body'>COUNTER STRIKE: ".$cs."</div>
											</div>
										</div>
										<div class='col'>
											<div class='card'>
												<div class='card-body'>FIFA: ".$fifa."</div>
											</div>
										</div>
										<div class='col'>
											<div class='card'>
												<div class='card-body'>FREE FIRE: ".$ff."</div>
											</div>
										</div>
									</div>
								</div>
								<h3 class='pt-3'>Pagamento Estimado:</h3>
								<span>R$ ".$valor.",00</span>
								<h3 class='pt-3'>Dados do Usuario:</h3>
								Nome: ".$nome."<br>
								Nickname: ".$nickname."<br>
								Email: ".$email."<br>
								Telefone: ".$telefone."<br>
								Turma: ".TurmaOf($turma)."<br>
							</div>
						</div>
					</div>
				</body>
	";

	try{
		$mail = new PHPMailer(true);
		$mail->setLanguage('pt_br');
		$mail->CharSet = 'UTF-8';
		$mail->isSMTP();
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '465';
		$mail->IsHTML();
		$mail->Username = $_ENV['gmail_username'];
		$mail->Password = $_ENV['gmail_password'];
		$mail->SetFrom($_ENV['gmail_from'], 'Jogos Eletrônicos');
		$mail->Subject = $sub;
		$mail->Body = $body;
		//$mail->addAddress('example@gmail.com'); ... Repeat for each email that you want to send

		$mail->Send();

	 	header("location: ".$system->root('Conta'));
	} catch (Exception $e) {
	    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			header("location: ".$system->root('Conta'));
	}
