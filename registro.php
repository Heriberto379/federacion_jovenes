<?php
$conexion = new mysqli("localhost", "root", "", "federacion_jovenes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $rol = $_POST['rol'];

    $conexion->query("INSERT INTO Usuarios (Nombre, Correo, Contraseña, Rol) VALUES ('$nombre', '$correo', '$contraseña', '$rol')");
    echo "Usuario registrado exitosamente.";
}
?>
