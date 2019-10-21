<?php
  require $_SERVER['DOCUMENT_ROOT'].substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1).'autoload.php'; 
  
  $system->session();

	if(!($_SESSION['perm_visualizar']==1) OR !($_SESSION['perm_editar']==1)){
		header('location: '.$system->root('entrar/'));
	}