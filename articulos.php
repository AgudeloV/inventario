<?php
require 'config.php';
if (!isset($_SESSION['cedula'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == "eliminar") {
        $id = $_POST['id'];
        $conexion->query("DELETE FROM articulos WHERE id=$id");
    } else {
        $nombre = $_POST['nombre'];
        $unidades = $_POST['unidades'];
        $tipo = $_POST['tipo'];
        $bodega = $_POST['bodega'];
        $usuario = $_SESSION['cedula'];
        $conexion->query("INSERT INTO articulos (nombre, unidades, tipo, bodega, usuario_mod) VALUES ('$nombre', $unidades, '$tipo', '$bodega', '$usuario')");
    }
}
$resultado = $conexion->query("SELECT * FROM articulos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Artículos</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <h1>Gestión de Artículos</h1>
  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="number" name="unidades" placeholder="Unidades" required>
    <select name="tipo">
      <option>PC</option>
      <option>teclado</option>
      <option>disco duro</option>
      <option>mouse</option>
    </select>
    <select name="bodega">
      <option>norte</option>
      <option>sur</option>
      <option>oriente</option>
      <option>occidente</option>
    </select>
    <button type="submit">Agregar</button>
  </form>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Unidades</th><th>Tipo</th><th>Bodega</th><th>Usuario</th><th>Acción</th></tr>
    <?php while($fila = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $fila['id'] ?></td>
      <td><?= $fila['nombre'] ?></td>
      <td><?= $fila['unidades'] ?></td>
      <td><?= $fila['tipo'] ?></td>
      <td><?= $fila['bodega'] ?></td>
      <td><?= $fila['usuario_mod'] ?></td>
      <td>
        <form method="POST" style="display:inline;">
          <input type="hidden" name="id" value="<?= $fila['id'] ?>">
          <input type="hidden" name="accion" value="eliminar">
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
  <a href="dashboard.php" class="btn">Volver</a>
</div>
</body>
</html>
