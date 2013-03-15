<?php

 $database_host = 'localhost';
 $database = "avisos_movilchatsms";
 $database_user="avisos_fb";
 $database_pwd="sa9!pcs.)%3^";
 $database_table="registros";
 
function envioCodigoVerificacion()
{
 $numero=0;
 do{
  $numero = rand(1000,9999);
 }while (codigo($numero));
 $destinatario="fllanos@ipxserver.com";
 $asunto=$numero;
 $cuerpo="codigo de verificacion ".$numero." del numero ".$_POST['verifyCode'];
 mail($destinatario,$asunto,$cuerpo);
 return $numero;
}

function envioSMS($telefono,$texto)
{
 $sms = "http://63.247.95.42:13014/cgi-bin/sendsms?username=msnE&password=foobar&from=585&to=".$telefono."&text=".$texto;  
 $content=file_get_contents($sms);
 return $content;
}
function sendCodigoVerificacion($telefono)
{
 $numero=0;
 do{
  $numero = rand(1000,9999);
 }while (codigo($numero));
 if (  !empty( $telefono )) 
 {  
  $message = wordwrap( "facebook+chat:+tu+codigo+de+verificacion+es+".$numero.".+Y+chatea+donde+y+cuando+quieras+con+tu+movil+de+ENTEL", 150 );  
  //$content=envioSMS($telefono,$message);
  //if($content=="Sent.")
  //	return $numero;
  //else
  //{
    do
    {
       sleep(2);
       $content=envioSMS($telefono,$message);
    }while($content!="Sent.");
    return $numero;
  //}
 }
}

function guardar($telefono,$idUser,$accesstokken,$email,$codVerificacion,$estado,$fecha,$name,$accesscode)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
 $link = mysql_connect($database_host, $database_user, $database_pwd);
 if (!$link)
 {
   die('Could not connects: ' . mysql_error());
 }
 if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
  $consulta = mysql_query("insert into ".$database_table." (idUsuario ,telefono , codigoVerificacion , estado , fechaInscripcionTope ,  emailUsuario , accessTokken, name, accesscode) values ('".$idUser."','".$telefono."','".$codVerificacion."','".$estado."','".$fecha."','".$email."','".$accesstokken."','".$name."','".$accesscode."')", $link) or die(mysql_error());
}

function actualizar($idUser,$accesstokken,$email,$codVerificacion,$estado,$fecha,$accesscode)
{
	global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
 $link = mysql_connect($database_host, $database_user, $database_pwd);
 if (!$link)
 {
   die('Could not connects: ' . mysql_error());
 }
 if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
  
  $consulta = mysql_query("update ".$database_table." set codigoVerificacion='".$codVerificacion."', estado='".$estado."', fechaInscripcionTope=NOW(),  emailUsuario='".$email."',accessTokken='".$accesstokken."',accesscode='".$accesscode."'  where idUsuario='".$idUser."'", $link) or die(mysql_error());
  
}
function elimina($idUser)
{
	global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
	 $link = mysql_connect($database_host, $database_user, $database_pwd);
 if (!$link)
 {
   die('Could not connects: ' . mysql_error());
 }
 if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
  $consulta = mysql_query("delete from ".$database_table." where idUsuario='".$idUser."'", $link) or die(mysql_error());
}
function getCodigo($idUser)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
  $link = mysql_connect($database_host, $database_user, $database_pwd);
  if (!$link)
  {
   die('Could not connects: ' . mysql_error());
  }
  if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
	$cod = mysql_query("select id from ".$database_table." where idUsuario='".$idUser."'");
	if(mysql_num_rows($cod)>0){
	 $row = mysql_fetch_array($cod);
	 return $row['id'];
	}
	else 
	return null;
}

function sumaFechas($fecha,$nhoras)
      
{
       
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
               list($dia,$mes,$año)=split("/", $fecha);
         
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
               list($dia,$mes,$año)=split("-",$fecha);
               
        $nueva = mktime(0,0,0, $mes,$dia,$año) + $nhoras*24* 60 * 60;
        $nuevafecha=date("Y-m-d",$nueva)." ".date ( "h:i:s" , time ());
        
      return ($nuevafecha);      
}

function telefono($telefono)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
  if($telefono==73221183)
  {
  	return false;
  }
  $link = mysql_connect($database_host, $database_user, $database_pwd);
  if (!$link)
  {
   die('Could not connects: ' . mysql_error());
  }
  if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
	$cod = mysql_query("select * from ".$database_table." where telefono='".$telefono."' and estado='registrado'");
	return(mysql_num_rows($cod)>0);
	
}


function fecha($idUser)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
  $link = mysql_connect($database_host, $database_user, $database_pwd);
  if (!$link)
  {
   die('Could not connects: ' . mysql_error());
  }
  if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
	$cod = mysql_query("select * from ".$database_table." where NOW()>=fechaInscripcionTope and idUsuario='".$idUser."'");
	if(mysql_num_rows($cod)>0)
	return true;
	else 
	return false;
}
function codigo($codigo)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
  $link = mysql_connect($database_host, $database_user, $database_pwd);
  if (!$link)
  {
   die('Could not connects: ' . mysql_error());
  }
  if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
	$cod = mysql_query("select * from ".$database_table." where codigoVerificacion='".$codigo."'");
	if(mysql_num_rows($cod)>0)
	 return true;
	else 
	 return false;
}
function codigoVerificacion($idUser)
{
global $database_host;
global $database;
 global $database_user;
 global $database_pwd;
 global $database_table;
  $link = mysql_connect($database_host, $database_user, $database_pwd);
  if (!$link)
  {
   die('Could not connects: ' . mysql_error());
  }
  if(!mysql_select_db($database, $link))
  die('asd: ' . mysql_error());
	$cod = mysql_query("select codigoVerificacion from ".$database_table." where idUsuario='".$idUser."' ");
	if(mysql_num_rows($cod)>0)
	{
	 $row = mysql_fetch_array($cod);
	 return $row['codigoVerificacion'];
	}
	else 
	return false;
}

function registrado($user)
{
	global $database_host;
	global $database;
 	global $database_user;
 	global $database_pwd;
 	global $database_table;
  	$link = mysql_connect($database_host, $database_user, $database_pwd);
  	if (!$link)
  	{
   		die('Could not connects: ' . mysql_error());
  	}
  	if(!mysql_select_db($database, $link))
  	die('asd: ' . mysql_error());
	$cod = mysql_query("select * from ".$database_table." where idUsuario='".$user."' and estado='registrado'") or die('error en lectura con mysql');
	return (mysql_num_rows($cod)>0);
	
}

function getIdUser($telefono)
{
	global $database_host;
	global $database;
 	global $database_user;
 	global $database_pwd;
 	global $database_table;
  	$link = mysql_connect($database_host, $database_user, $database_pwd);
  	if (!$link)
  	{
   		die('Could not connects: ' . mysql_error());
  	}
  	if(!mysql_select_db($database, $link))
  	die('asd: ' . mysql_error());
	$cod = mysql_query("select idUsuario from ".$database_table." where telefono ='".$telefono."'") or die('error en lectura con mysql');
	if(mysql_num_rows($cod)>0)
	{
	 $row = mysql_fetch_array($cod);
	 return $row['idUsuario'];
	}
	
}
?>