<?php 

//los usuarios pueden tener el mismo nombre y contraseña 
//pero tienen diferente id

include_once "../../config.php"; 
$datosUsuario = data_submitted();
$abmUsuario = new abmUsuario();

try{
    $datosUsuario['accion'] = 'nuevo';
    $abmUsuario->abm($datosUsuario);
    header("Location: ../login/index.php");

} catch (Exception $e) {
    echo "Se podrujo un error: " . $e->message();
}

?>
