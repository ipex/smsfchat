<?php
include '../src/facem.php';    
include '../src/fun.php';

	if(registrado($user))
	{
		actualizar($user, $facebook->getAccessToken(), $email, "", "registrado", date("d-m-Y"),$_SESSION['fb_229592483756265_code']);
		include 'existe.php';
		
	}
	else 
	{
		include '../web/index.php';
		
	}
	
?>
