<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/popper.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body class="bg-success">
    <?php
    require "conexion_biblioteca.php";
    ?>
    <div class="card mx-auto my-5 float-center text-center col-lg-6 col-md-6 col-sm-6">
        <div class="card-header mx-n3 mt-n1 bg-dark">
            <h4 class="text-white">INGRESAR A BIBLIOTECA SAN LORENZO</h4>
        </div>
        <div class="card-body px-5">
            <h2 class="h4 m-3">INICIO SESIÓN</h2>
            <form action="ingresar.php" method="post">
                <div class="form-group my-5">
                    <label class="h6" for="exampleInputEmail1"><strong>Usuario</strong></label>
                    <input type="text" class="form-control" name="usuario" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Escribe tu usuario" required>
                </div>
                <div class="form-group my-5">
                    <label class="h6" for="exampleInputPassword1"><strong>Contraseña</strong></label>
                    <input type="password" class="form-control" name="contrasena" id="exampleInputPassword1"
                        placeholder="contraseña***" required>
                </div>
                <button class="btn btn-dark text-white border-0 p-2" type="submit">INGRESAR</button>
            </form>
        </div>
        <div class="card-footer">
            <img class="float-left mr-n5 img-fluid" width="80rem" src="img/Escudo.png" alt="">
            <p>Institución Educativa San Lorenzo<br>Suaza-Huila </br> <p>copyrigth 2023</p>
        </div>
    </div>
</body>

</html>