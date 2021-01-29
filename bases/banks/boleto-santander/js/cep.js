$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */

				beforeSend: function(){
						$("#pagina_cep").show();
						$('#pagina_cep').html('<div align="center"><img src="figuras/wait.gif"></div>');
				},

				success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua.toUpperCase());
                        $('#bairro').val(data.bairro.toUpperCase());
                        $('#cidade').val(data.cidade.toUpperCase());
            			$('#estado').val(data.estado);
 						
					    $('#pagina_cep').hide();
 
                        $('#rua').focus();
                    }
                }
           });   
   return false;    
   })
});