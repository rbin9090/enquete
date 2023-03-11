<?php session_start();

try {
	$pdo = new PDO('mysql:host=localhost;dbname=testes','rot','');

} catch (Exception $e) {
	echo '<aviso>cod:1 erro ao tentar conectar :(<br>error when trying to connect to base</aviso>';
	echo '<hr>';
	
	die();
}

?>