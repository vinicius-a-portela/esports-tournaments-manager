<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

  $system->session();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | Principal</title>

	<!-- SOME SEO TAGS-->
	<meta name="description" content="Site Oficial dos Jogos Eletrônicos do IFPA - Campus Santarém | Se Inscreva, Veja as Modalidades, Acesse sua conta e Muito Mais.">
	<meta name="keywords" content="Jogos Eletrônicos, IFPA">
	<meta name="author" content="Simpx">

	<?php $system->meta()?>
	<?php $system->includer->bootstrapCSS()?>
</head>

<style type="text/css">
	.time .subtime{
		color: white;
		padding: 30px 0px;
		margin: 0px 10px;
		font-size: calc(20px + (30 - 20) * ((100vw - 300px) / (1600 - 300)));
		line-height: calc(1.3em + (1.5 - 1.3) * ((100vw - 300px)/(1600 - 300)));
	}
	
	.center{
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	
	/* Extra small devices (portrait phones, less than 576px)*/
	@media (min-width: 0px) {
		.b_image{
			margin-top: -60px;
		}

		.b_h3{
			margin-bottom: -10px;
		}
	}

	/* Small devices (landscape phones, less than 768px)*/
	@media (min-width: 767.98px) {
		.b_image{
			margin-top: -50px;
		}

		.b_h3{
			margin-bottom: -50px;
		}
	}

	/* Medium devices (tablets, less than 992px) */
	@media (min-width: 991.98px) {
		.b_image{
			margin-top: -32px;
		}

		.b_h3{
			
		}
	}

	/* Large devices (desktops, less than 1200px)
	@media (min-width: 1199.98px) {
		.b_image{
			margin-top: 0px;
		}
	}*/

	/*calc([minimum size] + ([maximum size] - [minimum size]) * ((100vw - [minimum viewport width]) / ([maximum viewport width] - [minimum viewport width])));*/
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div id="nav-placeholder"></div>

	<!-- Counter -->
	<div class="container">
		<div class="jumbotron jumbotron text-center">
			<h1 class="display-8" style="font-size: 5vmax;">Os jogos começam dia 17 de Agosto!</h1>
			<div class="row justify-content-center time">
				<div class="col-2 col-md-1 bg-info shadow-sm subtime rounded" id="days">0d</div>
				<div class="col-2 col-md-1 bg-info shadow-sm subtime rounded" id="hours">0h</div>
				<div class="col-2 col-md-1 bg-info shadow-sm subtime rounded" id="minutes">0m</div>
				<div class="col-2 col-md-1 bg-info shadow-sm subtime rounded" id="seconds">0s</div>
			</div>

			<h3 class="text-center mt-4">Venha participar da segunda edição dos Jogos Eletrônicos:</h3>
			<p class="text-center">Para se cadastrar basta clicar no botão abaixo</p>
			
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-lg-6 button-main">
						<a <?php $system->hrefRoot('Entrar/');?> class="btn btn-raised btn-primary px-5 w-100 float-lg-right" style="max-width: 150px">Entrar</a>
					</div>
					<div class="col-md-12 col-sm-12 col-lg-6 button-main">
						<a <?php $system->hrefRoot('Cadastrar/');?> class="btn btn-raised btn-primary px-5 w-100 float-lg-left" style="max-width: 170px">Cadastrar</a>
					</div>
				</div>
			</div>
			<h3 class="text-center b_h3 mt-4">Conheça as Modalidades:</h3>
		</div>
		<img src="bottom_part.png" class="w-100 b_image">

		<!-- CR -->
		<div class="row">
			<div class="col-sm-12 col-md-6">
				 <div id="slide-cr" class="carousel slide" data-ride="carousel">
				   <ol class="carousel-indicators">
				     <li data-target="#slide-cr" data-slide-to="0" class="active"></li>
				     <li data-target="#slide-cr" data-slide-to="1"></li>
				   </ol>
				   <div class="carousel-inner" style="background-color: #212529">
				     <div class="carousel-item active">
				       <img class="d-block h-100 center" src="cr_2.jpg" alt="Primeiro Slide">
				     </div>
				     <div class="carousel-item">
				       <img class="d-block h-100 center" src="cr_3.jpg" alt="Segundo Slide">
				     </div>
				   </div>
				   <a class="carousel-control-prev" href="#slide-cr" role="button" data-slide="prev">
				     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				     <span class="sr-only">Anterior</span>
				   </a>
				   <a class="carousel-control-next" href="#slide-cr" role="button" data-slide="next">
				     <span class="carousel-control-next-icon" aria-hidden="true"></span>
				     <span class="sr-only">Próximo</span>
				   </a>
			 </div>
			</div>
			<div class="col-sm-12 col-md-6">
				<h3 class="font-weight-bold">Clash Royale</h3>
					Clash Royale é um jogo mobile, desenvolvido pela Supercell. O jogo é um <i>tower defense</i> de 1v1.<br><br>
				
					Torneio:<br>
					16 Jogadores<br>
					Melhor de 3<br>
					<a class="btn btn-raised btn-primary mt-2" <?php $system->hrefRoot('CR/');?>>Ver mais</a>
			</div>
		</div>

		<!-- CS -->
		<div class="row mt-4">
			<div class="col-sm-12 col-md-6">
				 <h3 class="font-weight-bold">Counter Strike</h3>
				 	Counter Strike é um jogo de PC, desenvolvida pela Valve. O jogo é um FPS baseado em duas equipes, a terrorista e a contra-terrorista.<br><br>
				 
				 	Torneio:<br>
				 	16 Equipes<br>
				 	<a class="btn btn-raised btn-primary mt-2" <?php $system->hrefRoot('CS/');?>>Ver mais</a>
			</div>
			<div class="col-sm-12 col-md-6 order-first order-md-2">
				 <div id="slide-cs" class="carousel slide" data-ride="carousel">
				   <ol class="carousel-indicators">
				     <li data-target="#slide-cs" data-slide-to="0" class="active"></li>
				     <li data-target="#slide-cs" data-slide-to="1"></li>
				   </ol>
				   <div class="carousel-inner">
				     <div class="carousel-item active">
				       <img class="d-block w-100" src="cs_1.jpg" style="height: 250px" alt="Primeiro Slide">
				     </div>
				     <div class="carousel-item">
				       <img class="d-block w-100" src="cs_2.jpg" style="height: 250px" alt="Segundo Slide">
				     </div>
				   </div>
				   <a class="carousel-control-prev" href="#slide-cs" role="button" data-slide="prev">
				     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				     <span class="sr-only">Anterior</span>
				   </a>
				   <a class="carousel-control-next" href="#slide-cs" role="button" data-slide="next">
				     <span class="carousel-control-next-icon" aria-hidden="true"></span>
				     <span class="sr-only">Próximo</span>
				   </a>
			 	</div>
			</div>
		</div>
		

		<!-- FIFA -->
		<div class="row mt-4">
			<div class="col-sm-12 col-md-6">
				 <div id="slide-fifa" class="carousel slide" data-ride="carousel">
				   <ol class="carousel-indicators">
				     <li data-target="#slide-fifa" data-slide-to="0" class="active"></li>
				     <li data-target="#slide-fifa" data-slide-to="1"></li>
				   </ol>
				   <div class="carousel-inner" style="background-color: #212529">
				     <div class="carousel-item active">
				       <img class="d-block w-100 center" src="fifa_1.jpg" alt="Primeiro Slide">
				     </div>
				     <div class="carousel-item">
				       <img class="d-block w-100 center" src="fifa_2.jpg" alt="Segundo Slide">
				     </div>
				   </div>
				   <a class="carousel-control-prev" href="#slide-fifa" role="button" data-slide="prev">
				     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				     <span class="sr-only">Anterior</span>
				   </a>
				   <a class="carousel-control-next" href="#slide-fifa" role="button" data-slide="next">
				     <span class="carousel-control-next-icon" aria-hidden="true"></span>
				     <span class="sr-only">Próximo</span>
				   </a>
			 </div>
			</div>
			<div class="col-sm-12 col-md-6">
				<h3 class="font-weight-bold">FIFA</h3>
					FIFA é um jogo principalmente visado pro console, desenvolvido pela Eletronic Arts. Se trata de um jogo de futebol 1v1.<br><br>
				
					Torneio:<br>
					16 Jogadores<br>
					Melhor de 1<br>
					<a class="btn btn-raised btn-primary mt-2" <?php $system->hrefRoot('FIFA/');?>>Ver mais</a>
			</div>
		</div>

		
		<!-- Free Fire -->
		<div class="row mt-4">
			<div class="col-sm-12 col-md-6">
				
				 <h3 class="font-weight-bold">Free Fire</h3>
				 	Free Fire é um jogo de mobile, desenvolvida pela 111dots Studio, publicado pelo estúdio Garena. O jogo se trar de um battleroyale, onde o último sobrevivente é o sobrevivente.<br><br>
				 
				 	Torneio:<br>
				 	8 Equipes<br>
				 	<a class="btn btn-raised btn-primary mt-2" <?php $system->hrefRoot('FF/');?>>Ver mais</a>
			</div>
			<div class="col-sm-12 col-md-6 order-first order-md-2">
				 <div id="slide-ff" class="carousel slide" data-ride="carousel">
				   <ol class="carousel-indicators">
				     <li data-target="#slide-ff" data-slide-to="0" class="active"></li>
				     <li data-target="#slide-ff" data-slide-to="1"></li>
				   </ol>
				   <div class="carousel-inner">
				     <div class="carousel-item active">
				       <img class="d-block w-100" src="ff_1.jpg" alt="Primeiro Slide">
				     </div>
				     <div class="carousel-item">
				       <img class="d-block w-100" src="ff_2.png" alt="Segundo Slide">
				     </div>
				   </div>
				   <a class="carousel-control-prev" href="#slide-ff" role="button" data-slide="prev">
				     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				     <span class="sr-only">Anterior</span>
				   </a>
				   <a class="carousel-control-next" href="#slide-ff" role="button" data-slide="next">
				     <span class="carousel-control-next-icon" aria-hidden="true"></span>
				     <span class="sr-only">Próximo</span>
				   </a>
			 	</div>
			</div>
		</div>
	</div>

	<div class="row align-items-center bg-warning w-100 mt-4" style="color:white; margin: 0; padding:0;">
		<div class="col align-self-center ml-4">
			Interessado?
		</div>
		<div class="col">
			<a class="btn btn-raised btn-primary float-right my-3 mr-3" style="font-size: 13px" <?php $system->hrefRoot('Cadastrar/')?>>Se Inscrever</a>
		</div>
	</div>

	<?php
		$system->includer->footer();
		$system->includer->js();
		$system->includer->js('counter');
	?>
  <script>
   	$('#nav-principal').addClass('active');
  </script>
</body>
</html>