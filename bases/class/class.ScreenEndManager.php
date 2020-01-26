<?php

Class shFooter
{

    public function sh_footer()
    {

        $footer = <<< EOT
            <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>            
            <script src="../js/main.js" type="text/javascript" type="text/javascript"></script>
            <script src="../js/cep.js" type="text/javascript" type="text/javascript"></script>
    
            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            
            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
            
            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>
            
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

        return $footer;

    }
}