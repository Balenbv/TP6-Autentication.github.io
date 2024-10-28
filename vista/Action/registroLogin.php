<?php

include '../../config.php';

$abmUsuario = new abmUsuario();
$datosUsuario = data_submitted();
$datosUsuario['accion'] = 'nuevo';
try {
    $abmUsuario->abm($datosUsuario);
} catch (Exception $e) {
    echo "Error al registrar el usuario";
}


verEstructura($datosUsuario);


echo "<h1>Se registro correctamente</h1>";

echo "<a href='../registrarUsuario.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";

?>