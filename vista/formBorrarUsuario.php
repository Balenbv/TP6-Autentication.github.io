<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar usuario</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="./Action/Assets/md5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <h1>Borrar Usuario</h1>
        <form action="../vista/Action/eliminarLogin.php" id="loginForm"method="POST">
            <label for="idUsuario">Id usuario</label>
            <input type="int" name="idUsuario" id="idUsuario" class="form-control" required>

            <input type="submit" value="Ingresar" class="btn btn-primary mt-2">
            <br>
        </form>
        <a href="./listarUsuario.php"><button class="btn btn-light mt-5 border-dark">Volver al listar</button></a>



    </div>

</body>

</html>