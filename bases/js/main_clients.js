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

jQuery(function ($) {
    7
    $("#client_phone1").mask("(99) 99999-9999");
    $("#client_phone2").mask("(99) 99999-9999");
    $("#client_phone3").mask("(99) 99999-9999");
    $('#client_rg').mask('99.999.999-9');
});

function format_phones() {
    document.getElementById("client_phone1").mask("(99) 99999-9999");
    document.getElementById("client_phone2").mask("(99) 99999-9999");
    document.getElementById("client_phone3").mask("(99) 99999-9999");
    document.getElementById("rg").mask('99.999.999-9');

}

function disable_client_state_registration_free() {
    if (document.getElementById('client_state_registration_free').checked) {
        document.getElementById('client_state_registration').disabled = true;
    }
    if (document.getElementById('client_state_registration_free').checked === false) {
        document.getElementById('client_state_registration').disabled = false;
    }
}