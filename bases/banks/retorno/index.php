<?php
###############################################################################################################################################
# AUTOR....: ALEXANDRE GUIMARAES SARMENTO
# ARQUIVO..: retorno.php 
# FUNCAO...: Arquivo de retorno santander CNAB 240 
# DATA.....: 06/03/2018
# E-MAIL...: alexandre890@yahoo.com.br
# WHATSAPP.: (98) 99212-5970
# CIDADE...: SAO LUIS - MA
###############################################################################################################################################
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RETORNO - CNAB 240</title>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="990" border="0" align="center">
  <tr>
    <td><div align="center"><img src="logo-big.png" width="350" height="138" /></div></td>
  </tr>
  
  <tr>
    <td><div align="center">ARQUIVO DE RETORNO - CNAB 240 </div></td>
  </tr>
  <tr>
    <td><form action="retorno2.php" method="post" enctype="multipart/form-data" name="enviar" id="enviar">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td width="32%" height="46"><div align="right"><span class="label_normal">Arquivo de Retorno:</span> </div></td>
          <td width="67%"><div align="left">
              <input type="file" name="arquivo" id="arquivo" />
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="46"><div align="left">
              <input name="Proximo" type="submit" class="label_titulo" value="Avan&ccedil;ar" />
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>

</html>
