<?php 
include_once '../../config.php';

$abmUsuario = new abmUsuario();
$usuarios = $abmUsuario->buscar(null);

    if (count($usuarios) > 0) {
        foreach ($usuarios as $usuario) {
            
            $usuarioId = $usuario->getId();
            $usNombre = $usuario->getUsNombre();
            $uspass = $usuario->getUsPass();
            $usMail = $usuario->getUsuario();
            echo $usuarioId."\n";
            echo $usNombre.'\n';
            echo $uspass.'\n';
            echo $usMail.'\n';
        }
        
    } else {
        echo "ta vacioooooo";
    }



