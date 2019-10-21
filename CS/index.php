<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos | CS</title>
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
			<h1 class="display-4">Counter Strike: Global Offensive</h1>
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
                  				<img src="cs_1.jpg" class="w-100 center" alt="...">
                			</div>
                			<div class="carousel-item">
                  				<img src="cs_2.jpg" class="w-100 center" alt="...">
                			</div>
                			<div class="carousel-item">
                  				<img src="cs_3.jpg" class="w-100 center" alt="...">
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
					<p class="lead">Counter-Strike: Global Offensive (CS: GO) expande a jogabilidade de ação baseada em equipes que foi pioneira quando foi lançada há 19 anos. O CS: GO apresenta novos mapas, personagens, armas e modos de jogo, e oferece versões atualizadas do conteúdo do CS clássico (de_dust2, etc.).</p>
					<p class="lead" style="font-size:11pt; font-weight:bold; color: #212529;"> PLATAFORMA: Microsoft Windows </p>
					<p class="lead" style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DATA DE LANÇAMENTO: 21 Ago, 2012 </p>
					<p style="font-size:11pt; font-weight:bold; color:rgb(33, 37, 41)"> DESENVOLVEDOR: Valve, Hidden Path Entertainment </p>
		  		</div>
			</div>
			<br>
			<br>
			<br>
		  
		  	<h2 class="display-5"> Conheça os mapas que vão ser jogados</h2><br>
			  <div class="row">
			  		<div class="col-lg-4 col-md-12 col-sm-12">
					  	<p class="lead" style="font-size:16pt; font-weight:bold;"> Dust II (de_dust2) </p>
						<hr>
						<p class="lead"> Dust II, também conhecido como Dust2 (de_dust2) é um mapa de Defusamento de Bombas que aparece na série Counter-Strike. É o sucessor de Dust (de_Dust).
						Um dos mapas mais populares da série Counter-Strike devido ao seu forte equilíbrio, o Dust II é um mapa icônico da franquia Counter-Strike. É amplamente jogado em muitos servidores e é uma escolha popular para torneios de Counter-Strike também.</p>
		  			</div>

          			<div class="col-lg-8 col-md-12 col-sm-12">
            			<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
              					<ol class="carousel-indicators">
                					<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                					<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                					<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
              					</ol>
            				<div class="carousel-inner">
                				<div class="carousel-item active">
                  					<img src="dust1.jpg" class="w-100 center" alt="...">
                				</div>
                				<div class="carousel-item">
                  					<img src="dust2.jpg" class="w-100 center" alt="...">
                				</div>
                				<div class="carousel-item">
                  					<img src="dust3.webp" class="h-100 center" alt="...">
                				</div>
							</div>
				
              				<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                				<span class="sr-only">Previous</span>
              				</a>
              				<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            					<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
            			</div>
		  			</div>
				</div>

				<br>
				<br>
				<br>

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
                  				<img src="cs_1.jpg" class="w-100 center" alt="...">
                			</div>
                			<div class="carousel-item">
                  				<img src="cs_2.jpg" class="w-100 center" alt="...">
                			</div>
                			<div class="carousel-item">
                  				<img src="cs_3.jpg" class="w-100 center" alt="...">
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
				  			<p class="lead" style="font-size:16pt; font-weight:bold;"> Mirage (de_mirage) </p>
							<hr>
							<p class="lead">Mirage é um mapa de Defusamento de Bombas. O mapa foi adicionado ao jogo em 6 de junho de 2013.
							Criado por Michael "BubkeZ" Hull. Hull criou originalmente o de_cpl_strike para a CyberLife Professional League (CPL). Hull mais tarde criou uma versão não-CPL do mapa e nomeou Mirage (de_mirage).
							Depois que a Global Offensive foi lançada, a Valve decidiu refazer o mapa e incluir o mapa como um mapa oficial de defesa contra bombas.A Valve atualizou o visual e ajustou a jogabilidade para um melhor jogo competitivo. Por exemplo, as versões originais do Mirage tinham arquitetura semelhantes à o estilo italiano, mas depois foram atualizadas para refletir um estilo marroquino.
							</p>
		  				</div>
				</div>

				<br>
				<br>
				<br>

				<div class="row">
			  		<div class="col-lg-4 col-md-12 col-sm-12">
					  	<p class="lead" style="font-size:16pt; font-weight:bold;"> Dust II (de_dust2) </p>
						<hr>
						<p class="lead"> Dust II, também conhecido como Dust2 (de_dust2) é um mapa de Defusamento de Bombas que aparece na série Counter-Strike. É o sucessor de Dust (de_Dust).
						Um dos mapas mais populares da série Counter-Strike devido ao seu forte equilíbrio, o Dust II é um mapa icônico da franquia Counter-Strike. É amplamente jogado em muitos servidores e é uma escolha popular para torneios de Counter-Strike também.</p>
		  			</div>

          			<div class="col-lg-8 col-md-12 col-sm-12">
            			<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
              					<ol class="carousel-indicators">
                					<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                					<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                					<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
              					</ol>
            				<div class="carousel-inner">
                				<div class="carousel-item active">
                  					<img src="dust1.jpg" class="w-100 center" alt="...">
                				</div>
                				<div class="carousel-item">
                  					<img src="dust2.jpg" class="w-100 center" alt="...">
                				</div>
                				<div class="carousel-item">
                  					<img src="dust3.webp" class="h-100 center" alt="...">
                				</div>
							</div>
				
              				<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                				<span class="sr-only">Previous</span>
              				</a>
              				<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            					<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
            			</div>
		  			</div>
				</div>
		</div>
</div>
	<?php $system->includer->js(); ?>
  <script>
    $('#nav-cs').addClass('active');
  </script>
</body>
</html>