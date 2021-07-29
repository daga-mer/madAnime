<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Cut&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nova Cut', cursive;
        }
    </style>

    <title>datos</title>
</head>

<body>
    <form action="./editAnimes/agregarListas.php" method="POST">
        <?php
        require '../../AdministracionPHP/conexion.php';

        session_start();

        $nombreUsuario = $_SESSION['nombreId'];

        $lista = $conexion->query("SELECT * FROM listausuarios WHERE nombreUsuario='$nombreUsuario'");

        $serieT = $_GET["titulo"];
        $serieS = $_GET["sinopsis"];
        $serieI = $_GET["img"];

        while ($Lanime = $lista->fetch_assoc()) {
            echo '
                <input type="hidden" name="titulo" id="titulo" value="', $serieT, '">
                <input type="hidden" name="sinopsis" id="sinopsis" value="', $serieS, '">
                <input type="hidden" name="imagen" id="imagen" value="', $serieI, '">
                <div class="form-check">
                    <input value="', $Lanime['NombreLista'], '" class="form-check-input" type="checkbox" name="anime" id="', $Lanime['id'], '">
                    <label class="form-check-label" for="', $Lanime['id'], '">
                        ', $Lanime['NombreLista'], '
                    </label>
                </div>
                <br/>
                ';
        }
        ?>
        <!-- TODO debo parchar errores con cosas que no se optienen eje imgs y resetear el modal -->
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Añadir
        </button>
    </form>
</body>

</html>