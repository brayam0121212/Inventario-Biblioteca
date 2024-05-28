<?php

session_start();
require "conexion_biblioteca.php";

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$cons = $mysqli->query("SELECT * FROM sesion WHERE usuario_sesion='$usuario'");

if ($datos = $cons->fetch_array(MYSQLI_ASSOC)) {
    if ($contrasena == $datos['contrasena_sesion']) {
        $_SESSION['usuario_sesion'] = $datos['usuario_sesion'];
        $_SESSION['contrasena_sesion'] = $datos['contrasena_sesion'];

        echo "<script>window.location='admin.php'</script>";
    } else {
        echo "<script>alert('CONTRASEÑA INCORRECTA');
        window.location='inicio_sesion.php'</script>";
    }
} else {
    echo "<script>alert('EL USUARIO INGRESADO NO EXISTE');
    window.location='inicio_sesion.php'</script>";
}