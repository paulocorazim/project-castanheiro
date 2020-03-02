$(document).ready(function () {
    $('#btn_insert_update_client').on('click', function () {

            if ($('#client_name').val() === '') {
                alert("Por favor, o campo ( | Nome | ) precisa ser preenchido! Verifique !");
                $('#client_name').focus();

            } else if ($('#client_corporate_name').val() === '') {
                alert("Por favor, o campo ( | Razão Social | ) precisa ser preenchido! Verifique !");
                $('#client_corporate_name').focus();

            } else if ($('#cpfcnpj').val() === '') {
                alert("Por favor, o campo ( | CPF/CNPJ | ) precisa ser preenchido! Verifique !");
                $('#cpfcnpj').focus();

            } else if ($('#cep').val() === '') {
                alert("Por favor, o campo ( | CEP | ) precisa ser preenchido! Verifique !");
                $('#cep').focus();

            } else if ($('#client_address').val() === '') {
                alert("Por favor, o campo ( | Endereço | ) precisa ser preenchido! Verifique !");
                $('#client_address').focus();

            } else if ($('#client_number').val() === '') {
                alert("Por favor, o campo ( | Número | ) precisa ser preenchido! Verifique !");
                $('#client_number').focus();

            } else if ($('#client_phone1').val() === '') {
                alert("Por favor, o campo ( | Telefone 1 | ) precisa ser preenchido! Verifique !");
                $('#client_phone1').focus();

            } else {

                $.ajax({
                    url: 'manager.clients.php',
                    type: 'POST',
                    data: {
                        client_id: $('#client_id').val(),
                        client_name: $('#client_name').val(),
                        cpfcnpj: $('#cpfcnpj').val(),
                        client_corporate_name: $('#client_corporate_name').val(),
                        cep: $('#cep').val(),
                        client_address: $('#client_address').val(),
                        client_number: $('#client_number').val(),
                        client_county: $('#client_county').val(),
                        client_city: $('#client_city').val(),
                        client_neighbordhood: $('#client_neighbordhood').val(),
                        client_state: $('#client_state').val(),
                        client_phone1: $('#client_phone1').val(),
                        client_phone2: $('#client_phone2').val(),
                        client_phone3: $('#client_phone3').val(),
                        client_rg: $('#client_rg').val(),
                        client_type: $('#client_type').val(),
                        client_state_registration_free: $('#client_state_registration_free').val(),
                        client_municipal_registration: $('#client_municipal_registration').val(),
                        client_email1: $('#client_email1').val(),
                        client_email2: $('#client_email2').val(),
                        client_site: $('#client_site').val(),
                        client_obs: $('#client_obs').val(),
                        client_active: $('#client_active').val(),
                        client_responsible: $('#client_responsible').val(),
                        btn_insert_update_client: $('#btn_insert_update_client').val(),
                        client_complement: $("#client_complement").val()
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