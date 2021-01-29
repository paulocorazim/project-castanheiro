// JavaScript Document
    // JavaScript Document
    // FUNÇÃO RESPONSÁVEL DE CONECTAR A UMA PAGINA EXTERNA NO NOSSO CASO A BUSCA_NOME.PHP
    // E RETORNAR OS RESULTADOS
     
    function ajax3(url){
     
    req3 = null;
    // Procura por um objeto nativo (Mozilla/Safari)
    if (window.XMLHttpRequest) {
    req3 = new XMLHttpRequest();
    req3.onreadystatechange = processReqChange_03;
    req3.open("GET",url,true);
    req3.send(null);
    // Procura por uma versão ActiveX (IE)
    } else if (window.ActiveXObject) {
    req3 = new ActiveXObject("Microsoft.XMLHTTP");
    if (req3) {
     
    req3.onreadystatechange = processReqChange_03;
    req3.open("GET",url,true);
     
	alert("ate aqui ok");
    req3.send();
    }
    }
    }
     
    function processReqChange_03(){
		// apenas quando o estado for "completado"
			if (req3.readyState == 4) {
				document.getElementById('pagina03').innerHTML="Aguarde...";
				// apenas se o servidor retornar "OK"
				if (req3.status ==200) {
					// procura pela div id="pagina" e insere o conteudo
					// retornado nela, como texto HTML
					document.getElementById('pagina03').innerHTML = req3.responseText;
				}else{
					alert("Houve um problema ao obter os dados:n" + req3.statusText);
				}
			}
		
	}