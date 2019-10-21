<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	require $system->includer->core('checklogin',[NAME_ONLY]);
	require $system->includer->core('checkperm',[NAME_ONLY]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Visão Geral</title>

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
		  	
		  	<h5>
		  		<button onclick="javascript:history.back()" style="background-color: transparent;border:none;">
			  		<img <?php $system->includer->img('svg/back.svg')?> width="15">
			  	</button>
			  	Telefones
			  </h5>
		  	<?php
		  		require $system->includer->core('conexao',[NAME_ONLY]);

		  		$sql = "SELECT * FROM `contas`";
		  		$query = mysqli_query($con, $sql) or die("<h1>Erro ao se conectar ao banco de dados</h1>");

		  		$arr = mysqli_fetch_all($query);

		  		//Usuários Cadastrados
		  		$usuarios = sizeof($arr);

		  		for($i=0;$i<$usuarios;$i++){
		  			if($arr[$i][19]!=0){
		  				?>
								<div class="card w-100 mt-3">
									<div class="card-body">
										<div class="row">
											<div class="col"> <?php echo $arr[$i][3] ?> </div>
											<div class="col" id=<?php echo $i ?>> 
												<span id=<?php echo "'telefone-".$i."'"?>> <?php echo $arr[$i][19]?> </span>
												<button href="#" style='background-color: transparent;border: none;' onclick=<?php echo "copyClip(".$i.")"?>>
													<img <?php $system->includer->img('svg/copy.svg') ?> width="20">
												</button>
											</div>
										</div>
									</div>
								</div>
		  				<?php
		  			}
		  		}

		  	?>
		</div>
	</div>
	<div id="clip-div"></div>

  <?php $system->includer->js(); ?>
  <script type="text/javascript">
  	function copyClip (id) {
  		let content = $("#telefone-"+id).html();
  		$("#clip-div").html("<input type='text' style='opacity:0' id='clip' value="+content+">");
  		$("#clip").select();
  		document.execCommand("copy");
  		$("#clip-div").html("");
  	}
  </script>
</body>
</html>