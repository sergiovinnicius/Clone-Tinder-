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
	include('include/sidebar.php'); 
?>
 <!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0"> 
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet" >
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--<link href="css/style.css" rel="stylesheet">-->
<title> Welcome, <?php echo $_SESSION['nome']; ?></title>
</head>
<body>

<div class="bg">
<div class="box-usuario-like">
  <div class="box-usuario-nome">
     <?php
	 
	 
	 if(isset($_GET['action'])){
		 $action = $_GET['action'];
		 if($action == ACTION_LIKE){
			Usuarios::executarAcao(ACTION_LIKE,$_GET['id']); 
		 }else if($action == ACTION_DESLIKE){
			Usuarios::executarAcao(ACTION_DESLIKE,$_GET['id']); 

      	 }
	 }
	  
	 $usuario = Usuarios::retornaUsuarios();
	 
	 function distancia($lat1, $lon1, $lat2, $lon2) {
	
	
  $usuario = Usuarios::retornaUsuarios();
  foreach ($usuario as $key => $value){  
  $lat1 = (int)$_SESSION["latitude"];
  $lon1 = (int)$_SESSION["longitude"];
  $lat2 = (int)$usuario["latitude"];
  $lon2 = (int)$usuario["longitude"];
  
  
   $lat1 = deg2rad($lat1);
   $lat2 = deg2rad($lat2);
   $lon1 = deg2rad($lon1);
   $lon2 = deg2rad($lon2);
  }


$dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );



return $dist;


}

	 
	 
	 ?>
     <?php  echo '<img style="height:100%;max-height:550px;width:100%;max-width:400px;border-radius:7px;" src="'.INCLUDE_PATH.'Uploads/'.$usuario['perfil'].'" />';
     	/*  include('Galeria.php');
	  $galeria = new Galeria();*/
	 ?>
	 <!--<img style="height:100%;max-height:550px;width:100%;max-width:400px;border-radius:7px;" src="<?php //echo $galeria->getCurrentPicture(); ?>" />-->
	 
	 <!--<a href="<?php// echo $galeria->getPrevPictureIndex(); ?>">Previous<a/>
     <a href="<?php //echo $galeria->getNextPictureIndex(); ?>">Next<a/>-->
	
	  
	 
	 
     <h2 style="padding:2px;"><?php echo $usuario['nome']."\n"; echo $usuario['idade']."<br>";?></h2>
	 <h5 style="text-align:left;"><?php  $distancia = distancia(-12.9813346,-38.4653612, -12.9741491,-38.4696483);
     
	 if($distancia == 0){
		 echo "Muito perto de você";
		 
	 }else{
	 echo round($distancia,2)."Km\n";
	  
      }	 
	 echo '<br>';
	 echo $usuario['descrição']."\n"; 
	 echo '<br>';
	 echo $usuario['localização'];
	 
	 

	 
	 ?></h5>
	 
     
	 <a href="?action=0&id=<?php echo $usuario['id']; ?>"><i style="color:red;font-size:30px;position:absolute;top:85%;left:27%;margin:10px;border-radius:50%;border:2px solid red;padding:15px 17px 15px 17px;" class="fa fa-thumbs-down"></i></a>
	 <a href="?action=1&id=<?php echo $usuario['id']; ?>"><i style="color:#00bfa5;font-size:30px;position:absolute;top:85%;left:50%;margin:10px;border-radius:50%;border:2px solid #00bfa5;padding:15px 17px 15px 17px" class="fa fa-heart"></i></a>
	 
  </div>

</div>

</div><!--bg-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
}

function showPosition(position) {
$('p.lat-text').html('Latitude: '+ position.coords.latitude);
$('p.long-text').html('Longitude: '+ position.coords.longitude);


//Passando via Ajax para atualizar no Banco de Dados.
atualizarCoordenadas(position.coords.latitude,position.coords.longitude);

}

function atualizarCoordenadas(latitudePar,longitudePar){
	
$.ajax({
	
	url:'http://localhost/PROJETOS/TINDER/atualizar-coord.php',
	method:'post',
	data:{latitude:latitudePar,longitude:longitudePar}
	
	
}).done(function(){
	alert('Coordenadas Atualizadas');	
    })	
	
	
	
	
}


  

</script>


</body>
</html>