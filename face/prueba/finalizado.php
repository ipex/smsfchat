<?php

$codVerif= $_POST['verifyCode'];
if(fecha($user))
{
    echo "<script>	alert('Expiro su tiempo de registro debe Reintentelo mas tarde');</script>" ;  
	
	elimina($user);
	echo "<script type='text/javascript'>top.location.href = index.php;</script>";
	//die();
        exit;
} 

    $email=$user_profile['email'];
	actualizar($user, $facebook->getAccessToken(), $email, "", "registrado", date("d-m-Y"),$_SESSION['fb_240242299380891_code']);

  //http://74.81.90.116/cgi-bin/registro.pl?password=nu3v1t0&numero="";
  $sms = "http://74.81.90.116/cgi-bin/registro.pl?password=nu3v1t0&numero=".$_POST['telefono'];  
  $content=file_get_contents($sms);
  if($content=="Registrado")
   // $content=envioSMS($_POST['telefono'],"Usted ha sido registrado ");
    
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MovilChat SMS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
	<form action="index.php" method="post" name="validateForm">
    <table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
    	//<p align="center"><img src="image/chat-face2.png"></p>
    	</tr>
		<tr>		
			<td><h4>Ahora puedes chatear desde tu movil de ENTEL. </h4></td>
		</tr>
		<tr><td>
		//<p align="center"><img src="image/chat-face2.gif"></p>
	 </td></tr>
		<tr>
      <td width="658" height="45" align="right">
		<span class="textS">
			<input type="hidden" name="estado" value="1">
			<input name="button" type="submit" class="boton2" id="button" value="Re-Registro" style="width:auto" onClick="re();"/>&nbsp;
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