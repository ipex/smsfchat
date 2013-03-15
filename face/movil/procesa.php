<?php
	//$app_id = "229592483756265";
    //$app_secret = "83af44dc7eb9870734f26b4576c9ed52";
    $app_id = "240242299380891";
    $app_secret = "621f0bef66f988237742391da6791bdc";
   //$my_url = 
    $appBaseUrl =   "http://kollahost.com/face/movil/procesa.php";
 
  /*
     * Facebook dirige al usuario a la baseUrl tras autentificarlo
     * Comprobamos si nos ha devuelto un $_GET['code']
     * para redirigirlo al appBaseUrl
     */
    if (isset($_GET['code'])){
        header("Location: " . $appBaseUrl);
        echo "sin codigo";
        //exit;
    }
 
 
// Incluimos el PHP SDK v.3.0.0 de Facebook    
require '../src/facebook.php';
 
// Creamos un nuevo objeto Facebook con los datos de nuestra aplicación (cambia los datos por los de tu App ID y tu App Secret).
$facebook = new Facebook(array(
  'appId'  => $app_id,
  'secret' => $app_secret,
));
 
// Obtener el ID del Usuario
$user = $facebook->getUser();
 
// Podemos obtener o no este dato dependiendo de si el usuario se ha identificado en Facebook o no
 
if ($user) {
  try {
    // Procedemos a saber si tenemos a un usuario que se ha identificado en Facebook que está autentificado.
    // Si hay algún error se guarda en un archivo de texto (error_log)   
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
 
// la url de Login o Logout dependerá del estado actual del usuario, si está autentificado o no en nuestra aplicación
// Aquí obtenemos los permisos del usuario. Por defecto obtenemos una serie de permisos básicos
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
 $loginUrl = $facebook->getLoginUrl(            array(
                'scope'         => 'email,offline_access,xmpp_login',
                'display' 		=> 'wap',
            ));
 //*/
	//$loginUrl = $facebook->getLoginUrl();
}
 
    if (!$user) {
    	$login="https://www.facebook.com/dialog/oauth?client_id=240242299380891&redirect_uri=http://www.facebook.com/connect/login_success.html&scope=email,offline_access,xmpp_login&display=wap";
    	//echo "<script type='text/javascript'>top.location.href = '$login';</script>";
    	echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
    	
    /*    echo "<fb:login-button perms='email'> Connect</fb:login-button> 
	<div id='fb-root'></div>
      <script src='http://connect.facebook.net/en_US/all.js'></script>
      <script>
         FB.init({ 
            appId:'229592483756265', cookie:true, 
            status:true, xfbml:true 
         });
		 FB.Event.subscribe('auth.login', function(response) {
        window.location.reload();
      });
      </script> ";*/
    	//echo "<script type='text/javascript'>top.location.href = https://www.facebook.com/dialog/oauth?client_id='$app_id'redirect_uri=https://www.facebook.com/connect/login_success.html#access_token=Success;</script>";
        die();
        exit;
    }
 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml"><head><title>Autorizacion Movilchat</title>
<style type="text/css">
html, body { width: 520px;}
</style>
</head>
<body>
<h1>Movilchat</h1>
<?php if ($user):?>
<h3>MovilChat: Autorizado</h3><br>
<pre><?php print "ID:".$user_profile['id']; ?></pre>
<pre><?php print "NAME:".$user_profile['name']; ?></pre>
<pre><?php print "EMAIL:".$user_profile['email']; ?></pre>
<pre><?php print "VERIFIED:".$user_profile['verified']; ?></pre>
<?php if($_SESSION){ ?>
<pre><?php print "CODE:".$_SESSION['fb_240242299380891_code']; ?></pre>
<pre><?php print "TOKEN:".$_SESSION['fb_240242299380891_access_token']; ?></pre>
<?php } ?>
<?php else: ?>
<strong><em>MovilChat: No conectado</em></strong><br>
<?php endif ?>
</body>
</html>