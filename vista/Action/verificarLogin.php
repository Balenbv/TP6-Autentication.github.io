<?php

include '../../config.php';

$datos = data_submitted();

verEstructura($datos);

echo "<a href='../login.php'><button>Registrar Usuario</button></a>";
echo "<a href='../index.php'><button>Volver Al index</button></a>";
