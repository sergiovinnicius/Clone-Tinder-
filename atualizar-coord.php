<?php
session_start();
include('MySql.php');

if(!isset($_SESSION['id'])){
    die();	
}

$idUsuario = $_SESSION['id'];
$lat = $_POST['latitude'];
$long = $_POST['longitude'];

$atualizar = \Mysql::connect()->prepare("UPDATE usuarios SET latitude = ?, longitude =? WHERE id = $idUsuario");
$atualizar -> execute(array($lat,$long));
 

?>