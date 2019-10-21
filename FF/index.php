<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | FF</title>

  <?php $system->meta() ?>
	<?php $system->includer->bootstrapCSS() ?>
</head>

<style type="text/css">
.d-block w-100-hor{
  text-align: d-block w-100;
}

.time .subtime{
	color: white;
	padding: 30px 0px;
	margin: 0px 10px;
	font-size: 25px;
}

.d-block w-100 {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.carousel-inner {
	
	background-color : #212529;
}

$.carousel{
  interval: 2000
}

.lead {
	text-align: justify;
	font-size: 12pt;
}

</style>

<body>
	<?php
		$system->includer->navbar();
	?>
	<div class="container">
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Garena Free Fire</h1>
			<div class="row">
          <div class="col-lg-8 col-md-12 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="ff_1.jpg" class="w-100 center" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="ff_2.png" class="w-100 center" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="ff_3.png" class="w-100 center" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
			<p class="lead">Free Fire é um jogo de tiro de sobrevivência disponível no celular. Cada jogo de 10 minutos coloca você em uma ilha remota onde você está enfrentando 49 outros jogadores, todos buscando sobrevivência. Os jogadores escolhem livremente o seu ponto de partida com o pára-quedas e pretendem permanecer na zona de segurança pelo maior tempo possível. Dirija os veículos para explorar o vasto mapa, esconda-se nas trincheiras ou fique invisível ao pregar sob a grama. Emboscada, snipe, sobreviver, há apenas um objetivo: sobreviver e responder ao chamado do dever.</p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color: #212529;"> PLATAFORMA: Android </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DATA DE LANÇAMENTO: 4 Dez, 2017 </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DESENVOLVEDOR: Garena </p>
          </div>
		  </div>
		  </div>
		</div>
	</div>
  <?php $system->includer->js(); ?>
  <script>
    $('#nav-ff').addClass('active');
  </script>
</body>
</html>