<?php

require '../../../AdministracionPHP/conexion.php';

session_start();

$nombreDeUsuario = $_SESSION['nombreId'];
$idAnime = $_GET['idAnime'];


if ($_SESSION['nombreId'] === null || $_SESSION['nombreId'] === ' ' || empty($_SESSION['nombreId'])) {
    echo '
        <script>
            alert("Usted no tiene acceso a esta sesión");
            history.back();
        </script>
        ';
    die();
}

$eliminar = $conexion->query("DELETE FROM listanimes WHERE id='$idAnime'");

header('Location:../ListasAnimes.php');
?>