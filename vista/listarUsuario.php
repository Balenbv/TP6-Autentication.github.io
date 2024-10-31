<?php 
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listar Usuarios</title>
</head>
<body>
    <div class="container mt-5">
        <div class="container">
            <?php
            $abmUsuario = new abmUsuario();
            $usuarios = $abmUsuario->obtenerDatos(null);

                if (isset($usuarios)){
                    foreach ($usuarios as $usuario) {
                        echo '<div class="container border-dark">';
                        echo "<p>Nombre de Usuario: ".$usuario['usNombre']."</p>";
                        echo "<p>Mail: ".$usuario['usMail']."</p>";
                        echo "<p> Este es tu id: ". $usuario['idUsuario']."</p>";
                        echo "<br>";
                        echo "</div>";

                    }
                } else {
                    echo "no hay nada";
                }
            ?>
        </div>

        <a href='./index.php'><button class="btn btn-light border-dark">Volver al index</button></a>
        <a href='./registrarUsuario.php'><button class="btn btn-light border-dark">Registrar Usuario</button></a>
        <a href='./formActualizarUsuario.php'><button class="btn btn-light border-dark">actualizar datos del usuario</button></a>
        <a href='./formBorrarUsuario.php'><button class="btn btn-light border-dark">eliminar datos del usuario</button></a>
    </div>

</body>
</html>




