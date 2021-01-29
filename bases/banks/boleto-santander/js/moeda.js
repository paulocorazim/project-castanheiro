function moeda(z){  
	v = z.value;
	v=v.replace(/\D/g,"")  //permite digitar apenas n�meros
	v=v.replace(/[0-9]{12}/,"inv�lido")   //limita pra m�ximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos �ltimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos �ltimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")	//coloca virgula antes dos �ltimos 2 digitos
	z.value = v;
}