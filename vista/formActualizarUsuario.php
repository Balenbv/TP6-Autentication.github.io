<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="./Action/Assets/md5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
    <h1>Actualizar Usuario</h1>
        <form action="../vista/Action/actualizarLogin.php" id="loginForm"method="POST">
            <label for="idUsuario">Ingrese el ID</label>
            <input type="text" name="idUsuario" id="idUsuario" class="form-control" required>
            <br>
            <label for="usNombre">El nuevo nombre de Usuario</label>
            <input type="text" name="usNombre" id="usNombre" class="form-control" required>
            <br>
            <label for="usPass">La nueva contraseña</label>
            <input type="password" name="usPass" id="usPass" class="form-control" required>
            <br>
            <label for="usMail">El nuevo mail</label>
            <input type="text" name="usMail" id="usMail" class="form-control" required>
            <br>
            <input type="submit" value="Ingresar" class="btn btn-primary">
        </form>
        <a href="./listarUsuario.php"><button class="btn btn-light mt-5 border-dark">Volver al listar</button></a>

    </div>

        <script>
          $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                
                var password = $('#usPass').val();
                var encryptedPassword = hex_md5(password);
                $('#usPass').val(encryptedPassword);

                setTimeout(function() {
                    $('#usPass').val(''); // Limpiar el campo de contraseña después de enviar el formulario
                }, 1);

            });
        });
        
    </script>
</body>

</html>