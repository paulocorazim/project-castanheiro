$(document).ready(function () {
    $('#j_btn_salve_client_Property').on('click', function () {

            if ($('#SelectAddProperty').val() === '') {
                alert("Por favor! Informe o imóvel");
                $('#j_btn_salve_client_Property').focus();
            } 
            else {

                $.ajax({
                    url: 'manager.clients.php',
                    type: 'POST',
                    data: {
                        clientAddProperty: $('#clientAddProperty').val(),
                        SelectAddProperty: $('#SelectAddProperty').val(),
                        j_btn_salve_client_Property: $('#j_btn_salve_client_Property').val(),
                    },
                    beforeSend: function () {
                        $('#alert_msg').html("Salvando ...");
                    },
                    success: function (data) {
                        $('#alert_msg').html(data);

                    },
                    error: function () {
                        $('#alert_msg').html("Algo deu errado ...");
                    }
                });
            }
        }
    );
});