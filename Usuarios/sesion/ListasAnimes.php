<!DOCTYPE html>
<?php

require '../../AdministracionPHP/conexion.php';

session_start();

$nombreUsuario = $_SESSION['nombreId'];
$claveUsuario = $_SESSION['claveId'];

$consulta = mysqli_query($conexion, "SELECT COUNT(*) AS contar FROM usuarios WHERE Nombre='$nombreUsuario' AND Clave='$claveUsuario'");
$datos = mysqli_fetch_array($consulta);

if ($datos['contar'] <= 0) {
    echo "
    <script> 
        alert('Los datos que ha ingresado son incorrectos, por favor confirmelos');
        location.href='../../index.php';
    </script>;";
    die();
}
if ($_SESSION['nombreId'] === null || $_SESSION['nombreId'] === ' ' || empty($_SESSION['nombreId'])) {
    echo '
        <script>
            alert("Usted no tiene acceso a esta sesión");
            location.href="../../index.php";
        </script>
        ';
    die();
}
?>
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

    <title>Tus animes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./paginaPrincipal.php">MadAnime</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./paginaPrincipal.php">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./ListasAnimes.php">
                            Tus listas de animes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Buscador.php">Buscador</a>
                    </li>
                </ul>
                <span style="margin-left: 50%;" class="navbar-text">
                    <a class="link-info" href="./sesiones/cerrarSesion.php">Cerrar sesión</a>
                </span>
            </div>
        </div>
    </nav>

    <h1 style="text-align: center;">Listado de animes</h1>

    <div style="margin: 1%; background-color: #212529; padding: 1%; border: 1px #6f6f6f solid; border-radius: 10px;">
        <div class="card-group">
            <?php

            $listadoAnimes = mysqli_query($conexion, "SELECT COUNT(*) as animes FROM listanimes WHERE NombreUsuario='$nombreUsuario'");

            (empty($_GET['pagina'])) ? $pagina = 1 : $pagina = $_GET['pagina'];

            $limite = 3;
            $tot = mysqli_fetch_array($listadoAnimes);
            $total = $tot['animes'];
            $desde = ($pagina - 1) * $limite;
            $totalpag = ceil($total / $limite);

            if ($tot['animes'] <= 0) {
                echo "<h3 style='text-align:center; color:#fff; margin: 0% 25%; margin: 1%; background-color: #212529; padding: 1%; border: 1px #6f6f6f solid; border-radius: 10px;'>
                        No has agregado ningún anime. <br/>
                        
                        Ve al <a href='./Buscador.php'>Buscador</a> 
                        
                        seguramente alli puedas encontrar algo para agregar.<br/><br/>
                        O tambien puedes <br/>

                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                            crear tus propias listas
                        </button>
                </h3>";
            } else {

                $seleccionado = $conexion->query("SELECT * FROM listanimes WHERE NombreUsuario='$nombreUsuario' LIMIT $desde,$limite");
                
                while ($anime = $seleccionado->fetch_assoc()) {
                    /* $lista = $anime['NombreLista'];
                    $i = $conexion->query("SELECT NombreLista FROM listanimes GROUP BY NombreLista HAVING COUNT(*)>1");
                    
                    if ($anime['NombreLista'] == $lista) {
                        
                        foreach ($i as $value) {
                            $var = implode(",", $value);
                            echo '<h1 style="color:#fff">',$anime['NombreLista'],$var,'</h1>';
                        }
                        
                    } 
                    
                    TODO planear como hacer division de listados y poner cada anime segun corresponda
                    */

                    echo '                        
                    <h1 style="color:#fff;">', $anime['NombreLista'], '</h1>
                            <div style="max-width: 45%; align-items: center; margin: 1%; border: #0003 solid 1px;" id=', $anime['id'], ' class="card">
                            
                                <a href="./editAnimes/eliminarAnimes.php?idAnime=', $anime['id'], '" style="align-self: flex-end;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                </a>
                            
                                <img style="width: 50%;" src=', $anime['imagen'], ' class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">', $anime['NombreAnime'], '</h5>
                                    <p class="card-text">
                                        ', $anime['Descripcion'], '
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <a href="https://www3.animeflv.net/browse?q=', $anime['NombreAnime'], '" target="_blank">Buscarlo en AnimeFLV</a><br/>
                                            <a href="https://www.animefenix.com/animes?q=', $anime['NombreAnime'], '" target="_blank">Buscarlo en animefenix</a>                                
                                        </small>
                                    </p>
                                </div>
                            </div>
                    ';
                }
            ?>
        </div>
        <nav aria-label="Page navigation example">
            <ul style="justify-content: center;" class="pagination">
                <?php
                if ($pagina != 1) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php
                }
                for ($i = 1; $i <= $totalpag; $i++) {
                    if ($i == $pagina) {
                        echo '<li class="page-item active">
                    <div class="page-link">' . $i . '</div>
                    </li>';
                    } else {
                        echo '<li class="page-item">
                    <a class="page-link" href="?pagina=' . $i . '">' . $i . '</a>
                    </li>';
                    }
                }
                ?>
                <?php
                if ($pagina != $totalpag) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    <?php
            }
    ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crea tus listas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Dale un orden a tus series</h6>
                    <form action="./editAnimes/crearListas.php" enctype="multipart/form-data" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="NameList" name="NameList" placeholder="name" required>
                            <label for="NameList">Nombre de la lista</label>
                        </div>
                        <div>
                            <label for="File">Agregale un icono a tu lista (unicamente svg)</label>
                            <input accept="image/svg+xml" type="file" class="form-control" id="File" name="File" required>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary">Crear lista</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>