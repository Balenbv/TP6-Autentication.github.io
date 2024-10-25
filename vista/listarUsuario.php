<?php 
include_once '../config.php';


$abmUsuario = new abmUsuario();
echo $abmUsuario->buscar(null);

    if (isset($usuarios)){
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

    echo "<a href='./index.php'><button>Volver</button></a>";
    
?>


