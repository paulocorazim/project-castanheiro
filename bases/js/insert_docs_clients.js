$(document).ready(function () {
    $('#j_btn_doc').on('click', function () {

        $.ajax({
            url: 'manager.clients.php',
            type: 'POST',
            enctype: "multipart/form-data",
            data: {
                client_id: $('#client_id').val(),
                client_doc: $('#client_doc').val(),
                j_btn_doc: $('#j_btn_doc').val()
            },
            beforeSend: function () {
                $('#alert_msg').html("Carregando ...");
            },
            success: function (data) {
                $('#alert_msg').html(data);

            },
            error: function () {
                $('#alert_msg').html("Algo deu errado ...");
            }
        });

    });
});