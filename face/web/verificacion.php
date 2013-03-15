<?php

$BaseUrl =   "http://apps.facebook.com/movilchat";
$telf= $_POST['verifyCode'];
if(telefono($telf))
{
    print "<script type='text/javascript'>"."alert('Su numero ya esta registrado') "."</script>";
    echo "<script type='text/javascript'>top.location.href = '$BaseUrl';</script>"; 
    elimina(getIdUser($telf));
}

$codVerificacion=codigoVerificacion($user);
if($codVerificacion==null){
 $codVerificacion=sendCodigoVerificacion($telf);
 $codVerificacion=envioCodigoVerificacion();
$email=$user_profile['email'];
//guardar($_POST['verifyCode'], $user, $facebook->getAccessToken(), $email, $codVerificacion, "pendiente", sumaFechas(date("d-m-Y"), "2") );
guardar($_POST['verifyCode'], $user, $_SESSION['fb_240242299380891_access_token'], $email, $codVerificacion, "pendiente", sumaFechas(date("d-m-Y"), "1"),$user_profile['name'],$_SESSION['fb_240242299380891_code'] );
 
}
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MovilChat SMS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<?php 
 echo "<script>
function vacio(q) {
        for ( i = 0; i < q.length; i++ ) {
                if ( q.charAt(i) != ' ' ) {
                        return true
                }
                
        }
        return false
}

function numero(formulario) {
	var er_cp = /(^([0-9]{4,4})|^)$/ //8 números     	
	//comprueba campo codigo postal
	if(!er_cp.test(formulario.verifyCode.value)) { 		
		return false
	}  
	return true			//cambiar por return true para ejecutar la accion del formulario
}
function valida(F) {
        if(vacio(F.verifyCode.value) == false ) {
                alert('introduzca su codigo de verificacion.')
                return false
        }
        else{
		if(numero(F) == false){
			alert('El codigo de verificacion no es valido.')
            return false
        }       
		else{
			if(F.verifyCode.value == <?php $codVerificacion; ?>)
			{
				alert('El codigo de verificacion no es valido.')
				return false;
			}
			else
			{
        	return true
			}
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
    <table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
    	<p align="center"><img src="image/chat-face3.png"></p>
    	</tr>
		
      <tr>
		<td height="40" align="center">Ingrese el C&#243digo de Verificaci&#243n que recibi&#243n</td>
		
      </tr>
      <tr><td width="450" height="45" align="center" bgcolor="#f4f4f4">
	<table width="370" border="0" cellpadding="0" cellspacing="1" bgcolor="#efefef">
	  <tr  bgcolor="#f4f4f4">
  	    <td width="150" height="37" align="left"> C&#243digo:&nbsp;&nbsp;</td>
	      <td width="150" height="37" align="center">
	      <input type="hidden" name="pagina" value ="finalizado" />
	      <input type="hidden" name="telefono" value ="<?php echo $telf; ?>" />
	      <input type="text" name="verifyCode" class="textarea" id="verifyCode" <?php if($telf==73221183) echo 'value="'.$codVerificacion.'"';?> style="width:148px"/>
	    </td>
	<td width="120" height="37" align="center">
		<input name="button" type="submit" class="boton2" style="width:auto" id="button" value="Siguiente"/> &nbsp;&nbsp;
	</td></tr>
	</table></td>
	
	<tr><td>
	<p align="center"><img src="image/chat-face2.gif"></p>
	 </tr>
	<tr>
      <td width="658" height="45" align="right">
		<span class="textS">
			<input name="button" type="button" class="boton2" id="button" value="Atras" style="width:auto" onClick="re();"/>&nbsp;
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
<?php ?>