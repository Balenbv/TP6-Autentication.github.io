<?php 
include_once "../../config.php"; 

$datosUsuario = data_submitted();
$abmUsuario = new abmUsuario();
$datosUsuario['accion'] = 'editar';
try{
    echo "<h1>Se actualizo correctamente sus datos</h1>";
    $abmUsuario->abm($datosUsuario);
} catch (Exception $e) {
    echo "Error al actualizar el usuario";
}

?>

<a href='./index.php'><button>Volver al index</button></a>
<a href="../listarUsuario.php"><button>Volver al listar</button></a>
