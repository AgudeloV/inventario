<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("mysql-agudelov.alwaysdata.net", "agudelov", "juancho32", "agudelov_almacen");
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

function es_admin() {
    return isset($_SESSION['cedula']) && $_SESSION['cedula'] === '1111';
}
?>