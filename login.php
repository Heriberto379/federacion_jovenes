<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "federacion_jovenes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $resultado = $conexion->query("SELECT * FROM Usuarios WHERE Correo = '$correo'");
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($contraseña, $usuario['Contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['ID'];
        header("Location: index.php");
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
