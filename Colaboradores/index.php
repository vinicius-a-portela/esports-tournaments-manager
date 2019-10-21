<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | Colaboradores</title>
	<?php $system->meta()?>
  <?php $system->includer->bootstrapCSS()?>
</head>

<style type="text/css">
.center-hor{
  text-align: center;
}

.time .subtime{
	color: white;
	padding: 30px 0px;
	margin: 0px 10px;
	font-size: 25px;
}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>
	<div class="container">
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Colaboradores</h1>
		    <p class="lead">Conheça os colaboradores e eventos que são realizados em conjunto com os Jogos Eletrônicos do IFPA - Santarém.<br>
		    Uma escola foi escolhida para participar e auxiliar a realização do evento dos Jogos Eletrônicos</p>

		    <h3>EETEPA<a target="_blank" href="https://sites.google.com/escola.seduc.pa.gov.br/eetepa-santarem"><img <?php $system->includer->img('svg/link.svg')?>></a></h3>
		    <p>A Escola de Ensino Técnico do Estado do Pará foi a instituição de ensino pública escolhida pela organização dos jogos</p>

		    <h3>Desenvolvimento do Site</h3>
		    <p>O site está sendo desenvolvido por:<br>
		    <b>Vinícius de Araújo Portela</b>, Estudante do IFPA - Santarém, Informática 2016.<br><br>
		    Contando com o apoio de:<br>
		    <b>Gabriel Cesar Silva</b>, Estudante do IFPA - Santarém, Informática 2017.</p>
		  </div>
		</div>
	</div>
	<?php $system->includer->js();?>
  <script>
    $('#nav-colaboradores').addClass('active');
  </script>
</body>
</html>