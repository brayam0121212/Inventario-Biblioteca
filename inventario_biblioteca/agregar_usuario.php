<?php

require "conexion_biblioteca.php";

$nombre = $_POST['nombre_usua'];
$apellido = $_POST['apellido_usua'];
$dni = $_POST['dni'];

$cons = $mysqli->query("INSERT INTO usua_prestamo (id_usua,nom_usua,apellido_usua) VALUES ('$dni','$nombre','$apellido')");

if (!$cons) {
    echo "Error" . $mysqli->error . $mysqli->errno;
} else {
    echo '<script>alert("Se agregó correctamente");
                window.location="admin.php"</script>';
}