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
$resultado = $conexion->query("SELECT * FROM Usuarios WHERE ID = $usuario_id");
$usuario = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-container">
        <h2>Bienvenido, <?php echo $usuario['Nombre']; ?>!</h2>
        <div class="menu">
            <a href="pase_alimentos.php">Pase de Alimentos</a>
            <a href="canto_tema.php">Canto Tema</a>
            <a href="directivos.php">Directivos</a>
            <a href="flyer.php">Flyer</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
