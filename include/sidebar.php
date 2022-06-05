
<div class="sidebar">
<div  class="topo">
   
    <?php

if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == ''){

echo '<img style="height:50px;max-width:50px;width:100%;border-radius:50%;margin-bottom:5px;" src="imagens/avatar.png."/>';

}else{
	
echo '<img style="height:50px;max-width:50px;width:100%;border-radius:50%;margin-bottom:5px;" src="'.INCLUDE_PATH.'Uploads/'.$_SESSION['perfil'].'" />';		
	
}

?>
<h3 style="font-size:13px;"><?php echo $_SESSION['nome']; ?>
<a style="font-size:22px;color:white;border-radius:50%;background:#c62828;padding:2px 5px;margin-left:80px;" href="https://tinder.com/app/recs" target="_blank"><i class="fa fa-suitcase"></i></a>   
<a style="font-size:23px;color:white;border-radius:50%;background:#c62828;padding:2px 8px;margin-left:5px;" href="https://policies.tinder.com/safety/intl/pt" target="_blank"><i class="fa fa-shield"></i></a> 

</div>
<a style="text-decoration:none;cursor:pointer;"href="<?php echo INCLUDE_PATH ?>matches"><i style="font-size:35px;color:#e91e63;padding:13px;" class="fa fa-meetup" aria-hidden="true"></i></a>
<br>
<a style="text-decoration:none;cursor:pointer;"href="<?php echo INCLUDE_PATH ?>home"><i style="font-size:35px;color:blue;padding:13px;" class="fa fa-user" aria-hidden="true"></i></a>
<br>
  <a style="text-decoration:none;cursor:pointer;"href="<?php echo INCLUDE_PATH ?>chat"><i style="font-size:35px;color:green;padding:13px;" class="fa fa-comments-o" aria-hidden="true"></i></a>
	   
     

	
   <div class="btn-coord">
     
     
   
	  <button onclick="getLocation()">Atualizar Coordenadas!</button>
   </div>
   
   <div id="localizacao" class="info-localizacao">
      <p class="lat-text">Latitude: <?php echo $_SESSION['latitude'];?></p>
	  <p class="long-text">Longitude: <?php echo $_SESSION['longitude'];?></p>
	  <p>Cidade: <?php echo $_SESSION['localização'];?></p>
	  <p>Estado: <?php echo $_SESSION['Estado'];?></p>
	  <br>
	  <br>
	  <br>
	  <a style="color:gray;border-bottom:1px solid gray;" href="<?php echo INCLUDE_PATH ?>?deslogar"><i class="fa fa-undo" aria-hidden="true"></i>sair</a></h3>
	  <br>
	  <a style="color:gray;border-bottom:1px solid gray;" href="<?php echo INCLUDE_PATH ?>perfil"><i class="fa fa-cog" aria-hidden="true"></i> Editar Informações</a>
   
   </div>
   
   
   
</div>
