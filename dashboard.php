<?php
require 'config.php';
if (!isset($_SESSION['cedula'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="dashboard-container">
  <h1>Bienvenido al Inventario</h1>
  <?php if(es_admin()): ?>
  <div class="btn-container">
    <a href="usuarios.php" class="btn">Gestión de Usuarios</a>
    <a href="articulos.php" class="btn">Gestión de Artículos</a>
  </div>
  <?php else: ?>
  <div class="btn-container">
    <a href="articulos.php" class="btn">Gestión de Artículos</a>
  </div>
  <?php endif; ?>
  <a href="logout.php" class="logout">Cerrar sesión</a>
</div>
</body>
</html>
