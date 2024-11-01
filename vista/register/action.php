<?php 

//los usuarios pueden tener el mismo nombre y contraseña 
//pero tienen diferente id

include_once "../../config.php"; 
$datosUsuario = data_submitted();
$abmUsuario = new abmUsuario();

try{
    $datosUsuario['accion'] = 'nuevo';
    verEstructura($datosUsuario);
    $abmUsuario->abm($datosUsuario);
    echo "<p>Se registro correctamente:</p>";
} catch (Exception $e) {
    echo "Se podrujo un error: " . $e->message();
}

?>
