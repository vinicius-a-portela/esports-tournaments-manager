<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "jogoseletronicos";

	$con = mysqli_connect($server,$user,$pass,$database) or die("<h1>Erro ao se conectar ao banco de dados</h1>");
	$con->set_charset("utf8");