<?php

include '../../config.php';

$abmUsuario = new abmUsuario();
$datosUsuario = data_submitted();
$datosUsuario['accion'] = 'nuevo';

$abmUsuario->abm($datosUsuario);

verEstructura($datosUsuario);


echo "<h1>Se registro correctamente</h1>";

echo "<a href='../login.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";

?>