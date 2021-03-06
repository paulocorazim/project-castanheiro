function mascaraMutuario(o, f) {
    v_obj = o;
    v_fun = f;
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function cpfCnpj(v) {
    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")
    if (v.length <= 14) { //CPF
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d)/, "$1.$2")
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v = v.replace(/(\d{3})(\d)/, "$1.$2")
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    } else { //CNPJ
        //Coloca ponto entre o segundo e o terceiro dígitos
        v = v.replace(/^(\d{2})(\d)/, "$1.$2")
        //Coloca ponto entre o quinto e o sexto dígitos
        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
        //Coloca uma barra entre o oitavo e o nono dígitos
        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")
        //Coloca um hífen depois do bloco de quatro dígitos
        v = v.replace(/(\d{4})(\d)/, "$1-$2")
    }
    return v
}

function disable_client_state_registration_free() {
    if (document.getElementById('client_state_registration_free').checked) {
        document.getElementById('client_state_registration').value = 'ISENTO';
    }
    if (document.getElementById('client_state_registration_free').checked === false) {
        document.getElementById('client_state_registration').value = '';
        $("#client_state_registration").focus();
    }
}

function disable_user_modules_permissions() {
    if (document.getElementById('permission_master').checked) {
        document.getElementById('user_module[]').disabled = true;
        document.getElementById('user_permission[]').disabled = true;
    }
    if (document.getElementById('permission_master').checked === false) {
        document.getElementById('user_module[]').disabled = false;
        document.getElementById('user_permission[]').disabled = false;
    }
}

function disable_billet_dues() 
{
    if (document.getElementById('billet_all').checked) 
    {
        document.getElementById('billet_vencidos').disabled = true;
        document.getElementById('billet_vencidos').checked = false;
        document.getElementById('billet_a_vencer').disabled = true;
        document.getElementById('billet_a_vencer').checked = false;
    }
    
    if (document.getElementById('billet_all').checked === false) {
        document.getElementById('billet_vencidos').disabled = false;
        document.getElementById('billet_a_vencer').disabled = false;
    }
}

function dates_surveyAll()
{
    if (document.getElementById('dates_survey_all').checked)
    {
        document.getElementById('survey_wc_date').value = document.getElementById('survey_bedroom_date').value;
        document.getElementById('survey_livingroom_date').value = document.getElementById('survey_bedroom_date').value;
    }

    if (document.getElementById('dates_survey_all').checked === false)
    {
        document.getElementById('survey_wc_date').value = false;
        document.getElementById('survey_livingroom_date').value = false;
    }
}

function delete_id_clint() {
    document.getElementById('delete_name_client').value = document.getElementById('client_name').value;
    document.getElementById('delete_id_client').value = document.getElementById('client_id').value;
}

function find_clitn() {
    const find_client_name = document.getElementById('find_client');
    document.getElementById('client_name').value = find_client_name.options[find_client_name.selectedIndex].text;
    //alert(find_client_name.options[find_client_name.selectedIndex].value);
}

function editContratLine() 
{
    if ( document.getElementById('jbtn_editContratLine').onclick) {

            document.getElementById('edit_contract_date_start').disabled = false;
            document.getElementById('edit_contract_value_start').disabled = false;
            document.getElementById('edit_contract_date_reajust').disabled = false;
            document.getElementById('edit_contract_value_reajust').disabled = false;
            document.getElementById('edit_contract_date_duedate').disabled = false;
            document.getElementById('edit_contract_value_current').disabled = false;
            document.getElementById('jbtn_salveContratLine').disabled = false;

            document.getElementById('date_contract').disabled = true;
            document.getElementById('value_contract').disabled = true;
            document.getElementById('clientIDProperty').disabled = true;
            document.getElementById('fileContract').disabled = true;
            document.getElementById('j_btn_contract').disabled = true;
            document.getElementById('removeContract').disabled = true;

    }
}
// function active_number_apto() {
//     const number_type = document.getElementById('property_type');
//     const number_apto = number_type.options[number_type.selectedIndex].text;

//     document.getElementById('number_apto').disabled = number_apto !== 'Apartamento';
//     $('#cep').focus();
// }