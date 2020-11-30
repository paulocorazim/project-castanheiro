$(document).ready(function () {
    $('#btn_find_NameOrStreet').on('click', function () {

            $.ajax({
                url: 'manager.clients.php',
                type: 'POST',
                data: {
                    btn_find_NameOrStreet: $('#btn_find_NameOrStreet').val(),
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