<?php

include '../../config.php';

$abmUsuario = new abmUsuario();
$session = new Session();
$datosUsuario = data_submitted();
$datosUsuario['accion'] = 'nuevo';

try {
    if($session->iniciar($datosUsuario['usNombre'] ,$datosUsuario['usPass'])){
        $abmUsuario->abm($datosUsuario);
    }else{
        throw new Exception("<h1>La sesion no se pudo confirma de manera exitosa</h1>");
    }
} catch (Exception $e) {
    echo "Se produjo un error: " . $e->getMessage()
    ;
}


verEstructura($datosUsuario);


echo "<h1>Se registro correctamente</h1>";

echo "<a href='../registrarUsuario.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";

?>