<?php

class shFooter
{

    public function sh_footer()
    {

	    return <<< EOT
            <!-- JavaScript Mascaras-->

            <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
            <!-- JavaScript Personalizados-->
            <script src="../js/main.js" type="text/javascript"></script>
            <script src="../js/cep.js" type="text/javascript"></script>
            <script src="../js/alter_user_perfil.js" type="text/javascript"></script>
            <script src="../js/insert_billet_detached.js" type="text/javascript"></script>
            <script src="../js/insert_update_propertie.js" type="text/javascript"></script>
            <script src="../js/insert_update_clients.js" type="text/javascript"></script>
            <script src="../js/insert_propertie_clients.js" type="text/javascript"></script>
            <script src="../js/remove_propertie.js" type="text/javascript"></script>
            <script src="../js/remove_clients.js" type="text/javascript"></script>
            <script src="../js/insert_docs_clients.js" type="text/javascript"></script>
            <script src="../js/insert_contract_clients.js" type="text/javascript"></script>
            <script src="../js/insert_savings_attached_clients.js" type="text/javascript"></script>
            <script src="../js/insert_survey_clients.js" type="text/javascript"></script>
            <script src="../js/find_client_streetOrType.js" type="text/javascript"></script>
            <script src="../js/find_client_NameOrStreet.js" type="text/javascript"></script>


            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
           <!-- <script src="../js/sb-admin-2.min.js"></script> -->
           <script src="../js/sb-admin-2.js"></script>

            <!-- Page level plugins -->
            <script src="../vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../js/demo/chart-area-demo.js"></script>
            <script src="../js/demo/chart-pie-demo.js"></script>

            <!-- Page level plugins -->
            <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../js/demo/datatables-demo.js"></script>

            </body>

            </html>

EOT;

    }
}
