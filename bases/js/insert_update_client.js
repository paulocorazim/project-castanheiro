$(document).ready(function () {
    $('#btn_update_client').on('click', function () {

            if ($('#client_name').val(null) || $('#cpfcnpj').val(null) || $('#client_corporate_name').val(null)) {
                alert("Os campos | Nome, CPF ou CNPJ | Razão Social | precisa ser preenchido! Verifique ..");
            } else {
                $.ajax({
                    url: 'manager.clients.php',
                    type: 'POST',
                    data: {
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
                        btn_update_client: $('#btn_update_client').val()
                    },
                    beforeSend: function () {
                        $('#alert_msg').html("Carregando ...");
                    },
                    success: function (data) {
                        $('#alert_msg').html(data);
                        /*$('#client_name').val(null);
                        $('#cpfcnpj').val(null);
                        $('#client_corporate_name').val(null);
                        $('#cep').val(null);
                        $('#client_address').val(null);
                        $('#client_number').val(null);
                        $('#client_county').val(null);
                        $('#client_city').val(null);
                        $('#client_neighbordhood').val(null);
                        $('#client_state').val(null);
                        $('#client_phone1').val(null);
                        $('#client_phone2').val(null);
                        $('#client_phone3').val(null);
                        $('#client_rg').val(null);
                        $('#client_type').val(null);
                        $('#client_state_registration_free').val(null);
                        $('#client_municipal_registration').val(null);
                        $('#client_email1').val(null);
                        $('#client_email2').val(null);
                        $('#client_site').val(null);
                        $('#client_obs').val(null);
                        $('#client_responsible').val(null);*/
                    },
                    error: function () {
                        $('#alert_msg').html("Algo deu errado ...");
                    }
                });
            }
        }
    );
});