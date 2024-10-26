<?php 

include_once "../../config.php"; 
$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
$abmUsuario->buscar($datosUsuario);
$datosUsuario['accion'] = 'borrar';
$abmUsuario->abm($datosUsuario);

echo "<a href='../index.php'><button>Volver al index</button></a>";

?>



