<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="./Action/Assets/md5.js"></script>
</head>

<body>
    <form action="../vista/Action/verificarLogin.php" id="loginForm"method="POST">
        <label for="usNombre">Nombre de Usuario</label>
        <input type="text" name="usNombre" id="usNombre" required>
        <label for="usPass">Contraseña</label>
        <input type="password" name="usPass" id="usPass" required>
        <input type="submit" value="Ingresar">
    </form>

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