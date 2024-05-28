<?php
session_start();
if (isset($_SESSION['usuario_sesion'])) {
} else {
    echo "<script>
    alert
    ('NO HAS INICIADO SESIÓN');
    window.location='inicio_sesion.php'</script>";
}