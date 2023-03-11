<?php

session_start();

 $pdo = new PDO('mysql:host=localhost;dbname=testes','root','');


?>



<h2>Enquetes ativas</h2>
<hr>
<?php

if (isset($_POST['acao'])) {
	
	if (!isset($_COOKIE['voto'])) {
		// code...
	if (!isset($_POST['resposta_id'])) {
		header('location: index.php');
		die();
		setcookie('voto','true',time() + 60 * 60 * 24,'/');
	}


	$resposta_id = $_POST['resposta_id'];
	$calcres = $pdo->prepare("SELECT votos FROM enquete WHERE id = ?");
	$calcres->execute(array($resposta_id));
	$countUpdate = $calcres->fetch()['votos'] + 1;
	$pdo->exec("UPDATE enquete SET votos = $countUpdate WHERE id= $resposta_id");

	echo "sua votação foi computada com sucesso!";
}else{
	echo "Você já votou";
}

}



$sql = $pdo->prepare("SELECT * FROM pergunta_enquete ");
$sql->execute();
$perguntasEnquete = $sql->fetchAll();
foreach ($perguntasEnquete as $key => $value) {
	echo '<form method="POST">';
	echo '<b>'.$value['pergunta'].'</b>';
	$sqltwo = $pdo->prepare("SELECT * FROM enquete WHERE enquete_id = $value[id] ");
	$sqltwo->execute();
	$respostas = $sqltwo->fetchAll();
	foreach ($respostas as $key2 => $resposta) {
		echo $resposta['respostas'].'<input type="radio" name="resposta_id" value="'.$resposta['id'].'" />';
	}
	echo '<input type="submit" name="acao" value="enviar"/>';
	echo "</form>";
}



?>