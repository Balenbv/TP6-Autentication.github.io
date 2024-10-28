<?php 
include_once "../../config.php"; 

$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
$datosUsuario['accion'] = 'editar';
try{
    $abmUsuario->abm($datosUsuario);
} catch (Exception $e) {
    echo "Error al actualizar el usuario";
}
?>

<h1>Se actualizo correctamente sus datos</h1>