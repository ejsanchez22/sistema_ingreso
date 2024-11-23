<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: formulario/index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="autenticacion/cerrar_sesion.php">Salir</a>
</body>
</html>
