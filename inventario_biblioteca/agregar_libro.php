<?php

require "conexion_biblioteca.php";

$titulo = $_POST['titulo_libro'];
$autor = $_POST['autor_libro'];
$fecha_publi = $_POST['fecha_publi'];

$cons = $mysqli->query("INSERT INTO libro (titulo_libro,autor_libro,fecha_publi) VALUES ('$titulo','$autor','$fecha_publi')");

if (!$cons) {
    echo "Error" . $mysqli->error . $mysqli->errno;
} else {
    echo '<script>alert("Se agregó correctamente");
                window.location="admin.php"</script>';
}