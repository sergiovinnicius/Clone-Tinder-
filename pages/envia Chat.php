<?php
if(!isset($_SESSION['id'])){
    die();	
}

if(isset($_GET['deslogar'])){
	
	Usuarios::deslogar();
	header('Location: '.INCLUDE_PATH);
}


?>

<?php

   $nome => $_SESSION['nome'];
   $_SESSION['id'] =>  $_SESSION['id'];
$data = [


	'mensagem' => $_POST["mensagem"],
];

$stmt = $pdo = MySql::connect()-> prepare('INSERT INTO chat (mensagem) values (:mensagem)');

$pdo ->execute(array($mensagem));

echo '<div class="mensagem-chat">
<span>'.$nome.':</span>
<p>'.$mensagem.'</p>
</div><!--mensagem-chat-->';

try{
	$pdo->beginTransaction();
	$stmt->execute($data);
	$pdo->commit();
	echo 'Mensagem enviada';
}catch (Exception $e) {
	$pdo->rollback();
	throw $e;
}

?>
<?php
/*
$connect = new PDO("mysql:host=localhost;dbname=tinder", "root", "");

$data = [
	'mensagem' => $_POST["mensagem"],
];

$stmt = $connect->prepare('INSERT INTO chat (mensagem) value (:mensagem)');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Mensagem enviada';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}


?>


*/
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>