<!DOCTYPE html>
<html>
<head>
<title>Welcome, <?php echo $_SESSION['nome']; ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<section class="main-feed">
  
<?php 


if(!isset($_SESSION['id'])){
    die();	
}

?>


<div class="feed">  
<a href="<?php echo INCLUDE_PATH ?>home"><i class="fa fa-undo" aria-hidden="true"></i>Perfil</a>
<h2>Edit profile</h2>
<br/>


<div class="editar-perfil">
<?php
if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == ''){

echo '<img style="max-width:300px;width:100%;" src="avatar.png" />';

}else{
	
echo '<img style="max-width:300px;width:100%;" src="'.INCLUDE_PATH.'Uploads/'.$_SESSION['perfil'].'" />';		
	
}



?>

<br/>
<form method="post" enctype="multipart/form-data">
<input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>">
<input type="password" name="senha" placeholder="new password">
<input type="file" name="file">
<input type="hidden" name="atualizar" value="atualizar">
<input type="submit" name="acao" value="Save!"> 
  
  
</form>
<?php
if(isset($_POST['atualizar'])){
			
			 \MySql::connect();
			$nome = strip_tags($_POST['nome']);
			$senha = $_POST['senha'];
			
			if($nome == '' || strlen($nome) < 3){
			echo "Você precisa inserir um nome";
            	
			
			}
			if($senha != ''){
			
			$senha = ($senha);
			$atualizar = MySql::connect()-> prepare("UPDATE usuarios SET nome =?, senha=? WHERE id=?");
			$atualizar->execute(array($nome,$senha,$_SESSION['id']));
			$_SESSION['nome'] = $nome;
			
			
			
			}
			if($nome == '' || strlen($nome) < 3){
			echo "Você precisa inserir um nome";
            	
			
			}
			
			else{
				
			$atualizar = MySql::connect()-> prepare("UPDATE usuarios SET nome =? WHERE id=?");
			$atualizar->execute(array($nome,$_SESSION['id']));
			$_SESSION['nome'] = $nome;
				
				
				
			}
			
			
			if($_FILES['file']['tmp_name'] != ''){
			$file = $_FILES['file'];
			$fileExt = explode('.',$file['name']);
			$fileExt = $fileExt[count($fileExt) -1];
			if($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg'){
			//Formato Válido.
           //Validar Tamanho.
            $size = intval($file['size'] / 1024);		   
			if($size <= 300){
				
			$uniqid = uniqid().'.'.$fileExt;
			$atualizaImagem = MySql::connect()-> prepare("UPDATE usuarios set perfil =? WHERE id = ?");	
			$atualizaImagem->execute(array($uniqid,$_SESSION['id']));
			
			$_SESSION['perfil']=$uniqid;
			move_uploaded_file($file['tmp_name'],'C:\xampp\htdocs\PROJETOS\TINDER\Uploads/'.$uniqid);
			
			echo 'Perfil atualizado com a foto';
            	
			
			
             
			}else{
            echo'Erro ao processar arquivo...';
            

			
			
			}
			
		   }else{	
			echo'Erro ao processar arquivo...';
            	
			}	
			
			
	
          }
		  
		  echo'Perfil atualizado com sucesso!';
           
		  	
		

         }	


?>
<div>
   
</div><!--feed-->
  
   
</section>




</body>
</html>			
