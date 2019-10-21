<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
	require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 

	session_start();

	session_destroy();

	header("location: ".$system->root());
?>