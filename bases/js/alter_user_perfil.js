$(document).ready(function () {
    $('#btn_alter_user').on('click', function () {
        $.ajax({
            url: 'manager.profiles.php',
            type: 'POST',
            data: {
                user_name: $('#user_name').val(),
                cpfcnpj: $('#cpfcnpj').val(),
                user_mail: $('#user_email').val(),
                user_newpasswd: $('#user_newpasswd').val(),
                user_id: $('#user_id').val(),
                btn_alter_user: $('#btn_alter_user').val()
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