function inicio(){
	document.criarlogin.nome.focus();
	return true;
}

function imprimir(){
	if (window.print){
		resposta = confirm('Deseja imprimir essa página ?');
		if (resposta) 
			window.print(); 
		}
}

function valida_campos_cadcontrata2a(){
	if(document.criarlogin.nome.value==""){
		alert("Digite o nome completo.");
		document.criarlogin.nome.focus();
		return false;
	}   

	if(document.criarlogin.endereco.value==""){
		alert("Digite o endereço.");
		document.criarlogin.endereco.focus();
		return false;
	}

	if(document.criarlogin.bairro.value==""){
		alert("Digite o bairro.");
		document.criarlogin.bairro.focus();
		return false;
	}
	
	if(document.criarlogin.cidade.value==""){
		alert("Digite a cidade.");
		document.criarlogin.cidade.focus();
		return false;
	}

	if(document.criarlogin.email.value==""){
		alert("Digite o email.");
		document.criarlogin.email.focus();
		return false;
	}
   
}


function repete_dados(){
	if(document.criarlogin.importar.checked){
		alert("oi");
		document.criarlogin.endereco2.value = document.criarlogin.endereco.value);
		document.criarlogin.bairro2.value = document.criarlogin.bairro.value);
		document.criarlogin.cidade2.value = document.criarlogin.cidade.value);
		document.criarlogin.uf2.value = document.criarlogin.uf.value);
		document.criarlogin.cep2.value = document.criarlogin.cep.value);
	}
}

