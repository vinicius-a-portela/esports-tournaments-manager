<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Jogos Eletrônicos</title>
	<?php $system->meta() ?>
	<?php $system->includer->bootstrapCSS(); ?>
</head>

<style type="text/css">
body{
	background-color: #ededed;
}

.center-hor {
  text-align: center;
}

.reg ol {
	text-align: justify; 
}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div class="container">
		<div class="card" style="width: 100%; margin: 10px 0px;">
		  <!--<img src="..." class="card-img-top" alt="...">-->
		  <div class="card-body">
		    <h4 class="card-title center-hor">Regulamento</h4>

		    <h6>REGULAMENTAÇÃO GERAL</h6>
		    <h8></h8>
		    <ol class="reg">
		    	<li style="margin: 20px">DAS CONDUTAS DOS JOGADORES E ESPECTADORES</li>
		    	<ol>
					  <li>Os participantes devem se comportar de uma maneira sociável, mantendo uma conduta amigável perante os competidores, espectadores e membros oficiais do evento.</li>
					  <li>Jogadores e espectadores deverão permanecer em silêncio enquanto estiverem próximos da área de competição. Falar é permitido, mas em um nível razoável e longe dos jogadores. É extremamente proibido que um espectador comunique-se com um jogador enquanto ele compete.</li>
					  <li>Não é permitido dirigir palavras, desafios, ironias gestos e afins ao adversário. Essa conduta pode ser penalizada com desclassificação automática do participante, porém caso haja justificativa a equipe organizadora irá analisar o caso posteriormente.</li>
					  <li>É extremamente proibido fumar ou fazer o uso de bebidas alcoólicas pelos participantes e pelos espectadores na área do torneio.</li>
					  <li>Qualquer tipo de compra de partidas pelas equipes irá resultar na desclassificação de ambas as equipes que estão envolvidas no caso,porém caso haja justificativa a equipe organizadora irá analisar o caso posteriormente.</li>
					  <li>A equipe organizadora poderá interromper o campeonato em qualquer momento caso por motivos de força maior assim o faça necessário.</li>
					  <li>As dúvidas não previstas neste regulamento serão julgadas por uma comissão composta por membros da equipe organizadora, cujas decisões serão soberanas e irrecorríveis.</li>
					  <li>A participação  dos participantes neste torneio acarreta-lós a aceitação total e irrestrita de todos os itens deste regulamento.</li>
					</ol>
					<li style="margin: 20px">DAS INSCRIÇÕES</li>
					<ol>
					  <li>O torneio está aberto a qualquer a qualquer aluno matriculado no Instituto Federal - Campus Santarém, e a EETEPA - SANTARÉM.</li>
					</ol>
		  	</ol>
		  </div>
		</div>
	</div>
	<?php $system->includer->js(); ?>
  <script>
    $('#nav-regulamento').addClass('active');
  </script>
</body>
</html>