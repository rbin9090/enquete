	<link rel="stylesheet" type="text/css" href="css/style.css">


<?php
if (file_exists('conn.php')) {
include 'conn.php';
}else{
	die('<aviso>Sistema incompleto, falta arquivo para comunicação com o servidor</aviso><hr>,<i>Inglês: </i><warning>Incomplete system, missing file for communication with the server</warning>');
}


	include 'pages/enquetes.php';






?>