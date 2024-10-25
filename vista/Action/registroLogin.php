<?php

include '../../config.php';

$abm = new abmUsuario();
$datosUsuario = data_submitted();
$abmUsuario->alta($datosUsuario);

verEstructura($datosUsuario);
if($datosUsuario != null){
    echo "<h1>Se registro correctamente</h1>";
}


echo "<a href='../login.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";
