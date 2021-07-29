<?php
require '../../../AdministracionPHP/conexion.php';

session_start();

$nombreDeUsuario = $_SESSION['nombreId'];
$nombreDeAnime = $_GET['nombreAnime'];
$Descripcion = $_GET['animeDescrip'];
$imgUrl = $_GET['animeImg'];

if ($_SESSION['nombreId'] === null || $_SESSION['nombreId'] === ' ' || empty($_SESSION['nombreId'])) {
    echo '
        <script>
            alert("Usted no tiene acceso a esta sesión");
            history.back();
        </script>
        ';
    die();
}

$ancho = strlen($nombreDeAnime)-1;

if ($nombreDeAnime[$ancho]===".") {
    
    $nombreDeAnimeC = substr($nombreDeAnime,0, - 1);
    
}

$actualizar = $conexion->query("INSERT INTO listanimes (id,NombreUsuario,NombreAnime,Descripcion,imagen) VALUES('','$nombreDeUsuario','$nombreDeAnime','$Descripcion','$imgUrl')");

header('Location:../Buscador.php');

?>
