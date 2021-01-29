$(document).ready(function () {
    // evento de "submit"
    $("#j_btn_salve_survey").click(function (event) {
        // parar o envio para que possamos faze-lo manualmente.
        event.preventDefault();
        // capture o formulário
        const form = $('#FormAddSurvey')[0];
        // crie um FormData {Object}
        const data = new FormData(form);

        data.append('file', $('#file').prop('files')[0]);
        data.append('clientAddSurvey', $("#clientAddSurvey").val());
        data.append('survey_bedrooms_textarea', $("#survey_bedrooms_textarea").val());
        data.append('survey_wc_textarea', $("#survey_wc_textarea").val());
        data.append('survey_livingroom_textarea', $("#survey_livingroom_textarea").val());
        data.append('j_btn_salve_survey', $("#j_btn_salve_survey").val());
        // caso queira adicionar um campo extra ao FormData
        // data.append("customfield", "Este é um campo extra para teste");
        // desabilitar o botão de "submit" para evitar multiplos envios até receber uma resposta
        $("#j_btn_salve_survey").prop("disabled", true);
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
                $("#j_btn_salve_survey").prop("disabled", false);
            },
            // manipular erros da requisição
            error: function (e) {
                console.log(e);
                // reativar o botão de "submit"
                $("#j_btn_salve_survey").prop("disabled", false);
            }
        });
    });
});