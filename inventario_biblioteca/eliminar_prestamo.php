<?php

require "conexion_biblioteca.php";

$codigo_pres = $_POST['codigo'];

$elimi = $mysqli->query("DELETE FROM prestamo WHERE codi_prestamo='$codigo_pres'");

if (!$elimi) {
    echo "Error" . $mysqli->error . $mysqli->errno;
} else {
    echo '<script>alert("Se eliminó correctamente");
                window.location="admin.php"</script>';
}