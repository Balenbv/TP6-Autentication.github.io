<?php 
include_once '../config.php';

echo "<h1>Nombre de los Usuarios</h1>";

$abmUsuario = new abmUsuario();
$usuarios =  $abmUsuario->obtenerDatos(null);

    if (isset($usuarios)){
        foreach ($usuarios as $usuario) {
            echo "Nombre: ".$usuario['usNombre']."<br>";
            echo "Mail: ".$usuario['usMail']."<br>";
            echo "Deshabilitado: ".$usuario['usDeshabilitado']."<br>";
            echo "<br>";
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


