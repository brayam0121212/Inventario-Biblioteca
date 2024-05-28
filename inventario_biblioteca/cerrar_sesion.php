<?php
session_start();
if (isset($_POST['cerrar_sesion'])) {
    echo '<script>window.location="inicio_sesion.php"</script>';
    session_destroy();
} else {
    echo '<script>alert("NO HAY SESIÓN ACTIVA)</script>';
}