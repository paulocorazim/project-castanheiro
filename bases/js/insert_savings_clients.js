$(document).ready(function () {
    $('#j_btn_salve_savings').on('click', function () {

        if ($('#client_savings_value').val() === '') {
            alert("Por favor, o campo ( | VALOR | ) precisa ser preenchido! Verifique !");
            $('#client_savings_value').focus();

        // } else if ($('#client_savings_date').val() === '') {
        //     alert("Por favor, o campo ( | DATA | ) precisa ser preenchido! Verifique !");
        //     $('#client_savings_date').focus();

        } else if ($('#client_savings_bank').val() === '') {
            alert("Por favor, o campo ( | BANCO | ) precisa ser preenchido! Verifique !");
            $('#client_savings_bank').focus();

        } else if ($('#client_savings_number').val() === '') {
            alert("Por favor, o campo ( | CONTA | ) precisa ser preenchido! Verifique !");
            $('#client_savings_number').focus();

        } else {
            $.ajax({
                url: 'manager.clients.php',
                type: 'POST',
                data: {
                    client_savings_value: $('#client_savings_value').val(),
                    client_savings_date: $('#client_savings_date').val(),
                    client_savings_bank: $('#client_savings_bank').val(),
                    client_savings_number: $('#client_savings_number').val(),
                    client_id: $('#client_id').val(),
                    j_btn_salve_savings: $('#j_btn_salve_savings').val(),
                },
                beforeSend: function () {
                    $('#alert_msg').html("Carregando ...");
                },
                success: function (data) {
                    $('#alert_msg').html(data);
                    $('#client_savings_value').val("");
                    $('#client_savings_date').val("");
                    $('#client_savings_bank').val("");
                    $('#client_savings_number').val("");
                },
                error: function () {
                    $('#alert_msg').html("Algo deu errado ...");
                }
            });
        }
    });
});