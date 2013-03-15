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
	var S=formulario.verifyCode.value
	var sub = S.substr(0,3)
	switch (sub) {
	   case '710':
	   case '711':
	   case '712':
	   case '713':
	   case '714':
	   case '715':
	   case '716':
	   case '717':
	   case '718':
	   case '719':
	   case '720':
	   case '721':
	   case '722':
	   case '723':
	   case '724':
	   case '725':
	   case '726':
	   case '727':
	   case '728':
	   case '729':
	   case '730':
	   case '731':
	   case '732':
	   case '733':
	   case '734':
	   case '735':
	   case '736':
	   case '737':
	   case '738':
	   case '739':
	   case '740':
	   case '741':
	   case '742':
	   case '743':
	   case '744':
	   case '745':
	   case '746':
	   case '747':
	   case '748':
	   case '749':
	   case '670':
	   case '671':
	   case '672':
	   case '673':
	   case '674':
	   case '675':
	   case '676':
	   case '677':
	   case '678':
	   case '679':
	   case '680':
	   case '681':
	   case '682':
	   case '683':
	   case '684':
	   case '685':
	   case '686':
	   case '687':
	   case '688':
	   case '689': return true
	   break
	   default: return false
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
    	<p align="center"><img src="image/chat-face.png"></p>
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
	<p align="center"><img src="image/chat-face2.gif"></p>
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