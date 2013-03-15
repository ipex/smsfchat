<?php
include 'src/face.php';    
include 'src/fun.php';
if($_POST['estado']=="1")
{
	elimina($user);
	include 'web/index.php';
}
else
{
	if(registrado($user))
	{
		actualizar($user, $facebook->getAccessToken(), $email, "", "registrado", date("d-m-Y"),$_SESSION['fb_240242299380891_code']);
		include 'existe.php';
		
	}
	else 
	{
		include 'web/index.php';
		
	}
}
?>
