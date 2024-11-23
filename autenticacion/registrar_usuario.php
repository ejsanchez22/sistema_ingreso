<?php
require '../configuracion/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Verificar si el usuario ya existe
    $sql_check = "SELECT * FROM usuarios WHERE nombre_usuarios = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $usuario);
    $stmt_check->execute();
    $resultado = $stmt_check->get_result();

    if ($resultado->num_rows > 0) {
        echo "El nombre de usuario ya está en uso. <a href='../formulario/registro.html'>Intenta con otro nombre</a>.";
    } else {
        // Cifrar contraseña y registrar usuario
        $contrasenia_cifrada = password_hash($contrasenia, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios (nombre_usuarios, contrasenia_usuarios) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contrasenia_cifrada);

        if ($stmt->execute()) {
            echo "Usuario creado con éxito. <a href='../formulario/index.html'>Inicia sesión aquí</a>.";
        } else {
            echo "Error al crear el usuario. Por favor, inténtalo de nuevo.";
        }
    }
}
?>
