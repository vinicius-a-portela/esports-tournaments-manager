<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | FIFA</title>
  <?php $system->meta()?>
  <?php $system->includer->bootstrapCSS()?>
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

	<!-- Counter -->
	<div class="container">
		<div class="jumbotron jumbotron-fluid">
		  	<div class="container">
		    	<h1 class="display-4">FIFA 17</h1>

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
                  <img src="fifa_1.jpg" class="w-100 center" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="fifa_2.jpg" class="w-100 center" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="fifa_3.jpg" class="w-100 center" alt="...">
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
			<p class="lead">O FIFA 17 mergulha você em experiências autênticas de futebol, aproveitando a sofisticação de um novo mecanismo de jogo, ao apresentar a você jogadores de futebol cheios de profundidade e emoção, e levando você a novos mundos acessíveis apenas no jogo. Inovação completa na forma como os jogadores pensam e se movem, interagem fisicamente com os adversários e executam no ataque, permitindo que você possua cada momento em campo.</p>
			<p style="font-size:11pt; font-weight:bold; color: #212529;"> PLATAFORMA: Microsoft Windows (Pode se jogar com gamepad caso prefira) </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DATA DE LANÇAMENTO: 4 Jan, 2016 </p>
			<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DESENVOLVEDOR: Eletronic Arts Vancouver, Eletronic Arts Bucharest </p>
          </div>
		    	<p class="lead"></p>	
			</div>
		</div>
	</div>
	<?php $system->includer->js();?>
  <script>
    $('#nav-fifa').addClass('active');
  </script>
</body>
</html>