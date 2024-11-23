<?php
session_start();
require '../configuracion/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $sql = "SELECT id_usuarios, contrasenia_usuarios FROM usuarios WHERE nombre_usuarios = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario_data = $resultado->fetch_assoc();

    if ($usuario_data && password_verify($contrasenia, $usuario_data['contrasenia_usuarios'])) {
        $_SESSION['id_usuario'] = $usuario_data['id_usuarios'];
        header("Location: ../panel.php");
    } else {
        echo "Usuario o contraseña incorrectos. <a href='../formulario/index.html'>Volver</a>";
    }
}
?>
