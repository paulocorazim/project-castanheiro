function valida_campos3(){
	var forma_pagto  = document.form_formapag.x_formapg.selectedIndex;
	var qtd_parcelas = document.form_formapag.x_qtdparc.selectedIndex;
	
	// O item .value serve para obter o valor selecionado e o .text pega o texto ou legenda do select
	var y_formapg    = document.form_formapag.x_formapg.options[forma_pagto].value; 
	var y_qtdparc    = document.form_formapag.x_qtdparc.options[qtd_parcelas].value;
	
	if(y_formapg=="DI" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}
	
	if(y_formapg=="PS" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}

	if(y_formapg=="CT" && y_qtdparc>6){
		alert("Erro! Pagamento no máximo em 06 (seis) parcelas.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}
	
	if(y_formapg=="CD" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}
	
	return true;
}



function imprimir(){
	if (window.print){
		resposta = confirm('Deseja imprimir essa página ?');
		if (resposta) 
			window.print(); 
	}
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}



function voltar(){
		document.form1.submit();	
}




function seguir(){
	document.form_formapag.submit();
}











// JavaScript Document


function inicializar_valores(){

	// div das formas de pagamento da matricula
	document.getElementById('banco').style.display="none";
	document.getElementById('cartao').style.display="none";
	
	// div das formas de pagamento das mensalidades
	document.getElementById('men_dinheiro').style.display="none";
	document.getElementById('men_debito').style.display="none";
	document.getElementById('men_credito').style.display="none";
	document.getElementById('men_cheque').style.display="none";
	document.getElementById('men_boleto').style.display="block";

//document.form_formapag.matricula.value = 0;
	document.form_formapag.valor_apos.value = 0;
	document.form_formapag.porc_desc.value = 0;
	document.form_formapag.valor_desc.value = 0;
	document.form_formapag.valor_final.value = 0;
	
	document.form_formapag.descmat.value = 0;
	document.form_formapag.valor_descmat.value = 0;
	document.form_formapag.valor_matfim.value = 0;
		
	document.form_formapag.matricula.focus();
	return true;	

}

// função auxiliar para arredondamento - não estou usando no sistema
/*
function roundNumber(num, dec) {
  var result = String(Math.round(num*Math.pow(10,dec))/Math.pow(10,dec));
  if(result.indexOf('.')<0) {result+= '.';}
  while(result.length- result.indexOf('.')<=dec) {result+= '0';}
  return result;
}
*/

function calcular_valor_apos_matricula(){
	document.form_formapag.valor_apos.value = parseFloat(document.form_formapag.valor_preco.value) - parseFloat(document.form_formapag.matricula.value);
	document.form_formapag.valor_final.value =  parseFloat((document.form_formapag.valor_apos.value)) - parseFloat((document.form_formapag.valor_desc.value));
	
	// arredondar para 02 casas decimais
	document.form_formapag.valor_apos.value = (Math.round(parseFloat(document.form_formapag.valor_apos.value)*100))/100;
	document.form_formapag.valor_desc.value = (Math.round(parseFloat(document.form_formapag.valor_desc.value)*100))/100;
	document.form_formapag.valor_final.value = (Math.round(parseFloat(document.form_formapag.valor_final.value)*100))/100;


	document.form_formapag.valor_descmat.value = (parseFloat(document.form_formapag.matricula.value)) * parseFloat((document.form_formapag.descmat.value))/100;
	document.form_formapag.valor_descmat.value = (Math.round(parseFloat(document.form_formapag.valor_descmat.value)*100))/100;

	document.form_formapag.valor_matfim.value = (parseFloat(document.form_formapag.matricula.value)) - parseFloat((document.form_formapag.valor_descmat.value));
	document.form_formapag.valor_matfim.value = (Math.round(parseFloat(document.form_formapag.valor_matfim.value)*100))/100;
}










function calcular_desconto(){
	document.form_formapag.valor_desc.value = (parseFloat(document.form_formapag.valor_apos.value)) * parseFloat((document.form_formapag.porc_desc.value))/100;
	document.form_formapag.valor_desc.value = (Math.round(parseFloat(document.form_formapag.valor_desc.value)*100))/100;

	document.form_formapag.valor_final.value = (parseFloat(document.form_formapag.valor_apos.value)) - parseFloat((document.form_formapag.valor_desc.value));
	document.form_formapag.valor_final.value = (Math.round(parseFloat(document.form_formapag.valor_final.value)*100))/100;
}


function zerar(){
	document.form_formapag.matricula.value = 0;
	document.form_formapag.valor_apos.value = 0;
	document.form_formapag.porc_desc.value = 0;
	document.form_formapag.valor_desc.value = 0;
	document.form_formapag.valor_final.value = 0;
}

function valida_campos(){
	var forma_pagto  = document.form_formapag.x_formapg.selectedIndex;
	var qtd_parcelas = document.form_formapag.x_qtdparc.selectedIndex;
	
	// O item .value serve para obter o valor selecionado e o .text pega o texto ou legenda do select
	var y_formapg    = document.form_formapag.x_formapg.options[forma_pagto].value; 
	var y_qtdparc    = document.form_formapag.x_qtdparc.options[qtd_parcelas].value;
	
	if(y_formapg=="DI" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}
	
	if(y_formapg=="PS" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}

	if(y_formapg=="CT" && y_qtdparc>6){
		alert("Erro! Pagamento no máximo em 06 (seis) parcelas.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}
	
	if(y_formapg=="CD" && y_qtdparc>1){
		alert("Erro! Pagamento em apenas 01 (uma) parcela.");
		document.form_formapag.x_qtdparc.focus();
		return false;
	}


if(document.form_formapag.item1.value=="" && document.form_formapag.item12.value=="" && document.form_formapag.item13.value=="" && document.form_formapag.item14.value=="" && document.form_formapag.item15.value=="" && document.form_formapag.item16.value=="" && document.form_formapag.item17.value=="" && document.form_formapag.item18.value=="" && document.form_formapag.item19.value=="" && document.form_formapag.item110.value==""){
		alert("Erro! Prencha pelo menos 1 campo de descrição");
		document.form_formapag.item1.focus();
		return false;
	}

if(document.form_formapag.vlrliq.value<="0" || document.form_formapag.vlrliq.value==""){
		alert("Erro! O valor dos serviços não foi informado");
		document.form_formapag.punit1.focus();
		return false;		
	}


	return true;
}





function verifica_fpgmat(){

var situacao = document.getElementById('formapgmat').selectedIndex;
var cartao   = document.getElementById('cartao');
var banco    = document.getElementById('banco');

switch(situacao){

	case 0:
	cartao.style.display="none";
	banco.style.display="none";		
	break;
	
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
	cartao.style.display="block";
	banco.style.display="none";		
	break;
		
	case 6: 
	cartao.style.display="none";
	banco.style.display="block";		
	break;	
	}

}






function verifica_fpgmen(){

var situacao = document.getElementById('x_formapg').selectedIndex;

var dinheiro = document.getElementById('men_dinheiro');
var debito   = document.getElementById('men_debito');
var credito  = document.getElementById('men_credito');
var cheque   = document.getElementById('men_cheque');
var boleto   = document.getElementById('men_boleto');

switch(situacao){

	case 0:
	dinheiro.style.display="block";
	debito.style.display="none";
	credito.style.display="none";		
	cheque.style.display="none";
	boleto.style.display="none";		
	break;
	
	case 1:
	case 2:
	dinheiro.style.display="none";
	debito.style.display="block";
	credito.style.display="none";		
	cheque.style.display="none";
	boleto.style.display="none";		
	break;
	
	case 3:
	case 4:
	case 5:
	dinheiro.style.display="none";
	debito.style.display="none";
	credito.style.display="block";		
	cheque.style.display="none";
	boleto.style.display="none";		
	break;
	
	case 6: 
	dinheiro.style.display="none";
	debito.style.display="none";
	credito.style.display="none";		
	cheque.style.display="block";
	boleto.style.display="none";		
	break;

	case 7: 
	dinheiro.style.display="none";
	debito.style.display="none";
	credito.style.display="none";		
	cheque.style.display="none";
	boleto.style.display="block";		
	break;

	}

}