<!DOCTYPE html>
<html lang="es">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/popper.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
    require "conexion_biblioteca.php";
    require "comprobar.php";
    ?>


<div class="bg-dark container-fluid px-0">

        
<img class="img-responsive float-left mt-2 pl-2 "  width="150rem"  src="img/ESCUDO.png" alt="">

<form class="float-right" action="cerrar_sesion.php" method="POST">
            <input class="btn btn-info" value="Cerrar sesión" name="cerrar_sesion" type="submit">
        </form>
        <p> <br> <p>   <p>
<h1 class="text-center text-primary font-weight-bolder font size=50px" > BIBLIOTECA SAN LORENZO</h1>
</p></br></p> 
 
        <p> <br> <p>   <p> 
        <ul class="nav nav-pills pl-5 mt-4" id="pills-tab" role="tablist"> 

            <li class="nav-item" role="presentation">
                <a class="nav-link active font-weight-bold rounded-0" id="pills-home-tab" data-toggle="pill"
                    href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">INVENTARIO</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link font-weight-bold rounded-0" id="pills-profile-tab" data-toggle="pill"
                    href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">AGREGAR</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link font-weight-bold rounded-0" id="pills-contact-tab" data-toggle="pill"
            href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">PRESTAR LIBRO
                </a>
            </li>
        </ul>

</div>


    <div class="tab-content mx-3" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $consul = $mysqli->query("SELECT codi_libro, titulo_libro, autor_libro, fecha_publi FROM libro ORDER BY titulo_libro ASC");

                    if (!$consul) {
                        echo "Error" . $mysqli->error . $mysqli->errno;
                    } else {
                        while ($datos = $consul->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>";
                            echo '<td class="p-3">' . $datos['codi_libro'] . '</td>';
                            echo '<td class="p-3 d-flex">' . $datos['titulo_libro'] . '
                                    <form action="eliminar_libro.php" method="post">
                                        <input type="hidden" name="codigo" value="' . $datos['codi_libro'] . '">
                                            <button type="submit" class="btn bg-primary text-white border-0 btn-sm mx-2">
                                                Eliminar
                                            </button>
                                    </form>
                                </td>';
                            echo '<td class="p-3">' . $datos['autor_libro'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <p> <br>
   <h1>  <strong>AGREGAR LIBRO</h1> </strong> 
   <p> <br> <p> <p> <br> 

    <form action="agregar_libro.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Titulo</label>
                        <input type="text" name="titulo_libro" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Autor</label>
                        <input type="text" name="autor_libro" class="form-control" id="inputPassword4" required>
                    </div>
                </div>
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
            <p> <br>
            <h1>  <strong>Agregar estudiante o lector</h1> </strong>
            <p> <br>
            <form action="agregar_usuario.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre</label>
                        <input type="text" name="nombre_usua" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido</label>
                        <input type="text" name="apellido_usua" class="form-control" id="inputPassword4" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Número de identificación</label>
                    <input type="number" name="dni" class="form-control" id="inputAddress">
                </div>
                <button type="submit" class="btn btn-success mb-5">Guardar</button>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <p> <br>
           <h1>  <strong> PRESTAR LIBRO </h1> </strong> 
           <p> <br> <p><p> <br>
            <form action="prestamo.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo_libro">Libro a prestar</label>
                        <input class="form-control" name="titulo_libro" type="text" id="titulo_libro" required
                            list="libros-lista">
                        <datalist id="libros-lista">
                            <?php
                            require "conexion_biblioteca.php";
                            $consul = $mysqli->query('SELECT titulo_libro FROM libro');
                            while ($libro = $consul->fetch_array(MYSQLI_ASSOC)) {
                                echo '<option value="' . $libro['titulo_libro'] . '">';
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre_usua">Nombre del Estudiante</label>
                        <input class="form-control" name="nombre_usua" type="text" id="nombre_usua" required
                            list="nombres-lista">
                        <datalist id="nombres-lista">
                            <?php
                            require "conexion_biblioteca.php";
                            $consul = $mysqli->query('SELECT nom_usua FROM usua_prestamo');
                            while ($nombre = $consul->fetch_array(MYSQLI_ASSOC)) {
                                echo '<option value="' . $nombre['nom_usua'] . '">';
                            }
                            ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dni_usua">NI del Estudiante</label>
                        <input class="form-control" name="dni_usua" type="text" id="dni_usua" required list="dni-lista">
                        <datalist id="dni-lista">
                            <?php
                            require "conexion_biblioteca.php";
                            $consul = $mysqli->query('SELECT id_usua FROM usua_prestamo');
                            while ($dni = $consul->fetch_array(MYSQLI_ASSOC)) {
                                echo '<option value="' . $dni['id_usua'] . '">';
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="fecha_pres">Fecha</label>
                        <input type="date" name="fecha_pres" class="form-control" id="fecha_pres">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mx-5 mt-4">Prestar</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título libro</th>
                        <th scope="col">NI del Estudiante</th>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Fecha del préstamo</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $consul = $mysqli->query("SELECT codi_prestamo, libro.titulo_libro, id_encargado, nombre_encargado, fecha_pres FROM prestamo INNER JOIN libro ON prestamo.libro_codi=libro.codi_libro ORDER BY titulo_libro ASC");

                    if (!$consul) {
                        echo "Error" . $mysqli->error . $mysqli->errno;
                    } else {
                        while ($datos = $consul->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>";
                            echo '<td class="p-3">' . $datos['codi_prestamo'] . '</td>';
                            echo '<td class="p-3 d-flex">' . $datos['titulo_libro'] . '</td>';
                            echo '<td class="p-3">' . $datos['id_encargado'] . '</td>';
                            echo '<td class="p-3">' . $datos['nombre_encargado'] . '</td>';
                            echo '<td class="p-3">' . $datos['fecha_pres'] . '</td>';
                            echo '<td class="p-3">
                                    <form action="eliminar_prestamo.php" method="post">
                                        <input type="hidden" name="codigo" value="' . $datos['codi_prestamo'] . '">
                                        <button type="submit" class="btn bg-danger text-white border-0 btn-sm mx-2">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>

     <!--footer-->
   <footer class="footer">
  <p> <img class="img-responsive  mt-2 pl-2 "   width="80rem"  src="img/ESCUDO.png" float="left" alt=""> <br> Suaza - Huila  email:sanlorenzo.suaza@sedhuila.gov.com  
 copyright 2023 <span style="color: #00FF80;"> I.E SAN LORENZO </span> </footer>

</body>

</html>