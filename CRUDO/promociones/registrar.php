<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtProducto"]) || empty($_POST["txtPrecio"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'modelo/conexion.php';
$producto = $_POST["txtProducto"];
$precio = $_POST["txtPrecio"];


$sentencia = $bd->prepare("INSERT INTO promociones(producto,precio) VALUES (?,?);");
$resultado = $sentencia->execute([$clave, $producto]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}