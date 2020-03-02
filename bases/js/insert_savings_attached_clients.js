$(document).ready(function () {
    // evento de "submit"
    $("#j_btn_salve_savings").click(function (event) {

            if ($('#client_savings_value').val() === '') {
                alert("Por favor, o campo ( | VALOR | ) precisa ser preenchido! Verifique !");
                $('#client_savings_value').focus();

            } else if ($('#client_savings_date').val() === '') {
                alert("Por favor, o campo ( | DATA | ) precisa ser preenchido! Verifique !");
                $('#client_savings_date').focus();

            } else if ($('#client_savings_bank').val() === '') {
                alert("Por favor, o campo ( | BANCO | ) precisa ser preenchido! Verifique !");
                $('#client_savings_bank').focus();

            } else if ($('#client_savings_number').val() === '') {
                alert("Por favor, o campo ( | CONTA | ) precisa ser preenchido! Verifique !");
                $('#client_savings_number').focus();

            } else {
                // parar o envio para que possamos faze-lo manualmente.
                event.preventDefault();
                // capture o formulário
                var form = $('#fileUploadFormSaving')[0];
                // crie um FormData {Object}
                var data = new FormData(form);

                data.append('fileSavings', $('#fileSavings').prop('files')[0]);
                data.append('j_btn_salve_savings', $("#j_btn_salve_savings").val());
                data.append('client_savings_id', $("#client_savings_id").val());
                data.append('client_savings_value', $("#client_savings_value").val());
                data.append('client_savings_date', $("#client_savings_date").val());
                data.append('client_savings_bank', $("#client_savings_bank").val());
                data.append('client_savings_number', $("#client_savings_number").val());

                // caso queira adicionar um campo extra ao FormData
                // data.append("customfield", "Este é um campo extra para teste");
                // desabilitar o botão de "submit" para evitar multiplos envios até receber uma resposta
                $("#j_btn_salve_savings").prop("disabled", true);
                // processar
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "manager.clients.php",
                    data: data,
                    processData: false, // impedir que o jQuery tranforma a "data" em querystring
                    contentType: false, // desabilitar o cabeçalho "Content-Type"
                    cache: false, // desabilitar o "cache"
                    timeout: 600000, // definir um tempo limite (opcional)
                    // manipular o sucesso da requisição
                    success: function (data) {
                        $('#alert_msg').html(data);
                        $('#client_savings_value').val("");
                        $('#client_savings_date').val("");
                        $('#client_savings_bank').val("");
                        $('#client_savings_number').val("");
                        // reativar o botão de "submit"
                        $("#j_btn_salve_savings").prop("disabled", false);
                    },
                    // manipular erros da requisição
                    error: function (e) {
                        console.log(e);
                        // reativar o botão de "submit"
                        $("#j_btn_salve_savings").prop("disabled", false);
                    }
                });
            }
        }
    );
});