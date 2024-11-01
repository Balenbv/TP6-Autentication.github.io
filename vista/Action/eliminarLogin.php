<?php 

include_once "../../config.php"; 
$datosUsuario = data_submitted();
verEstructura($datosUsuario);
$abmUsuario = new abmUsuario();

try{
    $usuario = $abmUsuario->buscar($datosUsuario);
    if($usuario->getUsDeshabilitado() != null){
        $datosUsuario['accion'] = 'borrar';
        $abmUsuario->abm($datosUsuario);
    }

    echo "<h1>Se borro el usuario</h1>"; 
} catch (Exception $e) {
    echo "Error al borrar el usuario";
}

echo "<a href='../listarUsuario.php'><button>Volver a la lista</button></a>";
?>

