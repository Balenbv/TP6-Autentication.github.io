<?php 

include_once "../../config.php"; 
$datosUsuario = data_submitted();
verEstructura($datosUsuario);

$abmUsuario = new abmUsuario();
$datosUsuario['accion'] = 'borrar';
try{
    $abmUsuario->abm($datosUsuario);
} catch (Exception $e) {
    echo "Error al borrar el usuario";
}

echo "<a href='../index.php'><button>Volver al index</button></a>";
?>

<h1>Se borro el usuario</h1>



