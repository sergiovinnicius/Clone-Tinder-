<?php
if(isset($_SESSION['login'])){
	header('Location: '.INCLUDE_PATH.'home');
	
}


?>


<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0"> 
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--<link href="css/style.css" rel="stylesheet">-->
<title> Tinder | Bate papo. Amizade. Encontre parceiros. </title>
</head>
<body>
<?php

if(isset($_POST['action'])){
	if(Usuarios::verificarLogin($_POST['login'],$_POST['senha'])){
	$getId = Usuarios::getUserId($_POST['login']);
	Usuarios::startSession($_POST['login'],$getId);	
	header('Location: '.INCLUDE_PATH.'home');

	}else{
	echo '<script>alert("Usuário inválido!")</script>';	
	//header('Location: '.INCLUDE_PATH.'login');
	}
	
}




?>


<section id="topo" class="main">
<header>
<div class="center">  
       	  

	    <div class="logo">
		    <img src="imagens/logo.png"></img>
	    </div><!--logo-->
		
		
	     <form method="post" class="form-login">
	   
	       <div class="form-element">
		       
		        
			     <input type="text" name="login" placeholder="email" /> 
		   
	      </div><!--form-element-->
		  
		    <div class="form-element">
		       
		         
			     <input type="password" name="senha" placeholder="senha" /> 
		   
	      </div><!--form-element-->
		  
		    <div class="form-element">
		       
			     <input type="submit" name="action" value="Entre"/> 
		   
	      </div><!--form-element-->
		  
	   </form><!--form-login-->
	   <div class="clear"></div>
	   
	   <!--<form action="RecuperarLogin.php" method="post">
	   <input type="email" name="email">
	   <input type ="submit" name="acao" value="Recuperar Senha">
	   </form>-->
 
		 
		 
</div><!--center-->	 
		   
		 
</header>
</section>
	   
		 

</section><!--main-->
<div class="box-banner">

<div class="center">

   
   
 <div class="janela">

 <div class="form">
 <div class="closebotao">X</div><!--fecharformulário-->
 <form id="form1">
 <input type="text" name="nome" required="required" placeholder="*Nome Completo" />
 <input type="text" name="email" required="required" placeholder="*E-mail" />
 <input type="text" name="telefone"  required="required" placeholder="*Telefone" />
 <input type="submit" name="cadastro"  value="ENVIAR" >
	  
 </form>
	
 </div><!--form-->
 </div><!--janela-->

 <div class="botao">
 <h2>
  CRIE UMA CONTA
 </h2>
 </div>
   



</div>
</div>



<?php
/*
$pdo = MySql::connect();
$select = $pdo -> prepare("SELECT * FROM usuarios");
$select -> execute();

$usuarios = $select -> fetchAll();

print_r($usuarios);

*/



?>




<script src="js/jquery.ajaxform.js"></script>
<script  src="js/functions.js"></script>
</body>
</html>
