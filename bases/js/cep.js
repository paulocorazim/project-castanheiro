$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : '../class/class.Query.ZipCode.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#client_address').val(data.client_address);
                        $('#client_neighbordhood').val(data.client_neighbordhood);
                        $('#client_city').val(data.client_city);
                        $('#client_state').val(data.client_state);
                        $('#client_number').focus();
                    }else{
                        alert("Cep não encontrado!")
                    }
                }
           });   
   return false;    
   })
});