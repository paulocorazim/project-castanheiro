function contador(MaxLength){
          obj = document.getElementById('texto1');
          if (MaxLength !=0) {
                 if (obj.value.length > 4)  {
                        obj.value = obj.value.substring(0, 4);
                        alert ("Número de caracteres excedidos! O limite máximo é de 400 caracteres.");
                 }
          }
		  document.form1.mostrador1.value = 4 - obj.value.length;
   }



function valida_campo_texto(){
	obj = document.getElementById('texto1');
	
	if(obj.value.length>4){
		alert ("Número de caracteres excedidos! O limite máximo é de 400 caracteres.");
		document.form1.texto1.focus();
		return false;
	}   
}