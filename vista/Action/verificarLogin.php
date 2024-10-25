<?php

include '../../config.php';

$datos = data_submitted();

foreach ($datos as $key => $value) {
    $datos[$key] = md5($value);
}

$abmUsuario = new abmUsuario();

if($abmUsuario->buscar($datos) !== null){
    $abmUsuario->alta($datos);
}

