<?php

require "conexion_biblioteca.php";
$codi_libro = $_POST['codigo'];

$elimi = $mysqli->query("DELETE FROM libro WHERE codi_libro=$codi_libro");

if (!$elimi) {
    echo "Error" . $mysqli->error . $mysqli->errno;
} else {
    echo '<script>alert("Se eliminó correctamente");
                window.location="admin.php"</script>';
}