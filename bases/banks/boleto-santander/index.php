<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOLETO SANTANDER</title>

<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
}
-->
</style>
<link href="../retorno1/css/index.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>

<script>

$(document).ready(function(){   // OU APENAS $(document).ready(function(){
	
	$('#nbol').blur(function(){
	
	var nbol 			= $("#nbol").val();
	
	/*
	var vencimento  	= $("#vencimento").val();
	var valor_boleto	= $("#valor_boleto").val();
	
	var agencia			= $("#agencia").val();
	var conta			= $("#conta").val();
	var cedente			= $("#cedente").val();
	var carteira		= $("#carteira").val();
	*/
	
	/*
	var dados = { nbol:nbol, vencimento:vencimento, valor_boleto:valor_boleto, agencia:agencia, conta:conta, cedente:cedente, carteira:carteira };
	*/
	
	var dados = { nbol:nbol };
		
		$.ajax({
			type: "POST",
			cache: false, 
			url: "santander-calcula-dv.php",
			data: dados,

			beforeSend: function(){
				$('#pagina').html('<div align="center"><img src="figuras/wait.gif">&nbsp;Calculando Dv...</div>');
			},
			
			success: function( data ){
				$("#pagina").html(data);
			},

			complete: function( data2 ){
			},

		});

	});
	
});
</script>

<script src="js/jquery.maskedinput-1.3.min.js"></script>
<script>
jQuery(function($){
	$("#vencimento").mask("99/99/9999"); // no caso de datas estamos usando jquery
});
</script>
<!-- final -->


<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2" style="border: 1px solid #333333;">
  <tr>
    <td width="940" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><img src="figuras/logo-big.png" /></div></td>
  </tr>
  
  <tr>
    <td height="60" colspan="3"><div align="right" class="titulo_das_tabelas">
      <div align="center">EMISS&Atilde;O DE BOLETO BANC&Aacute;RIO - SANTANDER </div>
    </div></td>
  </tr>
  
  <tr>
    <td colspan="3"><form action="boleto2.php" method="post" name="form1" target="_blank" id="form1">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td height="30" colspan="3" bgcolor="#CCCCCC" class="label_normal"><div align="left">1. DADOS DA CONTA BANCÁRIA </div></td>
          </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Agência:&nbsp;</div></td>
          <td colspan="2"><div align="left" class="label_normal">
            <input name="agencia" type="text" id="agencia" value="3611" size="10" maxlength="4" />
          &nbsp;</div></td>
        </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Conta Corrente S/ DV:&nbsp;</div></td>
          <td colspan="2"><div align="left" class="label_normal">
            <input name="conta" type="text" id="conta" value="13004239" size="20" maxlength="20" />
          </div></td>
        </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Código Cedente:&nbsp; </div></td>
          <td colspan="2"><div align="left" class="label_normal">
            <label>
            <input name="cedente" type="text" id="cedente" value="0726095" size="20" maxlength="20" />
            </label>
          </div></td>
        </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Carteira:&nbsp;</div></td>
          <td colspan="2"><div align="left" class="label_normal">
            <label>
            <input name="carteira" type="text" id="carteira" value="101" size="10" maxlength="3" />
            </label>
          </div></td>
        </tr>
        <tr>
          <td height="30" colspan="3" bgcolor="#CCCCCC" class="label_normal"><div align="left">2. DADOS DO BOLETO </div></td>
          </tr>
        <tr>
          <td width="33%" height="30" class="label_normal"><div align="right">Nosso N&uacute;mero:&nbsp;</div></td>
          <td width="19%"><div align="left">
              <label>
              <input name="nbol" type="text" class="campo_formulario" id="nbol" value="342" size="20" maxlength="7" />
              </label>
              
		  </div></td>
          <td width="48%"><div id="pagina">7 digitos (sem o DV) </div></td>
        </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Data de vencimento:&nbsp;</div></td>
          <td><div align="left">
              <label>
              <input name="vencimento" type="text" class="campo_formulario" id="vencimento" value="08/03/2019" size="20" maxlength="10" />
              </label>
          </div></td>
          <td><div align="left">dd/mm/aaaa </div></td>
        </tr>
        <tr>
          <td height="30" class="label_normal"><div align="right">Valor:&nbsp;</div></td>
          <td><div align="left">
              <label>
              <input name="valor_boleto" type="text" class="campo_formulario" id="valor_boleto" value="499.50" size="20" maxlength="15" />
              </label>
          </div></td>
          <td><div align="left">99999999.99 </div></td>
        </tr>
        
        <tr>
          <td colspan="3" valign="middle" bgcolor="#CCCCCC"><span class="style1"><strong>Observações sobre Nosso Número</strong>: <br />
            O nosso número no boleto e na remessa contém 13 dígitos incluindo o DV. <br />
            Tanto no boleto quanto na remessa informamos apenas o nosso número e o sistema calcula o Dv. <br />
            Informaremos apenas 7 digitos pois o sistema colocará 5 zeros a esquerda do numero do nosso numero.</span> </td>
        </tr>
        <tr>
          <td colspan="3" valign="middle">
            <div align="center">
                <input name="Submit" type="submit" class="campo_formulario" value="Ok" />
              </div></td>
          </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
