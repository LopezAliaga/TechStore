<?php
$host = "localhost";
$usuario = "tech_user";
$password = "123456";
$base_datos = "techstore_db";

// Creamos la conexión al servidor de base de datos
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificamos si el guardia nos deja pasar o si hay algún error
if ($conn->connect_error) {
    die("Error fatal, no se pudo conectar a la base de datos: " . $conn->connect_error);
}

// Mensaje de prueba (lo borraremos después)

?>