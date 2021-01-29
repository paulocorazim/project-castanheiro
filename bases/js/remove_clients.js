$(document).ready(function () {
    $("#btn_action_delete_client_id").on("click", function () {
        if ($("#delete_id_client").val() === "") {
            alert("Por favor, o campo ID Imóvel");
            $("#btn_action_delete_client_id").focus();

        } else {
            $.ajax({
                url: "manager.clients.php",
                type: "POST",
                data: {
                    btn_action_delete_client_id: $("#btn_action_delete_client_id").val(),
                    delete_id_client: $("#delete_id_client").val(),
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
