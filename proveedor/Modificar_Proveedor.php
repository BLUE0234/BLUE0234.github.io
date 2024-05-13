<?php 
include "modelo/Conexion.php";
$id=$_GET["id"];

$sql=$Conexion->query(" select * from proveedores where id_proveedor=$id ")

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
    <h3 class="text-center alert alert-secondary">Modificar Proveedor</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php 
    include "controlador/Modificar_Proveedor.php";
    while ($datos=$sql->fetch_object()) {?>

        <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Nombre Proveedor</label>
    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
    <input type="text" class="form-control" name="correo_electronico" value="<?= $datos->correo_electronico ?>">
  </div>

    <?php }
    ?>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>


</body>
</html>