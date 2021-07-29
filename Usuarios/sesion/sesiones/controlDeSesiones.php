<?php

require '../../../AdministracionPHP/conexion.php';

session_start();

$nombreUsuario = $_POST['nombreDeIngreso'];
$claveUsuario = $_POST['claveDeIngreso'];

$_SESSION['nombreId'] = $nombreUsuario;
$_SESSION['claveId'] = $claveUsuario;

if ($_SESSION['nombreId'] === null || $_SESSION['nombreId'] === ' ' || empty($_SESSION['nombreId'])) {
    echo '
        <script>
            alert("Usted no tiene acceso a esta sesión");
            location.href="../../../index.php";
        </script>
        ', 'Nombre:',$nombreUsuario, '<br/>Clavae:',$claveUsuario;
    die();
}else{
    echo '
    <script>
        location.href="../paginaPrincipal.php";
    </script>
    ';
}
?>