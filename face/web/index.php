<?php
if($_POST['pagina']=="verifica")
{
	include 'verificacion.php';
}
elseif($_POST['pagina']=="finalizado")
{
	include 'finalizado.php';
}
else 
{
	include 'inicio.php';
}
?>
