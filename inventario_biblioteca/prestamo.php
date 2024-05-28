<?php

require "conexion_biblioteca.php";

$titulo = $_POST['titulo_libro'];
$id_encargado = $_POST['dni_usua'];
$nom_encargado = $_POST['nombre_usua'];
$fecha_prestamo = $_POST['fecha_pres'];

$consul = $mysqli->query("SELECT codi_libro FROM libro WHERE titulo_libro='$titulo'");
$codigo = $consul->fetch_array();
$codi_libro = $codigo[0];
intval($codi_libro);

$consuldeudor = $mysqli->query("SELECT id_encargado FROM prestamo WHERE id_encargado='$id_encargado'");
$array_deudor = $consuldeudor->fetch_array();
$id_deudor = $array_deudor[0];
intval($id_deudor);

$libro_pres = $mysqli->query("SELECT libro_codi FROM prestamo WHERE libro_codi='$codi_libro'");
$array_libro = $libro_pres->fetch_array();
$id_libro_pres = $array_libro[0];
intval($id_libro_pres);

if (!$consul) {
    echo "Error al obtener el código del libro" . $mysqli->error . $mysqli->errno;
} else {
    if ($codi_libro == $id_libro_pres) {
        echo '<script>alert("El libro ha sido prestado anteriormente, no se encuentra disponible");
                window.location="admin.php"</script>';
    } else {
        if ($id_encargado == $id_deudor) {
            echo '<script>alert("El usuario no ha regresado el libro prestado");
                    window.location="admin.php"</script>';
        } else {
            $cons = $mysqli->query("INSERT INTO prestamo (libro_codi,id_encargado,nombre_encargado,fecha_pres)
                            VALUES ('$codi_libro','$id_encargado','$nom_encargado','$fecha_prestamo')");
            if (!$cons) {
                echo "Error" . $mysqli->error . $mysqli->errno;
            } else {
                echo '<script>alert("El préstamo se realizó correctamente");
                    window.location="admin.php"</script>';
            }
        }
    }
}