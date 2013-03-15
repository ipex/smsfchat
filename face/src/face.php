<?php
//$app_id = "240594245991346";
//$app_secret = "a387899ed417b8b65bf0fbe2ae2e3395";
$app_id = "240242299380891";
$app_secret = "621f0bef66f988237742391da6791bdc";
//$app_id = "427901857282453";
//$app_secret = "6fe119f0702a1a96de74bca505a74ff6";
$appBaseUrl =   "https://kollahost.com/face/";
 
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
    
require 'facebook.php';
 
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
 $loginUrl = $facebook->getLoginUrl( array(
   'scope' => 'offline_access,xmpp_login'
));
}
 //verificamos si el usuario existe y si no lo redirigimos a nuestra pagina 
    if (!$user) {
    	//$login="https://www.facebook.com/dialog/oauth?client_id=229592483756265&redirect_uri=http://www.facebook.com/connect/login_success.html&scope=email,offline_access,xmpp_login&display=wap";
    	//echo "<script type='text/javascript'>top.location.href = '$login';</script>";
    	echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>"; 	
        //die();
        exit;
    }
?>
<div id="FB_HiddenIFrameContainer" style="display:none; position:absolute; left:-100px; top:-100px; width:0px; height: 0px;">
</div> 
<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
<script type="text/javascript"> 
    FB_RequireFeatures(["CanvasUtil"], function(){ FB.XdComm.Server.init("xd_receiver.htm"); 
    FB.Canvas.setAutoGrow; }); 
</script>
