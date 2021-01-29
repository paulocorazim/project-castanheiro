$(document).ready(function () {
    $("#j_btn_remove_property").on("click", function () {
        if ($("#property_id").val() === "") {
            alert("Por favor, o campo ID Imóvel");
            $("#j_btn_remove_property").focus();

        } else {
            $.ajax({
                url: "manager.properties.php",
                type: "POST",
                data: {
                    j_btn_remove_property: $("#j_btn_remove_property").val(),
                    property_id: $("#property_id").val(),
                    property_client: $("#property_client").val(),
                },
                beforeSend: function () {
                    $("#alert_msg").html("Carregando ...");
                },
                success: function (data) {
                    $("#alert_msg").html(data);
                },
                error: function () {
                    $("#alert_msg").html("Algo deu errado ...");
                },
            });
        }
    });
});