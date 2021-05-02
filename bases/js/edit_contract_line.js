$(document).ready(function () {
    $('#jbtn_salveContratLine').on('click', function () {

        if ($('#edit_contract_date_start').val() === '') {
            alert("Por favor, o campo ( | Da Inicial | ) precisa ser preenchido! Verifique !");
            $('#edit_contract_date_start').focus();
    
        } else if ($('#edit_contract_value_start').val() === '') {
            alert("Por favor, o campo ( | R$ Atual | ) precisa ser preenchido! Verifique !");
            $('#edit_contract_value_start').focus();
    
        }
        
        else {

                $.ajax({
                    url: 'manager.clients.php',
                    type: 'POST',
                    data: {
                        jbtn_salveContratLine:       $('#jbtn_salveContratLine').val(),
                        clientIDcontract:            $('#clientIDcontract').val(),
                        edit_contract_date_start:    $('#edit_contract_date_start').val(),                        
                        edit_contract_value_start:   $('#edit_contract_value_start').val(),
                        edit_contract_date_reajust:  $('#edit_contract_date_reajust').val(),
                        edit_contract_value_reajust: $('#edit_contract_value_reajust').val(),
                        edit_contract_id:            $('#edit_contract_id').val(),     
                    },
                    beforeSend: function () {
                        $('#alert_msg').html("Salvando ...");
                    },
                    success: function (data) {
                        $('#alert_msg').html(data);
                        document.getElementById('edit_contract_date_start').disabled = true;
                        document.getElementById('edit_contract_value_start').disabled = true;
                        document.getElementById('edit_contract_date_reajust').disabled = true;
                        document.getElementById('edit_contract_value_reajust').disabled = true;  
                        document.getElementById('jbtn_salveContratLine').disabled = true;

                        document.getElementById('date_contract').disabled = false;
                        document.getElementById('value_contract').disabled = false;
                        document.getElementById('clientIDProperty').disabled = false;
                        document.getElementById('fileContract').disabled = false;
                        document.getElementById('j_btn_contract').disabled = false;
                        document.getElementById('removeContract').disabled = false;
                    },
                    error: function () {
                        $('#alert_msg').html("Algo deu errado ...");
                    }
                });
            }
        }
    );
});
