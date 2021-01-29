<?php 
require "verifica_sessao.php";

if($_SESSION['nivel']>1){
	require "sem_permissao.php";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CIA INGLES</title>
<!-- 
<script type="text/javascript" src="menus/modelo1/stmenu.js"></script>
-->
<script type="text/javascript" src="opcoes/stmenu.js"></script>
<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/cadadmins.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="990" height="267" align="center" cellpadding="0" bgcolor="#FFFFFF" cellspacing="0" style="border:0px solid gray;">

  <tr>

    <td width="800" height="245" align="center" valign="top"><table width="100%" height="245" border="0" cellpadding="0" cellspacing="0">
      <tr>
        
        <td width="571" height="245" valign="top"><table width="100%" height="56%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" colspan="5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="18"><?php require "mcadmin.php";?></td>
              </tr>
              
              
              
              <tr>
                <td height="30"><table width="990" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="1%">&nbsp;</td>
                          <td width="18%"><div align="left"><span class="style93"><a href="cadprofessor.php"><img src="figuras/voltar2.jpg" alt="Voltar" width="100" height="48" border="0" align="absmiddle" /></a></span></div></td>
                          <td width="81%"><div align="left"><span class="style93">&nbsp;&nbsp;<img src="figuras/Administrator-2-icon.jpg" width="48" height="48" border="0" align="absmiddle" /><a href="#"></a> </span><span class="style2">CADASTRO DE OPERADORES <span class="style57">
                              <?php require "conecta_banco.php";
?>
                          </span></span></div></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><div align="left">
                      <div align="left"><span class="style97">&nbsp;Ol&aacute;,</span><span class="style97"> <?php echo "".$_SESSION["nome_usuario"].""; ?></span></div>
                    </div></td>
                  </tr>
                </table></td>
              </tr>
              
            </table></td>
            </tr>
          
          <tr>
            <td height="141" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td height="64" colspan="4" class="style68 link_novo01 style76">
                    <p align="center">
                      <?php
// conectar ao banco de dados para a grava&ccedil;&atilde;do dos dados d&atilde;&atilde;&atilde;&atilde;&atilde; !!!
require "conecta_banco.php";

// Recuperando os dados do formul&aacute;rio de cadastro de curriculm

$xcodigo 	= null;
$xdatacad 	= date("Y/m/d");
$xhoracad 	= date("H:i:s");
$xnome 		= $_POST['nome'];
$xnome 		= trim($xnome);
$xendereco 	= $_POST['endereco'];
$xbairro 	= $_POST['bairro'];
$xcidade 	= $_POST['cidade'];
$xuf 		= $_POST['uf'];
$xcep 		= $_POST['cep'];
$xfone 		= $_POST['fone'];
$xcelular 	= $_POST['celular'];
$xsexo 		= $_POST['sexo'];
$xemail 	= trim($_POST['email']);
$xdianas 	= $_POST['dianas'];
$xmesnas 	= $_POST['mesnas'];
$xanonas 	= $_POST['anonas'];
$xdtnas 	= $xanonas.".".$xmesnas.".".$xdianas;
$xecivil 	= $_POST['ecivil'];
$xrg 		= $_POST['rg'];
$xcpf 		= $_POST['cpf'];
$xlinkfoto 	= $_POST['linkfoto'];
$xativo 	= "S";
//$xlogin 	= $_POST['loginlogin'];
//$xsenha 	= $_POST['loginsenha1'];
$xnivel 	= "9";
$xpai       = $_POST['pai'];
$xmae       = $_POST['mae'];

$xnivel 	= $_POST['nivel'];

$xarq 		= $linkfoto_name;
$xlinkfoto 	= $xarq;
$xsize 		= filesize($linkfoto);

$xescola    = "";
$xturno     = "";
$xserie     = "";
$xprofissao = "";
$xempresa   = "";

//////////////////////////////////////////
// Gerar o login
$primeiroNome = explode(" ", $xnome);
$login = substr($primeiroNome[0],0,10);
$xlogin = $login;
		
// gerar a senha
$aceitos = 'ABCDEFGHJKMNPQRSTXYWZ23456789';
$max = strlen($aceitos)-1;
$senha = null;
for($i=0; $i < 8; $i++){
	$senha .= $aceitos{mt_rand(0, $max)};
}
$xsenha = $senha;
//////////////////////////////////////////


// verificar se o cadastro já possui mesmo login e senha anteriormente cadastrado no sistema.
$bins = "SELECT login, senha FROM usuarios WHERE senha='".$xsenha."' AND login='".$xlogin."'  ";
$rexe = mysql_query($bins);
$xtlo = mysql_num_rows($rexe);

// se já existir o login e a senha escolhidos...

if($xtlo>0){
	echo "<script>";
	echo "window.location.href='errocl.php'";
	echo "</script>";
}else{
// realiza todo o processo em si!


	




//echo "<br>";
//echo "tamanho do arquivo..: ".$xsize;
// calcula o tamanho em bytes da foto
// se o tam for menor que o tamanho limite cria um nome novo para a foto, senão, o nome dela será space.
//$tamanho_limite = 1048576; // 01mb
$tamanho_limite = 10485760; // 10mb

if($xsize>0 && $xsize<=$tamanho_limite){
	$xnumeracao = date("dmY").date("His");
	$xfinal     = substr($linkfoto_name,-4);
	$xnomefinal = "foto".$xnumeracao.$xfinal;
}else{
	$xnomefinal = "";
}

// verificar se este usuario j&aacute; estava cadastrado antes, para evitar duplicidade de dados OU se o cpf dele ja existia no cadastro.


$inw = "SELECT * FROM usuarios WHERE cpf='".$xcpf."'   ";

$rx = mysql_query($inw);
$qua = mysql_num_rows($rx);
$row = mysql_fetch_array($rx);

// se nao esta duplicado...
if($qua<=0){

	// Gerar Login
	
	/*
	$xnome = trim($_POST['nome']);
	$primeiroNome = explode(" ", $xnome);
	$login = substr($primeiroNome[0],0,10);
	$xlogin = $login;
		
	// gerar senha
		
	$aceitos = 'abcdxywzABCDZYWZ0123456789';
	$max = strlen($aceitos)-1;
	$senha = null;
	for($i=0; $i < 8; $i++){
		$senha .= $aceitos{mt_rand(0, $max)};
	}

	$xsenha = $senha;
	*/
	
	// Gravando os dados do formul&aacute;rio na tabela
	$instrucao = "INSERT INTO usuarios (codigo, datacad, horacad, nome, endereco, bairro, cidade, UF, cep, fone, celular, sexo, email, dtnas, ecivil, rg, cpf, ativo, 
	login, senha, nivel, pai, mae) VALUES ('".$xcodigo."', '".$xdatacad."', '".$xhoracad."', '".$xnome."', '".$xendereco."', '".$xbairro."', '".$xcidade."', '".$xuf."', 
	'".$xcep."', '".$xfone."', '".$xcelular."', '".$xsexo."', '".$xemail."', '".$xdtnas."', '".$xecivil."', '".$xrg."', '".$xcpf."', '".$xativo."', '".$xlogin."', 
	'".$xsenha."', '".$xnivel."', '".$xpai."', '".$xmae."'
	)";
			
	$resultado = mysql_query($instrucao);



// ************************************************************************************
//DADOS para gravar a auditoria
// ************************************************************************************
	$xult_codigo = mysql_insert_id();
	$xaud_codigo   = null;
	$xaud_datamov  = date("Y.m.d");
	$xaud_horamov  = date("H:i:s");
	$xaud_evento   = "CADASTRO DE PROFESSOR - ID: ".$xult_codigo." ".$xnome;
	$xaud_operador = $_SESSION['user_cod']; 
	$inst = "INSERT INTO auditoria (codigo, datamov, horamov, evento, operador) 
	VALUES ('".$xaud_codigo."', '".$xaud_datamov."', '".$xaud_horamov."', '".$xaud_evento."', '".$xaud_operador."' )";
	$resu = mysql_query($inst);
// ************************************************************************************	
	



	// enviando o email com os dados de login e senha

	$xnome_do_atendente = $_SESSION["nome_usuario"];

	$xnome_emp = "CIA INGLES";
	$xemail_emp = "ciaingles@hotmail.com";
	
	$ycom ="BEM VINDO AO NOSSO WEBSITE! \n\n";
	$ycom.="A sua conta de operador foi criada com sucesso. \n\n";
	$ycom.="Por favor, anote os dados do seu login indicado abaixo. \n\n";	
	$ycom.="Login: ".$xlogin."\n";
	$ycom.="Senha: ".$xsenha."\n\n";
	$ycom.="Nome: ".$xnome."\n";
	$ycom.="E-mail: ".$xemail."\n\n";
	$ycom.="Maiores Informacoes: (98) 3246.9632 - CIA INGLES  \n\n";
	$headers .= "From: $xnome_emp <$xemail_emp>\r\n";
	
	$xemail_para = "From: $xnome <$xemail>\r\n";
	
	@mail($xemail,"CIA INGLES: CADASTRO DE PROFESSOR",$ycom, $headers);
	@mail("CIA INGLES <ciaingles@hotmail.com>","CIA INGLES: CADASTRO DE PROFESSOR",$ycom, $headers);
	@mail("$xnome <$xemail>","CIA INGLES: CADASTRO DE PROFESSOR",$ycom, $headers);	
	//@mail("ALEX <alexandre890@yahoo.com.br>","CIA INGLES: CADASTRO DE OPERADOR",$ycom, $headers);
	@mail("CIA INGLES <ciaingles@hotmail.com>","CIA INGLES: CADASTRO DE PROFESSOR - $xnome",$ycom, $xemail_para);
	@mail("clientes CIA INGLES <clientes@3dnet.com.br>","CIA INGLES: CADASTRO DE PROFESSOR - $xnome",$ycom, $xemail_para);
	
?>
                      
                      
                      
<?php
// ENVIANDO A FOTO!

/*
echo "Linkfoto_name..:".$linkfoto_name;
echo "<br>";
echo "Linkfoto.......:".$linkfoto;
echo "<br>";
echo "X-Linkfoto.....:".$xlinkfoto;
echo "<br>";
echo "xarq...........:".$xarq;
echo "<br>";
echo "xnomefinal.....:".$xnomefinal;
*/

if($xarq!=""){
	if($xsize<=$tamanho_limite){
		if (@copy($linkfoto,"fotos/".$xnomefinal)){
			$xsituacao = "Foto enviada com sucesso!";
		}else{
			$xsituacao = "A foto não foi enviada.";
		}
	}else{
		$xsituacao = "Não enviada. Ultrapassou o limite: ".abs(($tamanho_limite/1024)/1024)." MB";
	}
	}else{
	$xsituacao = "Você não enviou uma foto";
}
?>
                      
                      <span class="style2"> OPERADOR CADASTRADO </span></p>                    
                    <p align="center"><span class="style81">POR FAVOR, <span class="style92">ANOTE SEUS DADOS</span> DE LOGIN:<br />
                      <br /> 
                      USU&Aacute;RIO:&nbsp;<?php echo $xlogin;?></span> <br />
                      <span class="style81">SENHA:&nbsp;<?php echo $xsenha;?></span> <br />
                      <br />
                    </p></td>
              </tr>
              
              <tr>

              </tr>
              
              

              

<?php
}else{
/*
	echo "<br>";
	echo "<center><span class=style81>Acesso negado!<br> Usuário já cadastrado.</span></center>";
	echo "<br>";
	echo "<center><a href=cadadmins.php><span class=style81>Retornar.</span></a></center>";
	echo "<center><a href=cadadmins.php><img src=figuras/volta2.jpg border=0></a></center>";
*/
?>
<br>
<div align="center">
<span class="label_titulo">Acesso negado!</span>
<br />
<span class="label_normal">Usuário já cadastrado com esse CPF.</span>
</div>
<?php
}
mysql_close($conn);
?>


<?php 
// final do primeiro if.
}
?>

            </table></td>
          </tr>
          
        </table></td>
        </tr>
      
    </table>    </td>
  </tr>
  <tr>
    <td height="19" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td width="1%" height="19">&nbsp;</td>
        <td width="49%">&nbsp;</td>
        <td width="25%">&nbsp;</td>
        <td width="25%"><div align="right"><a href="http://www.3dnet.com.br" target="_blank">
          <?php require "rodape.php";?>
        </a></div></td>
      </tr>
    </table></td>
  </tr>
</table>


</body>

</html>
