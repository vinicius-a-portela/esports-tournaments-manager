<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

	$system->session();

	if(isset($_SESSION['logged'])){
		header('location: '.$system->root('Conta/'));
	}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | Entrar</title>
	<?php $system->meta()?>
	<?php $system->includer->bootstrapCSS()?>
</head>

<style type="text/css">

body{
	background-color: #ededed;
}

.form-group.required .control-label:after {
  content:"*";
  color:red;
}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="card w-100" style="margin-top: 80px; max-width: 500px">
			  <div class="card-body">
			    <h5 class="card-title">Conta</h5>
			    <p class="card-text">Entrar na Conta</p>
			    <?php
			    	if(isset($_SESSION['login_error'])){
			    		echo '<div class="alert alert-danger" role="alert">Erro ao logar, verifique as credenciais!</div>';
			    		unset($_SESSION['login_error']);
			    	}
			    ?>
			    <form method="POST" action=<?php echo $system->root()."System/login.php" ?>>
					  <div class="form-group required">
					    <label for="input-email" class="control-label">Email</label>
					    <input type="email" class="form-control" id="input-email" aria-describedby="emailHelp" placeholder="Insira seu Email" name="email" required>
					  </div>
					  <div class="form-group required">
					    <label for="input-pass" class="control-label">Senha</label>
					    <input type="password" class="form-control" id="input-pass" placeholder="Insira sua senha" name="senha" required>
					  </div>
					  <button type="submit" class="btn btn-raised btn-primary">Entrar</button>
					  <a <?php $system->hrefRoot('Cadastrar/') ?> class="btn btn-raised btn-secondary">Cadastrar</a>
					</form>
			  </div>
			</div>
		</div>
	</div>
	<?php $system->includer->js();?>
</body>
</html>