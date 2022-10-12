<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'modelo/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where id = ?;");
    $sentencia->execute([$codigo]);
    $promociones = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($promociones);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Producto: </label>
                        <input type="text" class="form-control" name="txtProducto" required 
                        value="<?php echo $promociones->producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $promociones->precio; ?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $promociones->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>