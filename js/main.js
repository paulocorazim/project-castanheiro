jQuery(function ($) {
    $("#user_cpf").mask("999.999.999-99");
});

function disable_modules_permissions() {
    if (document.getElementById('permission_master').checked) {
        document.getElementById('user_module[]').disabled = true;
        document.getElementById('user_permission[]').disabled = true;
    }
    if (document.getElementById('permission_master').checked === false) {
        document.getElementById('user_module[]').disabled = false;
        document.getElementById('user_permission[]').disabled = false;
    }
}