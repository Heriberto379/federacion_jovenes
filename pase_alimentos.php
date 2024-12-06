<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "federacion_jovenes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];
$fecha = date("Y-m-d");

$resultado = $conexion->query("SELECT * FROM Alimentos WHERE UsuarioID = $usuario_id AND Fecha = '$fecha'");
$paso = $resultado->num_rows > 0;

if (!$paso) {
    $conexion->query("INSERT INTO Alimentos (UsuarioID, Fecha, Estado) VALUES ($usuario_id, '$fecha', 'Sí')");
    echo "Pase de alimentos registrado correctamente.";
} else {
    echo "Ya has pasado por los alimentos hoy.";
}
?>
