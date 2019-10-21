<?php
	include __DIR__.'/System/vars.php';

	spl_autoload_register(function($class){
		$url = __DIR__."/Core/$class.php";
		if(file_exists($url)){
			include $url;
		}
	});

	$GLOBALS['system'] = new System();
	$system = new System();