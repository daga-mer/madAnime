<?php
require '../../../AdministracionPHP/conexion.php';
session_start();

$nombreDeUsuario = $_SESSION['nombreId'];
$NameList = $_POST['NameList'];

$icono=($_FILES['File']!="")?$nombreDeUsuario.$_FILES['File']['name']:"descarga.png";

$tmpf=$_FILES['File']['tmp_name'];

if ($tmpf!="") {
    move_uploaded_file($tmpf,"../iconos/".$icono);
}

if ($_SESSION['nombreId'] === null || $_SESSION['nombreId'] === ' ' || empty($_SESSION['nombreId'])) {
    echo '
        <script>
            alert("Usted no tiene acceso a esta sesión");
            history.back();
        </script>
        ';
    die();
}

$addAnime = $conexion->query("INSERT INTO listausuarios (id,NombreUsuario,NombreLista,icono) VALUES('','$nombreDeUsuario','$NameList','$icono')");

header('Location:../ListasAnimes.php');

?>