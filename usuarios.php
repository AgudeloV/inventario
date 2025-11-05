<?php
require 'config.php';
if (!es_admin()) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $conexion->query("INSERT INTO usuarios (cedula, nombre, password) VALUES ('$cedula', '$nombre', '$password')");
}
$resultado = $conexion->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Usuarios</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <h1>Gestión de Usuarios</h1>
  <form method="POST">
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="password" placeholder="Contraseña" required>
    <button type="submit">Agregar</button>
  </form>
  <table>
    <tr><th>Cédula</th><th>Nombre</th><th>Contraseña</th></tr>
    <?php while($fila = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $fila['cedula'] ?></td>
      <td><?= $fila['nombre'] ?></td>
      <td><?= $fila['password'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <a href="dashboard.php" class="btn">Volver</a>
</div>
</body>
</html>
