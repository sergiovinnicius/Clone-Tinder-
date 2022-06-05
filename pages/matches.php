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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title> Welcome, <?php echo $_SESSION['nome']; ?></title>
<?php 


if(!isset($_SESSION['id'])){
    die();	
}

?>
<?php 
include('include/sidebar.php'); 
?>
<body style="background:rgb(230,230,230);">
<div class="center">	 
	 <div class="matches">
			<div class="matches-comunidade">
					<h4>Meus Matches</h4>
					<div class="container-matches-wraper">
					<?php 
					 
	 $matches = Usuarios::getMatches();
	 
					
					foreach ($matches as $key => $value) {
					
					
					
					
					?>
						<div class="container-matches-single">
							<div class="img-matches-user-single">
							<?php 
							if($value['perfil'] ==''){  ?>
								<img style="width:100%;max-height:100px;"src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.png" />
								
							<?php
							   }else{ ?>
                                <img style="width:100%;max-height:100px;"src="<?php echo INCLUDE_PATH?>Uploads/<?php echo $value['perfil']; ?>" />
																   
							   <?php }?>
								
							   
							</div>
							<div class="info-matches-user-single">
								<h2><?php echo$value['nome']; ?></h2>
								<p><?php echo$value['email']; ?></p>
								<p><?php echo$value['localização']; ?></p>
							</div>

						</div>
						
						<?php
					     }
						
						?>
						
					</div>
			</div>
			</div>
	 
	</div><!--center-->
	 
</body>

