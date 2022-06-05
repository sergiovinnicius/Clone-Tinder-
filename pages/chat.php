<?php if(!isset($_SESSION['id'])){
    die("Sem permissão para acessar!");	
} ?>
<!DOCTYPE html>
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
include('include/sidebar.php'); 
?>
<body style="background:rgb(230,230,230);">
<div class="center">
<div class="box-content">	 
<h2><i style="font-size:35px;color:green;padding:13px;" class="fa fa-comments-o" aria-hidden="true"></i>Chat</h2>
<div class="box-chat-online">
<?php

/*
 $mensagens = Mysql::connect()->prepare("SELECT * FROM chat ORDER BY id DESC LIMIT 10");
 $mensagens -> execute();
 $mensagens = $mensagens -> fetchAll();
 $mensagens = array_reverse($mensagens);
 foreach ($mensagens as $key => $value){
*/

?>


 <section id="content">
        
</section>
</div>
 <aside>
            <?php

if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == ''){

echo '<img style="height:50px;max-width:50px;width:100%;border-radius:50%;margin-bottom:5px;" src="imagens/avatar.png."/>';

}else{
	
echo '<img style="height:50px;max-width:50px;width:100%;border-radius:50%;margin-bottom:5px;" src="'.INCLUDE_PATH.'Uploads/'.$_SESSION['perfil'].'" />';		
	
}

?>

        <form id="form1">
            <input type="text" placeholder="Digite seu nome..." name="name" id="name" />
            <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />
        </form>

        <button id="btn1">Enviar</button>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

//WebSocket
    var conn = new WebSocket('ws://localhost:8080');
    
    conn.onopen = function(e) {
        //console.log("Connection established!");
    };

conn.onmessage = function(e) {
//    console.log(e.data);
    showMessages('other', e.data);
};

//conn.send('Hello World!');
///////////////////////////////////////////////
var form1 = document.getElementById('form1');
var inp_message = document.getElementById('message');
var inp_name = document.getElementById('name');
var btn_env = document.getElementById('btn1');
var area_content = document.getElementById('content');

btn_env.addEventListener('click', function(){
    if (inp_message.value != '') {
        var msg = {'name': inp_name.value, 'msg': inp_message.value};
        msg = JSON.stringify(msg);

        conn.send(msg);

        showMessages('me', msg);

        inp_message.value = '';
    }
});


function showMessages(how, data) {
    data = JSON.parse(data);

    console.log(data);

    if (how == 'me') {
        var img_src = "assets/imgs/Icon awesome-rocketchat.png";
    } else if (how == 'other') {
        var img_src = "assets/imgs/Icon awesome-rocketchat-1.png";
    }

    var div = document.createElement('div');
    div.setAttribute('class', how);

    var img = document.createElement('img');
    img.setAttribute('src', img_src);

    var div_txt = document.createElement('div');
    div_txt.setAttribute('class', 'text');

    var h5 = document.createElement('h5');
    h5.textContent = data.name;

    var p = document.createElement('p');
    p.textContent = data.msg;

    div_txt.appendChild(h5);
    div_txt.appendChild(p);

    div.appendChild(img);
    div.appendChild(div_txt);

    area_content.appendChild(div);
}
</script>
</body>

