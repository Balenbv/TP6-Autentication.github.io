<?php

include '../../config.php';

$abmUsuario = new abmUsuario();
$session = new Session();
$datosUsuario = data_submitted();


try {
    if($session->iniciar($datosUsuario['usNombre'] ,$datosUsuario['usPass'])){
        $datosUsuario['accion'] = 'nuevo';
        $abmUsuario->abm($datosUsuario);
        echo "Ingreso";
    }else{
        throw new Exception("<p>La sesion no se pudo confirma de manera exitosa</p>");
    }
} catch (Exception $e) {
    echo "Se produjo un error: " . $e->getMessage();
}


verEstructura($datosUsuario);


//echo "<h1>Se registro correctamente</h1>";

echo "<a href='../registrarUsuario.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";

?>