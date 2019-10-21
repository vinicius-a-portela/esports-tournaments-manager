<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark py-3 shadow">
  <a class="navbar-brand" <?php $system->hrefRoot() ?>>
    <img <?php $system->srcImg('logo.png')?> width="30" height="30" class="d-inline-block align-top">
    Jogos Eletrônicos
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" <?php $system->hrefRoot() ?> id="nav-principal">Principal</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" <?php $system->href($system->root()."Regulamentos")?> id="nav-regulamento">Regulamento</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modalidades
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" <?php $system->href($system->root()."CR")?> id="nav-cr">Clash Royale</a>
          <a class="dropdown-item" <?php $system->href($system->root()."CS")?> id="nav-cs">Counter Strike</a>
          <a class="dropdown-item" <?php $system->href($system->root()."FIFA")?> id="nav-fifa">FIFA 17</a>
          <a class="dropdown-item" <?php $system->href($system->root()."FF")?> id="nav-ff">Free Fire</a>
        </div>
      </li>

      <li class="nav-item">
      	<a class="nav-link" <?php $system->href($system->root()."Colaboradores")?> id="nav-colaboradores">Colaboradores e Outros Eventos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" id="nav-partidas">Partidas</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
			<li class="nav-item active">
    		<a id="nav-account" style="color: white" <?php $system->href($system->root()."Entrar")?>>
          <img <?php $system->includer->img("svg/account.svg");?> width="30" height="30" class="d-inline-block align-top">
    		<?php
    			$system->session();

    			if(isset($_SESSION['logged'])){
    				if(isset($_SESSION['nickname'])){
    					echo $_SESSION['nickname'];
    				}else echo $_SESSION['nome'];
    			}else echo 'Entrar';
    		?></a>
			</li>
    </ul>
  </div>
</nav>
<div style="height: 90px"></div>