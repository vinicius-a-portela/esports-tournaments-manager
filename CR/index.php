<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | CR</title>
  <?php $system->meta()?>
  <?php $system->includer->bootstrapCSS()?>
</head>

<style type="text/css">
.center {
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

.carousel-inner .carousel-item{
  
}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<!-- Counter -->
	<div class="container">
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Clash Royale</h1>
			<hr>
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
                  <img src="cr_1.jpg" class="w-100 center">
                </div>
                <div class="carousel-item">
                  <img src="cr_2.jpg" class="h-100 center">
                </div>
                <div class="carousel-item">
                  <img src="cr_3.jpg" class="h-100 center">
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
            <p class="lead"> Entre na arena! Os criadores do Clash of Clans trazem um jogo multijogador em tempo real com os Royales, seus personagens favoritos do Clash e muito, muito mais.
            Jogue com várias cartas de tropas, feitiços e estruturas de defesa do Clash of Clans, além dos Royales: príncipe, cavaleiro, bebê dragão e muito mais. Derrube o Rei e as Princesas do inimigo de cima das torres para derrotá-los e ganhar troféus, coroas e glória na arena. Forme um clã para compartilhar cartas e construir sua própria comunidade.</p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color: #212529;"> PLATAFORMA: Android </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DATA DE LANÇAMENTO: 4 Jan, 2016 </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DESENVOLVEDOR: Supercell </p>
          </div>
        </div>
		  </div>
		</div>
	</div>
	<?php $system->includer->js(); ?>
  <script>
    $('#nav-cr').addClass('active');
  </script>

</body>
</html>