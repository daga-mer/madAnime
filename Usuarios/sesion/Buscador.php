<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Cut&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ControlAPI/anime.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nova Cut', cursive;
        }
    </style>

    <script>
        const recorrer = () => {
            var arrayNode = document.getElementsByName('animeAdd')
            for (let i = 0; i < arrayNode.length; i++) {
                const element = arrayNode[i];
                console.log(element.value);
            }
        }
    </script>

    <title>Buscador</title>
</head>

<body>
    <nav class="navbar navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="./ListasAnimes.php">
                            Tus listas de animes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./Buscador.php">Buscador</a>
                    </li>
                </ul>
                <span style="margin-left: 50%;" class="navbar-text">
                    <a class="link-info" href="./sesiones/cerrarSesion.php">Cerrar sesión</a>
                </span>
            </div>
        </div>
    </nav>


    <h2 style="text-align: center;">Usa el buscador para agregar tus animes deseados</h2>
    <div id="sefore">
        <div>
            <div>
                <form method="POST" id="search_form">
                    <div class="row  gx-0">
                        <div>
                            <div style="margin: 0% 1%;" class="form-floating">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Buscar animes">
                                <label for="floatingInput">Ingrese el nombre del anime</label>
                            </div>
                            <br />
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                Consultar animes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="search-results">

        </div>
    </div>

    <script src="./ControlAPI/anime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>