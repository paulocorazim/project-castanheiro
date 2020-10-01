$(document).ready(function () {
    // evento de "submit"
    $("#j_btn_salve_client_Property").click(function (event) {
        // parar o envio para que possamos faze-lo manualmente.
        event.preventDefault();
        // capture o formulário
        const form = $('#FormAddProperty')[0];
        // crie um FormData {Object}
        const data = new FormData(form);

        data.append('clientAddProperty', $("#clientAddProperty").val());
        data.append('j_btn_salve_client_Property', $("#j_btn_salve_client_Property").val());
        // caso queira adicionar um campo extra ao FormData
        // data.append("customfield", "Este é um campo extra para teste");
        // desabilitar o botão de "submit" para evitar multiplos envios até receber uma resposta
        $("#j_btn_salve_client_Property").prop("disabled", true);
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
                // reativar o botão de "submit"
                $("#j_btn_salve_client_Property").prop("disabled", false);
            },
            // manipular erros da requisição
            error: function (e) {
                console.log(e);
                // reativar o botão de "submit"
                $("#j_btn_salve_client_Property").prop("disabled", false);
            }
        });
    });
});