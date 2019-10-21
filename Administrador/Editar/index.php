<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

  require $system->includer->core('checklogin', [NAME_ONLY]);
  require $system->includer->core('checkperm', [NAME_ONLY]);
  require $system->includer->core('checkperm_editar', [NAME_ONLY]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Conta</title>

	<?php $system->meta();?>
	<?php $system->includer->bootstrapCSS();?>
</head>

<style type="text/css">
	body{
		background-color: #ededed;
	}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div class="container">
		<?php
			$system->includer->adm_bar();
			require $system->includer->core('conexao', [NAME_ONLY]);

			$jogador = $_GET['user'];

			$sql = "SELECT * FROM `contas` WHERE `contas`.`ID`='$jogador'";
			$query = mysqli_query($con, $sql) or die("Erro ao conectar ao banco de dados");

			$row = mysqli_fetch_array($query);
		?>
		<div class="card w-100 mt-3">
		  <div class="card-body">
		  	<div class="row pb-3">
		  		<div class="col">
		  			<h5 class="card-title"><?php echo $row["nome"]?></h5>
		  			<p class="card-text">Idade: <?php echo $row['idade']==0?"Idade Não Informada":$row['idade'] ?> | <?php echo strtoupper($row['instituicao'])?></p>
		  		</div>
		  		<div class="row justify-content-end">
		  			<div class="col">
			  			<a <?php $system->hrefRoot('administrador/jogadores/'); ?> class="btn btn-raised btn-danger" style="margin-right: 10px">Voltar</a>
			  		</div>
		  		</div>
		  	</div>

		  	<div class="row">
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="cr">
				        <h5 class="card-title">
				        	<?php
				        		if($row['favorito'] == 'cr')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Clash Royale
				        </h5>
				        <p class="card-text">Equipes: 16 Jogadores.<br>MD3</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="cs">
				        <h5 class="card-title">
				        	<?php
				        		if($row['favorito'] == 'cs')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Counter Strike
				        </h5>
				        <p class="card-text">Equipes: 16 Equipes.<br>MD2 (Ranking)</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="fifa">
				        <h5 class="card-title">
				        	<?php
				        		if($row['favorito'] == 'fifa')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	FIFA 17
				        </h5>
				        <p class="card-text">Equipes: 16 Jogadores.<br>MD1</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="ff">
				        <h5 class="card-title">
				        	<?php
				        		if($row['favorito'] == 'ff')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Free Fire
				        </h5>
				        <p class="card-text">Equipes: 8 Equipes.<br>Ranking</p>
				      </div>
				    </div>
				  </div>
				</div>

				<?php if($row['pagamento']==1){ ?>
					<div class="alert alert-success" role="alert" style="margin-top: 15px">
					  Pagamento realizado com sucesso!
					</div>
				<?php }else{ 
								if($row['perm_pagamento']==0){
					?>
					<div class="alert alert-danger" role="alert" style="margin-top: 15px">
					  Você ainda não pagou a inscrição!
					</div>
				<?php 	}
							} ?>
		  </div>
		</div>
	</div>

  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	if($row['CR'] == 0){echo "<script>$('#cr').addClass('bg-secondary');</script>";}
	if($row['CS'] == 0){echo "<script>$('#cs').addClass('bg-secondary');</script>";}
  if($row['FIFA'] == 0){echo "<script>$('#fifa').addClass('bg-secondary');</script>";} 
	if($row['FF'] == 0){echo "<script>$('#ff').addClass('bg-secondary');</script>";}
?>