<?php
$host = 'localhost';
$usuario = 'root';
$contrasenia = '';
$base_datos = 'bd_usuarios';

$conn = new mysqli($host, $usuario, $contrasenia, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
