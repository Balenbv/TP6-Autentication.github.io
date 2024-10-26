<?php 
include_once "../../config.php"; 

$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
print_r($abmUsuario->obtenerDatos($datosUsuario));

$datosUsuario['accion'] = 'editar';
$abmUsuario->abm($datosUsuario);
?>

<h1>Se actualizo correctamente sus datos</h1>

