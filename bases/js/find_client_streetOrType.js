$(document).ready(function () {
    $('#btn_find_StreetOrType').on('click', function () {

        $.ajax({
                url: 'manager.clients.php',
                type: 'POST',
                data: {
                    btn_find_StreetOrType: $('#btn_find_StreetOrType').val(),
                    select_find_client_id: $('#select_find_client_id').val(),
                    property_type: $('#property_type').val(),
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