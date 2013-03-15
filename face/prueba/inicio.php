<?php

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MovilChat SMS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<?php 
echo "<script>
//busca caracteres que no sean espacio en blanco en una cadena
function vacio(q) {
        for ( i = 0; i < q.length; i++ ) {
                if ( q.charAt(i) != ' ' ) {
                        return true
                }
                
        }
        return false
}
//busca caracteres que sean numeros en una cadena
function numero(formulario) {
	var er_cp = /(^([0-9]{8,8})|^)$/ //8 números     	
	if(!er_cp.test(formulario.verifyCode.value)) { 		
		return false
	}  
	
	return true		//cambiar por return true para ejecutar la accion del formulario
}
//valida que el campo no este vacio y no tenga solo espacios en blanco
function valida(F) {
        if(vacio(F.verifyCode.value) == false ) {
                alert('Introduzca su numero de celular.')
                return false
        }
        else{
		if(numero(F) == false){
			alert('El numero de celular no es valido.')
            return false
        }       
		else{
			
        	return true
		}
        }
}
</script>"
?>
</head>
<body><div class="mainDiv"><div class="bdDiv">
	<script>
	  function fb(){
		top.location.href="http://www.facebook.com/MovilChat";
	  }
	 function re(){
		top.location.href="http://kollahost.com/face/";
	  }
	</script>
  <form action="index.php" method="post" name="validateForm" onsubmit="return valida(this);">
    <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
    	//<p align="center"><img src="image/chat-face.png"></p>
    	</tr>
      <tr bgcolor="#f4f4f4">
	    <td height="40" align="center">Ingresa tu M&#243vil de ENTEL y te enviaremos un c&#243digo de verificaci&#243n via SMS a tu celular</td>
		</tr>
    <tr><td width="450" height="45" align="center" bgcolor="#f4f4f4">
	<table width="370" border="0" cellpadding="0" cellspacing="1">
	  	<tr  bgcolor="#f4f4f4">
  	    <td width="150" height="37" align="left">N&#250mero:&nbsp;&nbsp;</td>
	    <td width="150" height="37" align="center">
	      	<input type="hidden" name="varificationRandom" value ="" />
	      	<input type="text" name="verifyCode" class="textarea" id="verifyCode" style="width:148px"/>
	    </td>
	    <td width="120" height="37" align="center">  	
	    	<input type="hidden" name="pagina" value="verifica"> 
		<input name="button" type="submit" class="boton2" style="width:auto" id="button" value="Siguiente"/> &nbsp;&nbsp;
		</td>
		</tr>
	</table>
	</td></tr>
	<tr><td>
	//<p align="center"><img src="image/chat-face2.gif"></p>
	 </td></tr>
	<tr>
      <td width="658" height="45" align="right">
		<span class="textS">		
			<input name="button" type="button" class="boton2" id="button" value="Regresar a Facebook"  style="width:auto"  onClick="fb();"/>&nbsp;
		</span>
      </td>
    </tr>
    
    <tr>
		<td align="center" class="textS">&nbsp;</td>
		<td >&nbsp;</td>
	</tr>
    </table>
  </form>
	<br />
</div>
</body>
</html>