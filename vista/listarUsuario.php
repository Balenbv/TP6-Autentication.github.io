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
        echo "no hay nada";
    }

    echo "<a href='./index.php'><button>Volver al index</button></a>";
    echo "<a href='./login'><button>Registrar Usuario</button></a>";
    echo "<a href='./Action/actualizarLogin'><button>actualizar datos del usuario</button></a>";
    echo "<a href='./Action/eliminarLogin'><button>eliminar datos del usuario</button></a>";

    
?>


