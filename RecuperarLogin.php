
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php

if(isset($_POST['acao'])){
 $token =  uniqid();
 $_SESSION['token'] = $token;
 $_SESSION['email'] =  $_POST['email'];
	


?>
<h2> Solicitação enviada !</h2>
<p>Clique para redefinir a senha <a href="RecuperarLogin.php?token=<?php echo  $_SESSION['token']; ?>"><i style="font-size:18px;color:gray;" class="fa fa-key"></i></a></p>


<?php
}else if($_GET['token']){
	
	$token = $_GET['token'];
	if($token != $_SESSION['token']){
		die("Token inválido");
		
	}else{
		//Podemos redefinir senha.
		echo '<h2>Redefinir senha para o email: '.$_SESSION['email'].'</h2>';
		echo 
		'<form method="post">
		<input type="email" name="email" />
		<input type="password" name="password"/>
		<input type="submit" name="agir" value="Alterar Senha" />
		</form>';
		
		if($senha != ''){
			
			$senha = ($senha);
			$atualizar = MySql::connect()-> prepare("UPDATE usuarios SET nome =?, senha=? WHERE id=?");
			$atualizar->execute(array($nome,$senha,$_SESSION['id']));
			$_SESSION['nome'] = $nome;
			
			
			
			}
	}
	
}

?>
<?php
if(isset($_POST['redefinir'])){
  echo 'A senha foi Alterada!';	
}
?>