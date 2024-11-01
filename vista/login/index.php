<?php ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="../Action/Assets/md5.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container align-center justify-center mt-5 ">
            <form action="./action.php" id="loginForm" method="POST">
                    <div style="container ">
                        <div class="form-group">
                            <label for="idUsuario" class="form-label">Ingresa ID:</label>
                            <input type="text" name="idUsuario" id="idUsuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="usNombre" class="form-label">Ingresa nombre usuario:</label>
                            <input type="text" name="usNombre" id="usNombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="usPass" class="form-label">Ingrese su Contraseña:</label>
                            <input type="password" name="usPass" id="usPass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="usMail" class="form-label">Ingrese su correo:</label>
                            <input type="mail" name="usMail" id="usMail" class="form-control" required>
                        </div>

                        <div class="form-group mt-5">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                        </div>
                    </div>
            </form>
            
            <div class="form-group">
                    <p class="mt-5">No tenes cuenta?</p>
                    <a href='../register/index.php'>
                        <button class="btn btn-light border-dark">Registrar</button>
                    </a>
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

    </div>