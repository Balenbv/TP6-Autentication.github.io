<?php 
include_once "../../config.php"; 

$datosUsuario = data_submitted();
$abmUsuario = new abmUsuario();
$session = new Session();

verEstructura($datosUsuario);

try{
    //nose si el buscar es identificar de nombre y contraseña para encontrar el id
    //pero dijimos q se iba a buscar por id 
    $usuario = $abmUsuario->buscar($datosUsuario);
    
    if(!empty($usuario)){
        if($session->iniciar($datosUsuario['usNombre'],$datosUsuario['usPass'])){

        }else{
            throw new Exception("<p>El usuario no pudo ingresar</p>");
        }
    }else {
        echo "<p> Algo salio mal </p>";
        echo "<p> Desea registrarte  </p>";
    }
} catch (Exception $e) {
    echo "Se podrujo un error: " . $e->message();
}

?>
