<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

  $system->session();
	require $system->includer->core('checklogin', [NAME_ONLY]);
	require $system->includer->core('teams', [NAME_ONLY]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Conta</title>
		
	<?php $system->meta()?>
	<?php $system->includer->bootstrapCSS()?>
</head>

<style type="text/css">
	body{
		background-color: #ededed;
	}

	.logoff{
		position: absolute; 
		margin-right: 17px;
		right: 0;
	}

	.trofeus{
		overflow-x: auto;
		white-space: nowrap;
	}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div class="container">
		<?php
			if($_GET){
				echo "<div class='alert alert-danger w-100' role='alert'>".$_GET['error']."</div>";
			}
			if(isset($_SESSION['login_success'])){
    		echo "<div class='alert alert-success' role='alert'>Conta Criada com Sucesso!</div>";
    		unset($_SESSION['login_success']);
    	}
			
			$system->includer->adm_bar();
		?>
		<div class="card w-100" style="margin-top: 90px">
		  <div class="card-body">
		  	<!-- LOGOFF -->
		  	<a <?php $system->hrefRoot('system/logoff.php'); ?> class="btn btn-raised btn-danger logoff">Logout</a>	
		  	
		  	<!-- FOTO DE PERFIL -->
		  	<div class="row justify-content-center" style="margin-top: -90px">
		  		<img <?php $system->includer->img('svg/user_profile.svg') ?>>
		  	</div>

		  	<!-- INFORMAÇÕES PESSOAIS -->
		  	<div class="row pb-3">
		  		<div class="col text-center">
		  			<h5 class="card-title"><?php $system->session('nome'); ?></h5>
		  			<p class="card-text"><?php echo ($system->session('idade', true))==0?"Idade Não Informada":$_SESSION['idade']." anos" ?> | <?php echo strtoupper($system->session('instituicao', true))?></p>
		  		</div>
		  		<div class="row justify-content-end">
		  			<div class="col">
			  			<a <?php $system->hrefRoot('System/logoff.php'); ?> class="btn btn-raised btn-danger" style="margin-right: 10px">Logout</a>
			  		</div>
		  		</div>
		  	</div>
				
				<!-- TROFÉUS E ATRIBUIÇÕES -->
				<div class="row w-100 justify-content-center mb-3" style="margin: 0;padding: 0;background-color: #bababa">
					<span style="font-family: 'Roboto'">Troféus</span>
					<div class="trofeus">
						
					</div>
				</div>

		  	<div class="row">
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="cr">
				        <h5 class="card-title">
				        	<?php
				        		if($_SESSION['favorito'] == 'cr')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Clash Royale
				        </h5>
				        <p class="card-text">16 Jogadores.<br>MD3</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="cs">
				        <h5 class="card-title">
				        	<?php
				        		if($_SESSION['favorito'] == 'cs')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Counter Strike
				        </h5>
				        <p class="card-text">16 Equipes: 5 Jogadores.<br>MD2 (Ranking)</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="fifa">
				        <h5 class="card-title">
				        	<?php
				        		if($_SESSION['favorito'] == 'fifa')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	FIFA 17
				        </h5>
				        <p class="card-text">16 Jogadores.<br>MD1</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-3">
				    <div class="card">
				      <div class="card-body" id="ff">
				        <h5 class="card-title">
				        	<?php
				        		if($_SESSION['favorito'] == 'ff')
											echo "<img ".$system->includer->img('svg/star_1.svg', true)." width='22'>";
									?>
				        	Free Fire
				        </h5>
				        <p class="card-text">8 Equipes: 4 Jogadores.<br>Ranking</p>
				      </div>
				    </div>
				  </div>
				</div>

				<?php if($_SESSION['pagamento']==1){ ?>
					<div class="alert alert-success" role="alert" style="margin-top: 15px">
					  Pagamento realizado com sucesso!
					</div>
				<?php }else{ 
								if($_SESSION['perm_pagamento']==0){
					?>
					<div class="alert alert-danger" role="alert" style="margin-top: 15px">
					  Você ainda não pagou a inscrição!
					</div>
				<?php 	}
							} ?>
		  
		  <?php
		  	if(($_SESSION['CS']==1 && !hasTeam('cs')) OR ($_SESSION['FF']==1 && !hasTeam('ff'))){
		  ?>
		  	<div class="alert alert-warning my-2" role="alert">
		  		Você ainda não entrou em uma equipe para <b><?php echo needsTeam() ?></b>. Sua vaga só será garantida quando você estiver em uma equipe.
		  	</div>

				<div class="card">
					<div class="card-body">
						<h5>Equipes</h5>
						<hr>
						<?php
							$system->includer->core('conexao');

							$id = $_SESSION['ID'];
							$sql = "SELECT * FROM `equipes`";
							$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
							$equipes = mysqli_fetch_all($query);

							function teamName($id, $equipes){
								for($i=0;$i<sizeof($equipes);$i++){
									if($equipes[$i][0] == $id){
										return $equipes[$i][1];
									}
								}
							}

							$sql = "SELECT * FROM `requisicoes` WHERE `requisicoes`.`conta` = '$id'";
							$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
							$arr = mysqli_fetch_all($query);

							for($i=0;$i<sizeof($arr);$i++){
								echo "<div class='alert alert-warning'>Você requisitou para entrar na equipe ".teamName($arr[$i][2], $equipes)."</div>";
							}

						?>
						<div id="equipes">
							<button type="button" class="btn btn-raised btn-primary" onclick="entrarEquipe()">Entrar para uma Equipe</button>
							<button type="button" class="btn btn-raised btn-primary" onclick="criarEquipe()">Criar uma Equipe</button>
						</div>
					</div>
					</div>
				</div>
			
			<?php
				}

				if(alreadyInTeam()){
			?>
				
				<div class="card mt-2">
					<div class="card-body">
						<h5>Equipes</h5>
						<hr>
						<div id="equipes">
							<?php 
								for($i=0;$i<teams();$i++){
									team($i);
								}
							?>
						</div>
					</div>
				</div>

			<?php
				}
			?>
		  </div>
		</div>
	</div>

	<div style="position: fixed; bottom: -50px; right: -50px;" id='toast-main'>
		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="toast-header">
		    <strong class="mr-auto">Aviso</strong>
		    <small>Equipes</small>
		    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		      <span aria-hidden="true">&times;</span>
		    </button>
		  </div>
		  <div class="toast-body" style="background-color:#f46b42;color:white" id='toast-content'>
		    Usuário Rejeitado com sucesso
		  </div>
		</div>
	</div>

  <?php $system->includer->js();?>
  <?php $system->includer->js('system');?>
  <?php $system->includer->js('equipes');?>
  <script type="text/javascript">
  	$("#myProfile").removeClass("btn-secondary");
		$("#myProfile").addClass("btn-primary");
  </script>
  <button type="hidden" id="toast-b" class="btn btn-secondary" data-toggle="snackbar" data-style="toast" data-content="Toast."></button>
</body>
</html>

<?php
	if($_SESSION['CR'] == 0){echo "<script>$('#cr').addClass('bg-secondary');</script>";}
	if($_SESSION['CS'] == 0){echo "<script>$('#cs').addClass('bg-secondary');</script>";}
  if($_SESSION['FIFA'] == 0){echo "<script>$('#fifa').addClass('bg-secondary');</script>";} 
	if($_SESSION['FF'] == 0){echo "<script>$('#ff').addClass('bg-secondary');</script>";}
	echo "<input type='hidden' name='id' id='get_id' value=".$_SESSION['ID'].">";
	echo "<input type='hidden' name='id' id='get_cs' value=".$_SESSION['CS'].">";
	echo "<input type='hidden' name='id' id='get_ff' value=".$_SESSION['FF'].">";
	echo "<input type='hidden' name='id' id='hasTeam_cs' value=" . ((hasTeam('cs'))?1:0) . ">";
	echo "<input type='hidden' name='id' id='hasTeam_ff' value=" . ((hasTeam('ff'))?1:0) . ">";
?>