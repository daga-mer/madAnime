<?php

$conexion = new mysqli('localhost', 'root', '','madanime');

if (!$conexion) {
    echo '<script>
    alert("la conexion ha sido fallida");
    </script>';
}

?>