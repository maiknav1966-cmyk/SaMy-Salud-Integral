<?php
// Archivo de conexión central
$server = "localhost";
$user = "root";
$password = "";
$database = "hospital_bd"; // Nombre de la base de datos. Cámbialo si usas otro.

$conexion = new mysqli($server, $user, $password, $database);

if ($conexion->connect_error) {
    // Mensaje claro para desarrollo; en producción registrar en log
    die("❌ Conexión fallida a la base de datos: " . $conexion->connect_error);
}

// Ahora `$conexion` está disponible para los archivos que incluyan este fichero
?>