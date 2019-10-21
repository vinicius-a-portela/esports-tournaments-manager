<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

	require $system->includer->core('checklogin', [NAME_ONLY]);
	require $system->includer->core('checkperm', [NAME_ONLY]);
	require $system->includer->core('teams', [NAME_ONLY]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Equipes</title>

	<?php $system->meta()?>
	<?php $system->includer->bootstrapCSS()?>
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
					require $system->includer->core('conexao',[NAME_ONLY]);

					$sql = "SELECT * FROM `equipes`";
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
									<div class="col-md-2 col-lg-2 col-sm-12">
										<?php echo $row['nome']?>
									</div>
									<div class="col-md-2 col-lg-2 col-sm-12 text-center">
										<?php echo ($row['modalidade']=='cs')?"Counter Strike":"Free Fire" ?>
									</div>
									<div class="col-md-8 col-lg-8 col-sm-12 text-center">
										<?php
											$sql = "SELECT * FROM `equipes`";
											$query2 = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados<h1>");

											$arr = mysqli_fetch_all($query2);
											$_SESSION['arr'] = $arr;

											require $system->includer->core('conexao',[NAME_ONLY]);
											$outro = $row['ID'];
											$sql = "SELECT * from `equipecontas` WHERE `equipecontas`.`equipe` = '$outro'";
											$query3 = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
											
											echo "<h7>Membros:</h7><br>";
											while($row2 = mysqli_fetch_array($query3)){
												echo "<span style='font-size: 13px'>".nameOf($row2['conta'])."</span><br>";
											}
										?>
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
  <script type="text/javascript">
  	$("#equipes-topbar").removeClass("btn-secondary");
		$("#equipes-topbar").addClass("btn-primary");
  </script>
</body>
</html>