function imprimir(){
	if (window.print){
		resposta = confirm('Deseja imprimir essa página ?');
		if (resposta) 
			window.print(); 
	}
}

function iniciar_campos(){
	
	var sc = document.form_boletim.nota1d.value; // second chance
	var mf = document.form_boletim.media_final.value; // media final

	// media 1
	var n1a = document.form_boletim.nota1a.value;  // nota1 da coluna test1
	var n2a = document.form_boletim.nota2a.value;  // nota2 da coluna test1
	var n3a = document.form_boletim.nota3a.value;  // nota3 da coluna test1
	var m1  = document.form_boletim.media_test1.value; // media1
	
	var m1 = (parseFloat(n1a)+parseFloat(n2a)+parseFloat(n3a))/3; // calculo da media1
	var m1 = (Math.round(m1*100))/100;
	document.form_boletim.media_test1.value = m1;
	

	// media 2
	var n1b = document.form_boletim.nota1b.value;  // nota1 da coluna test2
	var n2b = document.form_boletim.nota2b.value;  // nota2 da coluna test2
	var n3b = document.form_boletim.nota3b.value;  // nota3 da coluna test2
	var m2  = document.form_boletim.media_test2.value; // media1
	
	var m2 = (parseFloat(n1b)+parseFloat(n2b)+parseFloat(n3b))/3; // calculo da media1
	var m2 = (Math.round(m2*100))/100;
	document.form_boletim.media_test2.value = m2;


	// media 3
	var n1c = document.form_boletim.nota1c.value;  // nota1 da coluna test3
	var n2c = document.form_boletim.nota2c.value;  // nota2 da coluna test3
	var n3c = document.form_boletim.nota3c.value;  // nota3 da coluna test3
	var m3  = document.form_boletim.media_test3.value; // media1
	
	var m3 = (parseFloat(n1c)+parseFloat(n2c)+parseFloat(n3c))/3; // calculo da media1
	var m3 = (Math.round(m3*100))/100;
	document.form_boletim.media_test3.value = m3;


	// soma de todas as medias
	var soma_das_medias = parseFloat(m1)+parseFloat(m2)+parseFloat(m3);


	// descobrir qual a menor media
	var menor_media = Math.min(m1, m2, m3); 
	
	// verificar se a second chance e´ maior que a menor media
	// em caso afirmativo, iremos usar a media ou nota second chance no lugar da media menor encontrada.

	//alert("menor media é: "+menor_media);
	if(menor_media>=sc){	// se a menor media for maior ou igual a nota do second change, entao a media tera o calculo normal, caso contrario, usara a nota SC.
		// media final tem o calcula normal
		var mf = (soma_das_medias) / 3;  // calculo da media final
		var mf = (Math.round(mf*100)) / 100;  // arredondamento da media final
	}else{
		// media final tem o calcula usando a nota second chance no lugar da media menor
		var mf = ( (parseFloat(soma_das_medias) - parseFloat(menor_media) ) + parseFloat(sc) ) / 3;  // calculo da media final
		var mf = (Math.round(mf*100)) / 100;  // arredondamento da media final
	}


	document.form_boletim.media_final.value = mf; // atribuicao da media final ao campo e exibicao do mesmo
}










// JavaScript Document

/*
function iniciar_campos(){

	// div das formas de pagamento da matricula
	
	//document.getElementById('banco').style.display="none";
	//document.getElementById('cartao').style.display="none";
	
	// div das formas de pagamento das mensalidades
	
	//document.getElementById('men_dinheiro').style.display="none";
	//document.getElementById('men_debito').style.display="none";
	//document.getElementById('men_credito').style.display="none";
	//document.getElementById('men_cheque').style.display="none";
	//document.getElementById('men_boleto').style.display="block";

//document.form_boletim.matricula.value = 0;


	document.form_boletim.nota1a.value = 0;
	document.form_boletim.nota2a.value = 0;
	document.form_boletim.nota3a.value = 0;

	document.form_boletim.nota1b.value = 0;
	document.form_boletim.nota2b.value = 0;
	document.form_boletim.nota3b.value = 0;

	document.form_boletim.nota1c.value = 0;
	document.form_boletim.nota2c.value = 0;
	document.form_boletim.nota3c.value = 0;

	document.form_boletim.nota1d.value = 0; // second chance

	document.form_boletim.media_test1.value = 0;
	document.form_boletim.media_test2.value = 0;	
	document.form_boletim.media_test3.value = 0;		

	document.form_boletim.media_final.value = 0;		
	
	document.form_boletim.matricula.focus();

	return true;	
	

}

*/

function calcular_media(){
	
	var sc = document.form_boletim.nota1d.value; // second chance
	var mf = document.form_boletim.media_final.value; // media final

	// media 1
	var n1a = document.form_boletim.nota1a.value;  // nota1 da coluna test1
	var n2a = document.form_boletim.nota2a.value;  // nota2 da coluna test1
	var n3a = document.form_boletim.nota3a.value;  // nota3 da coluna test1
	var m1  = document.form_boletim.media_test1.value; // media1
	
	var m1 = (parseFloat(n1a)+parseFloat(n2a)+parseFloat(n3a))/3; // calculo da media1
	var m1 = (Math.round(m1*100))/100;
	document.form_boletim.media_test1.value = m1;
	

	// media 2
	var n1b = document.form_boletim.nota1b.value;  // nota1 da coluna test2
	var n2b = document.form_boletim.nota2b.value;  // nota2 da coluna test2
	var n3b = document.form_boletim.nota3b.value;  // nota3 da coluna test2
	var m2  = document.form_boletim.media_test2.value; // media1
	
	var m2 = (parseFloat(n1b)+parseFloat(n2b)+parseFloat(n3b))/3; // calculo da media1
	var m2 = (Math.round(m2*100))/100;
	document.form_boletim.media_test2.value = m2;


	// media 3
	var n1c = document.form_boletim.nota1c.value;  // nota1 da coluna test3
	var n2c = document.form_boletim.nota2c.value;  // nota2 da coluna test3
	var n3c = document.form_boletim.nota3c.value;  // nota3 da coluna test3
	var m3  = document.form_boletim.media_test3.value; // media1
	
	var m3 = (parseFloat(n1c)+parseFloat(n2c)+parseFloat(n3c))/3; // calculo da media1
	var m3 = (Math.round(m3*100))/100;
	document.form_boletim.media_test3.value = m3;


	// soma de todas as medias
	var soma_das_medias = parseFloat(m1)+parseFloat(m2)+parseFloat(m3);


	// descobrir qual a menor media
	var menor_media = Math.min(m1, m2, m3); 
	
	// verificar se a second chance e´ maior que a menor media
	// em caso afirmativo, iremos usar a media ou nota second chance no lugar da media menor encontrada.

	//alert("menor media é: "+menor_media);
	if(menor_media>=sc){	// se a menor media for maior ou igual a nota do second change, entao a media tera o calculo normal, caso contrario, usara a nota SC.
		// media final tem o calcula normal
		var mf = (soma_das_medias) / 3;  // calculo da media final
		var mf = (Math.round(mf*100)) / 100;  // arredondamento da media final
	}else{
		// media final tem o calcula usando a nota second chance no lugar da media menor
		var mf = ( (parseFloat(soma_das_medias) - parseFloat(menor_media) ) + parseFloat(sc) ) / 3;  // calculo da media final
		var mf = (Math.round(mf*100)) / 100;  // arredondamento da media final
	}


	document.form_boletim.media_final.value = mf; // atribuicao da media final ao campo e exibicao do mesmo
}
