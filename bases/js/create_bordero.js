$(document).ready(function () {
    $('#btn_create_bordero').on('click', function () {

        $.ajax({
                url: 'manager.billets.php',
                type: 'POST',
                data: {
                    btn_create_bordero: $('#btn_create_bordero').val(),
                    b_m: $('#b_m').val(),
                    b_y: $('#b_y').val(),
                    b_address: $('#b_address').val(),
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
        }
    );
});