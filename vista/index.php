<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <div class="container-flex text-center mt-5">
        <a href='./registrarUsuario.php' class="btn"><button class="btn btn-light border-dark">Login</button></a>
        <a href='./listarUsuario.php' class="btn"><button class="btn btn-light border-dark">Listar Usuarios</button></a>
    </div>

</body>
</html>
