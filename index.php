<!DOCTYPE html>
<?php
require './AdministracionPHP/conexion.php'
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Cut&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-image: url('./Fondos/FondosIngreso.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: '#66999';
            background-size: cover;

            font-family: 'Nova Cut', cursive;
            text-align: center;
        }

        input {
            margin: 1%;
            border: 0px #000 solid;
            border-radius: 10px;
            width: 31%;
            height: 25px;
        }

        a {
            text-decoration: none;
            margin: 1%;
        }

        form {
            backdrop-filter: blur(4px);
            margin: 10% 25% 0% 25%;
            color: #000;
            padding: 1% 2% 0% 2%;
        }
    </style>

    <script>
        function mostrarContrasena() {
            var tipo = document.getElementById("claveDeIngreso");
            var Mclave = document.getElementById("Mclave");

            if (tipo.type == "password") {
                tipo.type = "text";
                Mclave.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16"><path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/><path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/></svg>';
            } else {
                tipo.type = "password";
                Mclave.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" /><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" /></svg>';
            }
        }
    </script>

    <title>Inicio de sesión</title>
</head>

<body>
    <div>
        <form action="./Usuarios/sesion/sesiones/controlDeSesiones.php" method="POST">
            <h1>Bienvenido aventurero a la gran biblioteca MadAnime</h1>
            <p>
                La biblioteca indicada para administrar tu lista de animes como un
                personaje de rpg administra sus puntos de habilidad.
            </p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombreDeIngreso" id="nombreDeIngreso" placeholder="Ej:Daniel" required>
                <label for="nombreDeIngreso">Ingrese su nombre de usuario</label>
            </div>

            <div class="input-group mb-3">
                <input style="height: 60px;" type="password" class="form-control" name="claveDeIngreso" id="claveDeIngreso" placeholder="Ingrese su clave" required aria-describedby="button-addon">
                <button class="btn btn-primary" type="button" id="button-addon" onclick="mostrarContrasena()">
                    <div id="Mclave">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                </button>
            </div>
            <div style="margin: 3%;">
                <a class="link-info" href="./Usuarios/creacion/formularioCrearUsuario.php">Unirse</a>
                <button class="btn btn-primary" type="submit">Link Start</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>