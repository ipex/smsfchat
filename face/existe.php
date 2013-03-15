<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MovilChat SMS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
//busca caracteres que no sean espacio en blanco en una cadena
function vacio(q) {
        for ( i = 0; i < q.length; i++ ) {
                if ( q.charAt(i) != " " ) {
                        return true
                }
                
        }
        return false
}
</script>
<script language="javascript" type="text/javascript">
//busca caracteres que sean numeros en una cadena
function numero(formulario) {
	var er_cp = /(^([0-9]{8,8})|^)$/ //8 números     	
	//comprueba campo codigo postal
	if(!er_cp.test(formulario.verifyCode.value)) { 		
		return false
	}  
	var S=formulario.verifyCode.value
	switch (S.substr(0,1)) {
	   case '7' : 
	   case '6' : return true
	   default: return false
	}
	return true			//cambiar por return true para ejecutar la accion del formulario
}
</script>

<script language="javascript" type="text/javascript">
//valida que el campo no este vacio y no tenga solo espacios en blanco
function valida(F) {
        if(vacio(F.verifyCode.value) == false ) {
                alert("Introduzca su numero de celular.")
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
</script>
</head>
<body>
<div id="FB_HiddenIFrameContainer" style="display:none; position:absolute; left:-100px; top:-100px; width:0px; height: 0px;">
</div> 

<div class="mainDiv"><div class="bdDiv">
	<script>
	  function fb(){
		top.location.href="http://www.facebook.com/MovilChat";
	  }
	 function re(){
		top.location.href="http://kollahost.com/face/";
	  }
	</script>
  <form action="index.php" method="post" name="validateForm" onsubmit="return valida(this);">
    <table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
    	<p align="center"><img src="image/chat-face2.png"></p>
    	</tr>
    	<tr>		
			<td><h4>Tu cuenta de facebook ya esta conectada a tu M&#243vil de ENTEL, si deseas registrarte nuevamente presiona Registrar</h4></td>
		</tr>  
		<tr>		
			<td><h6>Nota: Recuerda que s&#243lo podras chatear desde el nuevo N&#250mero que registres.</h6></td>
		</tr>
		<tr><td>
	<p align="center"><img src="image/chat-face2.gif"></p>
	 </td></tr>    
	<tr>
      <td width="658" height="45" align="right">
		<span class="textS">
			<input type="hidden" name="estado" value="1">
			<input name="button" type="submit" class="boton2" id="button" value="Registrar" style="width:auto" onClick="re();"/>&nbsp;
			<input name="button2" type="button" class="boton2" id="button" value="Regresar a Facebook"  style="width:auto"  onClick="fb();"/>&nbsp;
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