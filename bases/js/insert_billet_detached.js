$(document).ready(function () {
    $('#btn_insert_billet').on('click', function () {

        $.ajax({
            url: 'manager.billets.php',
            type: 'POST',
            data: {
                client_name: $('#client_name').val(),
                billet_due_date: $('#billet_due_date').val(),
                billet_value: $('#billet_value').val(),
                btn_insert_billet: $('#btn_insert_billet').val(),
                find_client: $('#find_client').val(),
                billet_send_mail_client: $('#billet_send_mail_client').val()
            },
            beforeSend: function () {
                $('#alert_msg').html("Carregando ...");
            },
            success: function (data) {
                $('#alert_msg').html(data);
                $('#client_name').val(null);
                $('#billet_due_date').val(null);
                $('#find_client').val(null);
                $('#billet_value').val(null);
            },
            error: function () {
                $('#alert_msg').html("Algo deu errado ...");
            }

        });
    });
});