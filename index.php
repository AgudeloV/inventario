<?php
require 'config.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuarios WHERE cedula='$cedula' AND password='$password'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $_SESSION['cedula'] = $cedula;
        header("Location: dashboard.php");
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Inventario</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-container">
  <h1>Inventario</h1>
  <form method="POST">
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
    <?php if($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
  </form>
</div>
</body>
</html>
