<?php

require '../../../AdministracionPHP/conexion.php';

session_start();

$nombreUsuario = $_SESSION['nombreId'];
$nombreLista = $_POST['anime'];
$titulo = $_POST['titulo'];
$sinopsis = $_POST['sinopsis'];
$imagen = $_POST['imagen'];


$addList = $conexion->query("INSERT INTO listanimes (id, NombreUsuario, NombreAnime, Descripcion, imagen, NombreLista) VALUES ('','$nombreUsuario','$titulo','$sinopsis','$imagen','$nombreLista')");
echo '
    <div class="alert alert-success" role="alert">
        Felicidades has agragado correctamente el anime a ',$nombreLista,'
    </div>
';

?>