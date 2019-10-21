<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

	if($_SESSION["perm_editar"] == 1 OR $_SESSION["perm_visualizar"] == 1){?>
		<style type="text/css">
			#edit_bar{
		    overflow-x: auto;
		    white-space: nowrap;
			}
		</style>
		<div class='card w-100' id='edit_bar'>
	  	<div class='card-body'>
	    	<a <?php $system->hrefRoot('Conta/'); ?> class='btn' id='myProfile'>Perfil</a>
	    	<a <?php $system->hrefRoot('Administrador/Jogadores/'); ?> class='btn' id='players'>Jogadores</a>
	    	<a <?php $system->hrefRoot('Administrador/Equipes/'); ?> class='btn' id='equipes-topbar'>Equipes</a>
	    	<a <?php $system->hrefRoot('Administrador/Visao_Geral/'); ?> class='btn' id='overview'>Visão Geral</a>
	  	</div>
		</div>
		<?php
	}
?>