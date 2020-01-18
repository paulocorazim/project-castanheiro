<?php

Class Footers
{

    public function footer()
    {

        $footer = "";

        $ip = $_SERVER['REMOTE_ADDR'];
        $local = date('d-M-Y');

        $footer = <<< EOT
    
        <footer class="footer">
          <div class="container">
            <span class="text-muted">appManager V.0.1 - By SystemHope | $local | ip byUser: $ip | Usuário logado: $_SESSION[name] | Type: $_SESSION[user_type]</span>
          </div>
        </footer>
        
        </body>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        </html>   

EOT;

        return $footer;

    }
}