<?php 
include_once '../config.php';

echo "<h1>Nombre de los Usuarios</h1>";

$abmUsuario = new abmUsuario();
$usuarios =  $abmUsuario->buscar(null);

    if (isset($usuarios)){
        foreach ($usuarios as $usuario) {
            $usNombre = $usuario->getUsNombre();
            $uspass = $usuario->getUsPass();

            echo "Nombre:".$usNombre."<br>";
        }
        
    } else {
        echo "no hay nada";
    }

    echo "<br>";
    echo "<a href='./index.php'><button>Volver al index</button></a>";
    echo "<a href='./registrarUsuario.php'><button>Registrar Usuario</button></a>";
    echo "<a href='./formActualizarUsuario.php'><button>actualizar datos del usuario</button></a>";
    echo "<a href='./formBorrarUsuario.php'><button>eliminar datos del usuario</button></a>";

    
?>


