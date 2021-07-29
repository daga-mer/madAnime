<?php
require '../../AdministracionPHP/conexion.php';

$nombreDeUsuario = $_POST['NombreDeRegistro'];
$correoDeUsuario = $_POST['correoDeRegistro'];

$claveDeUsuario = $_POST['claveDeRegistro'];
$claveConfirmadaDeUsuario = $_POST['claveConfirmadaDeRegistro'];


if ($claveDeUsuario === $claveConfirmadaDeUsuario) {

    $actualizar = $conexion->query("INSERT INTO usuarios (id,Nombre,Correo,Clave,TipoDeUsuario) VALUES('','$nombreDeUsuario','$correoDeUsuario','$claveDeUsuario','0')");
    
    if ($actualizar) {
        echo '<script>
        alert("Su usuario ha sido registrado con exito");
        location.href="../../index.php";
        </script>';
    }else{
        /* echo "'$nombreDeUsuario'<br/>'$correoDeUsuario','$claveDeUsuario','$claveConfirmadaDeUsuario'"; */
        echo '<script>
        alert("Su usuario no ha sido registrado con exito, recargue la página y vuelva a intentar");
        history.go(-1);
        </script>';
    }    
}else{
    /* echo "'$nombreDeUsuario'<br/>'$correoDeUsuario','$claveDeUsuario','$claveConfirmadaDeUsuario'"; */
    echo '<script>
    alert("Su usuario no ha sido registrado con exito, confirme los datos que ingreso sean correctos");
    history.go(-1);
    </script>';
}

?>