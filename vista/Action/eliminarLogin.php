<?php 

include_once "../../config.php"; 
$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
$datosUsuario['accion'] = 'borrar';
$abmUsuario->abm($datosUsuario);

echo "<a href='../index.php'><button>Volver al index</button></a>";
?>

<h1>Se borro el usuario</h1>



