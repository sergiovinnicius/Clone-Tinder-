<?php 

class Usuarios{

public static function verificarLogin($login,$senha){

$verifica = MySql::connect()-> prepare("SELECT * FROM usuarios WHERE email =? AND senha=?");
$verifica -> execute(array($login,$senha));

if($verifica-> rowCount() == 1){
	
	return true;
	
}else{
	return false;
}


}


public static function startSession($login,$id){
	$_SESSION['login'] = $login;
	
	$_SESSION['id'] = $id;
	
	$info = MySql::connect()->prepare("SELECT * FROM usuarios WHERE id=?");
	$info-> execute(array($id));
	$info = $info -> fetch();
	$_SESSION['nome'] = $info['nome'];
	$_SESSION['sexo'] = $info['sexo'];
	$_SESSION['perfil'] = $info['perfil'];
	$_SESSION['latitude'] = $info['latitude'];
	$_SESSION['longitude'] = $info['longitude'];
	$_SESSION['localização'] = $info['localização'];
	$_SESSION['Estado'] = $info['Estado'];
}


public static function getUserId($email){
	$id = \MySql::connect()->prepare("SELECT id FROM usuarios WHERE email=?");
	$id -> execute(array($email));
	
	$id = $id -> fetch()['id'];
	
	return $id;
}

public static function deslogar(){
	
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	
	session_destroy();
	
	
}

public static function retornaUsuarios(){

if($_SESSION['sexo'] == 'masculino'){

 $retornaUsuariosRandom = Mysql::connect()->prepare("SELECT *FROM usuarios WHERE sexo != 'masculino' ORDER BY RAND() LIMIT 1");
 $retornaUsuariosRandom ->execute();
 $retornaUsuariosRandom = $retornaUsuariosRandom ->fetch();
 
 return $retornaUsuariosRandom;

}else if($_SESSION['sexo'] == 'feminino'){
	
 

 $retornaUsuariosRandom = Mysql::connect()->prepare("SELECT *FROM usuarios WHERE sexo != 'feminino' ORDER BY RAND() LIMIT 1");
 $retornaUsuariosRandom ->execute();
 $retornaUsuariosRandom = $retornaUsuariosRandom ->fetch();
 
 return $retornaUsuariosRandom;

  
	
}

}


public static function executarACao($acao,$usuarioId){

$verifica = Mysql::connect()->prepare("SELECT * FROM likes WHERE user_from =? AND user_to =? ");	
$verifica ->execute(array($_SESSION['id'],$usuarioId));

if($verifica->rowCount() >= 1){
  
  return;

}else{

  $inserirAcao = Mysql::connect()->prepare("INSERT INTO likes VALUES(null,?,?,?)");
  $inserirAcao -> execute(array($_SESSION['id'],$usuarioId,$acao));
}
	
	
}

public static function getMatches(){
	$matches = array();
	
	$gostei = Mysql::connect()->prepare("SELECT *FROM likes WHERE user_from =? AND action =1");
	$gostei-> execute(array($_SESSION['id']));
	
	$gostei = $gostei->fetchAll();
	foreach ($gostei as $key => $value){
		
	$gostaramdevolta = Mysql::connect()->prepare("SELECT *FROM likes WHERE user_to =? AND user_from =? AND action =1");
	$gostaramdevolta->execute(array($_SESSION['id'],$value['user_to']));
	
	if($gostaramdevolta->rowCount()== 1){
	//Deu Matche!!!
	
	$infoMatches = Mysql::connect()->prepare("SELECT *FROM usuarios WHERE id = ?");
	$infoMatches -> execute(array($value['user_to']));
	$matches[] = $infoMatches->fetch();
		
	}
	
	
	
	}
	
	return $matches;
	
}





}//Classe Usuários







?>