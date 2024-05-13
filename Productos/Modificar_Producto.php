<?php 
include "modelo/Conexion.php";
$id=$_GET["id"];

$sql=$Conexion->query(" select * from Productos where id_producto=$id ")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<form class="col-4 p-3 m-auto" method="POST">
    <h3 class="text-center alert alert-secondary">Modificar Producto</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php 
    include "controlador/Modificar_Producto.php";
    while ($datos=$sql->fetch_object()) {?>

<div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Nombre Empleado</label>
    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Precio</label>
    <input type="text" class="form-control" name="precio" value="<?= $datos->precio ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Stock</label>
    <input type="text" class="form-control" name="stock" value="<?= $datos->stock ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Id Categoria</label>
    <input type="text" class="form-control" name="id_categoria" value="<?= $datos->id_categoria ?>">
  </div>

    <?php }
    ?>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>


</body>
</html>