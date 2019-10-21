<?php
  require $_SERVER['DOCUMENT_ROOT'].substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1).'autoload.php'; 

  $system->session();

	if(!isset($_SESSION['logged'])){
		header('location: '.$system->root('entrar/'));
	}
?>