<?php
$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

  require $system->includer->core('checklogin',[NAME_ONLY]);
  require $system->includer->core('checkperm',[NAME_ONLY]);
  require $system->includer->core('checkperm_editar',[NAME_ONLY]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Visão Geral</title>

	<?php $system->meta() ?>
	<?php $system->includer->bootstrapCSS() ?>
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
		?>

		<div class="card w-100 mt-3">
		  <div class="card-body">
		  	<?php
		  		require $system->includer->core('conexao', [NAME_ONLY]);

		  		$sql = "SELECT * FROM `contas`";
		  		$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados</h1>");

		  		$arr = mysqli_fetch_all($query);

		  		//Usuários Cadastrados
		  		$usuarios = sizeof($arr);

		  		//Administradores, Arrecadado e Estimado
		  		$adm = 0;
		  		$arrecadado = 0;
		  		$estimado = 0;

		  		for($i=0;$i<$usuarios;$i++){
		  			//Quant Administradores
		  			if($arr[$i][12]==1 OR $arr[$i][14]==1){
		  				$adm++;
		  			}

		  			//Quantidade Arrecadada
		  			if($arr[$i][11]==1){
		  				//6-9, Modalidades
		  				$modalidades = 0;
		  				$ganho = 0;

		  				$arr[$i][6]==1?$modalidades++:null;
		  				$arr[$i][7]==1?$modalidades++:null;
		  				$arr[$i][8]==1?$modalidades++:null;
		  				$arr[$i][9]==1?$modalidades++:null;

		  				switch ($modalidades) {
		  					case 0:
		  						$ganho = 0;
		  						break;

		  					case 1:
		  						$ganho = 5;
		  						break;
		  					
		  					default:
		  						$ganho = 5 + (2*($modalidades-1));
		  				}
		  				//$modalidades = (int)$arr[$i][6].(int)$arr[$i][7].(int)$arr[$i][8].(int)$arr[$i][9];
		  				$arrecadado += $ganho;
		  			}

		  			//Quantidade Estimada de Arrecadação
		  			if($arr[$i][13]!=1){

		  				$modalidades = 0;
		  				$ganho = 0;

		  				$arr[$i][6]==1?$modalidades++:null;
		  				$arr[$i][7]==1?$modalidades++:null;
		  				$arr[$i][8]==1?$modalidades++:null;
		  				$arr[$i][9]==1?$modalidades++:null;

		  				switch ($modalidades) {
		  					case 0:
		  						$ganho = 0;
		  						break;

		  					case 1:
		  						$ganho = 5;
		  						break;
		  					
		  					default:
		  						$ganho = 5 + (2*($modalidades-1));
		  				}
		  				//$modalidades = (int)$arr[$i][6].(int)$arr[$i][7].(int)$arr[$i][8].(int)$arr[$i][9];
		  				$estimado += $ganho;
		  			}
		  		}

		  		$sql = "SELECT * FROM `equipes`";
		  		$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados</h1>");
		  		$equipes = mysqli_num_rows($query);
		  	?>
				<h5>Visão Geral</h5>

				<div class="row w-100">
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="30" <?php $system->includer->img('svg/adm.svg'); ?>><br>
								Administradores: <br>
								<?php echo $adm?>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="30" <?php $system->includer->img('svg/user.svg'); ?>><br>
								Usuários Cadastrados: <br>
								<?php echo $usuarios?>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="30" <?php $system->includer->img('svg/users.svg'); ?>><br>
								Equipes Cadastradas: <br>
								<?php echo $equipes?>
							</div>
						</div>
					</div>					
				</div>


				<div class="row w-100 mt-3">
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="30" <?php $system->includer->img('svg/arrecadado.svg'); ?>><br>
								Dinheiro Arrecadado:<br>
								R$ <?php echo $arrecadado?>,00
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="30" <?php $system->includer->img('svg/estimado.svg'); ?>><br>
								Dinheiro Estimado: <br>
								R$ <?php echo $estimado?>,00
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body text-center">
								<img width="22" <?php $system->includer->img('svg/user_online.svg'); ?>><br>
								Usuários Online: <br>
								<i>Desconhecido</i>
							</div>
						</div>
					</div>					
				</div>
				
				<h5 class="mt-3">Funções</h5>
				<a <?php $system->hrefRoot('Administrador/Telefones/') ?> class="btn btn-raised btn-primary my-2">Pegar Lista de Telefones</a><br>
				<a <?php $system->hrefRoot('Administrador/Emails/') ?> class="btn btn-raised btn-primary">Pegar Lista de Emails</a>
		</div>
	</div>
	<?php $system->includer->js() ?>
  <script type="text/javascript">
  	$("#overview").removeClass("btn-secondary");
		$("#overview").addClass("btn-primary");
  </script>
</body>
</html>