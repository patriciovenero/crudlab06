<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'modelo/conexion.php';
    $codigo = $_POST['codigo'];
    $producto = $_POST['txtProducto'];
    $precio = $_POST['txtPrecio'];
    

    $sentencia = $bd->prepare("UPDATE promociones SET producto = ?, precio = ? where id = ?;");
    $resultado = $sentencia->execute([$producto, $precio,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }