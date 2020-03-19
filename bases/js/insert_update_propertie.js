$(document).ready(function () {
    $('#j_btn_salve_property').on('click', function () {

            if ($('#client_address').val() === '') {
                alert("Por favor, o campo ( | Endereço | ) precisa ser preenchido! Verifique !");
                $('#client_address').focus();

            } else if ($('#client_number').val() === '') {
                alert("Por favor, o campo ( | Número | ) precisa ser preenchido! Verifique !");
                $('#client_number').focus();

            } else if ($('#property_type').val() === '') {
                alert("Por favor, o campo | TIPO IMÓVEL | precisa ser preenchido!");
                $('#property_type').focus();


            } else {

                $.ajax({
                    url: 'manager.properties.php',
                    type: 'POST',
                    data: {
                        j_btn_salve_property: $('#j_btn_salve_property').val(),
                        property_client_id: $('#property_client_id').val(),
                        property_type: $('#property_type').val(),
                        property_destination: $('#property_destination').val(),
                        property_usefull_area: $('#property_usefull_area').val(),
                        property_usefull_built: $('#property_usefull_built').val(),
                        property_ground: $('#property_ground').val(),
                        property_value: $('#property_value').val(),
                        property_value_location: $('#property_value_location').val(),
                        property_value_iptu: $('#property_value_iptu').val(),
                        property_value_condo: $('#property_value_condo').val(),
                        property_amount_dorm: $('#property_amount_dorm').val(),
                        property_amount_suite: $('#property_amount_suite').val(),
                        property_amount_room: $('#property_amount_room').val(),
                        property_amount_bathroom: $('#property_amount_bathroom').val(),
                        property_amount_floors: $('#property_amount_floors').val(),
                        property_amount_vague_garage: $('#property_amount_vague_garage').val(),
                        property_amount_vague_visitor: $('#property_amount_vague_visitor').val(),
                        property_amount_deposit: $('#property_amount_deposit').val(),
                        property_amount_elevators: $('#property_amount_elevators').val(),
                        property_age: $('#property_age').val(),
                        cep: $('#cep').val(),
                        client_address: $('#client_address').val(),
                        client_number: $('#client_number').val(),
                        number_apto: $('#number_apto').val(),
                        client_county: $('#client_county').val(),
                        client_city: $('#client_city').val(),
                        client_state: $('#client_state').val(),
                        client_neighbordhood: $('#client_neighbordhood').val(),
                        property_complement: $('#property_complement').val()
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
        }
    );
});