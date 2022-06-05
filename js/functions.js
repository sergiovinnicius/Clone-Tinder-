$(function(){

	
	
	  //Abri/fechar Janela Modal
	   abrirJanela();
	   verificarCliqueFechar();
	 
	 function abrirJanela(){
		 $('.botao').click(function(e){
			  e.stopPropagation();
			  $('.janela').fadeIn();
			  //$('.janela').show();
		 });
		 //Funcionando !!!
	 }	 
	 
	 function verificarCliqueFechar(){
		 var elemento = $('.closebotao');
		 
		 elemento.click(function(){
			 $('.janela').fadeOut();
			 
		 });
		 
		 	 $('.form').click(function(e){
			  e.stopPropagation();
			  
			 });
		 //Funcionando 
	 }
	 
	

	 



});



