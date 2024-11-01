<?php 
include_once "../../config.php"; 

$datosUsuario = data_submitted();
$abmUsuario = new abmUsuario();
$session = new Session();
verEstructura($datosUsuario);

try{
    $usuario = $abmUsuario->buscar($datosUsuario)[0];
    verEstructura($usuario);

    if(!empty($usuario)){
        if($usuario->getUsMail() == $datosUsuario['usMail']){
            if($session->iniciar($datosUsuario['usNombre'],$datosUsuario['usPass'])){
                header("Location: ../listarUsuario.php");
            }else{
                throw new Exception("<p>El usuario no tiene cuenta</p>");
            }
        }
    }else{
        throw new Exception("<p>No existe este usuario</p>");
    }

} catch (Exception $e) {
    echo "Se podrujo un error: " . $e->getMessage();
}

?>
