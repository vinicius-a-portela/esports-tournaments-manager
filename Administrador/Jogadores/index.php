<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	require $system->includer->core('checklogin',[NAME_ONLY]);
	require $system->includer->core('checkperm',[NAME_ONLY]);

	function TurmaOf($id){
		$system = $GLOBALS['system'];
		require $system->includer->core('conexao',[NAME_ONLY]);
		$sql = "SELECT * FROM `turmas` WHERE `turmas`.`ID`='$id'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
		$turmas = mysqli_fetch_all($query);

		if(mysqli_num_rows($query)){
			$turmaSQL = $turmas[0][1];

			$sql = "SELECT * FROM `cursos` WHERE `cursos`.`ID` = '$turmaSQL'";
			$query = mysqli_query($con, $sql) or die("<h1>Erro ao Conectar ao Banco de Dados</h1>");
			$cursos = mysqli_fetch_all($query);

			echo $cursos[0][1]." ".$turmas[0][2];
		}
	}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogadores</title>

	<?php $system->meta(); ?>
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
		?>
		<div class="card w-100 mt-3">
		  <div class="card-body">
				<?php
					require $system->includer->core('conexao', [NAME_ONLY]);

					$sql = "SELECT * FROM `contas`";
					$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados<h1>");

					?>
						<div class="mb-3">
							<span><?php echo mysqli_num_rows($query)?> Resultados</span>
						</div>
					<?php

					while($row = mysqli_fetch_array($query)){
					?>
						<div class="card w-80 mb-2">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4 col-sm-12">
										<?php echo $row['nome']?><br>
										<span style="font-size: 10px;"><?php echo TurmaOf($row['turma']) ?></span>
									</div>
									<div class="col-lg-4 col-sm-12">
										<button <?php echo "class='btn btn-raised btn-".(($row['CR']==0)?("secondary"):("primary"))." mod CR' id=".$row['ID'] ?>>CR</button>
										<button <?php echo "class='btn btn-raised btn-".(($row['CS']==0)?("secondary"):("primary"))." mod CS' id=".$row['ID']?>>CS</button>
										<button <?php echo "class='btn btn-raised btn-".(($row['FIFA']==0)?("secondary"):("primary"))." mod FIFA' id=".$row['ID']?>>FIFA</button>
										<button <?php echo "class='btn btn-raised btn-".(($row['FF']==0)?("secondary"):("primary"))." mod FF' id=".$row['ID']?>>FF</button>
									</div>
									<div class="col-lg-4 col-sm-12 text-right">
										<button <?php echo "class='pag btn btn-raised btn-".(($row['pagamento']==1 OR $row['perm_pagamento']==1)?"success":"danger")."'" ?> id=<?php echo $row['ID']?>>Pago</button>
										<a <?php echo "href='".$system->root('administrador/editar/index.php')."?user=".$row['ID']."'" ?> class="btn btn-raised btn-primary">Editar</a>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
				?>
		  </div>
		</div>
	</div>

  <?php $system->includer->js(); ?>
  <?php $system->includer->js('system'); ?>
  <script type="text/javascript">
  	$("#players").removeClass("btn-secondary");
		$("#players").addClass("btn-primary");

		$(".mod").click(function(){
			let id = $(this).attr('id');
			let mod = $(this).html();
			let current = $(this).hasClass('btn-secondary')?1:0;
			let self = $(this);

			$.post(system.root()+"system/change_mod.php",{jogador: id, modalidade: mod})
			.done(function(data){
				if(data == 'ok'){
					if(current){
						self.removeClass("btn-secondary");
						self.addClass("btn-primary");
					}else{
						self.removeClass("btn-primary");
						self.addClass("btn-secondary");
					}
				}
			})
			.fail(function(){
				alert("Erro ao Modificar Valor");
			});
		});

		$(".pag").click(function(){
			let id = $(this).attr('id');
			let current = $(this).hasClass('btn-success')?1:0;
			let self = $(this);

			$.post(system.root()+"system/change_pag.php",{jogador: id})
			.done(function(data){
				if(data == 'ok'){
					if(current){
						self.removeClass("btn-success");
						self.addClass("btn-danger");
					}else{
						self.removeClass("btn-danger");
						self.addClass("btn-success");
					}
				}
			})
			.fail(function(){
				alert("Erro ao Modificar Valor");
			});
		});
  </script>
</body>
</html>