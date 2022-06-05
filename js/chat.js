/*$(function(){

	$(document).ready(function(){
		$('#submit').click(function(){
			var mensagem = $('#nascimento').val();

		
			
			$('#alert').html('');
			if (mensagem== '') {
				$('#alert').html('Preencher o nascimento.');
				$('#alert').addClass("alert-danger");
				return false;
			}



			$('#alert').html('');

			$.ajax({
				url:'chat.php',
				method: 'POST',
				data: {mensagem:mensagem},
				success: function(result) {
					$('form').trigger("reset");
					$('#alert').addClass("alert-success");
					$('#alert').fadeIn().html(result);
					setTimeout(function(){
						$('#alert').fadeOut('Slow');
					},3000);
				}
			});



		});
	});
});*/