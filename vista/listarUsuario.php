<?php 
include_once '../config.php';


$abmUsuario = new abmUsuario();
$usuarios = $abmUsuario->obtenerDatos(null);

    if (isset($usuarios)){
        foreach ($usuarios as $usuario) {
            echo "<p>Nombre de Usuario: ".$usuario['usNombre']."</p>";
            echo "<p>Mail: ".$usuario['usMail']."</p>";
            echo "<p> Este es tu id: ". $usuario['']."</p>";
            echo "<br>";
        }
    } else {
        echo "no hay nada";
    }

    echo "<a href='./index.php'><button>Volver al index</button></a>";
    echo "<a href='./registrarUsuario.php'><button>Registrar Usuario</button></a>";
    echo "<a href='./Action/actualizarLogin.php'><button>actualizar datos del usuario</button></a>";
    echo "<a href='./Action/eliminarLogin.php'><button>eliminar datos del usuario</button></a>";  
?>


