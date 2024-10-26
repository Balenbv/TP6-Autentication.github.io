<?php include_once "../../config.php"; 

$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
$datosUsuario['accion'] = 'editar';

$abmUsuario->abm($datosUsuario);

?>

