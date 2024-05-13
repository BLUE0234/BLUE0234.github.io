<?php 
include "modelo/Conexion.php";
$id=$_GET["id"];

$sql=$Conexion->query(" select * from Ventas where id_venta=$id ")

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
    <h3 class="text-center alert alert-secondary">Modificar Venta</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php 
    include "controlador/Modificar_Venta.php";
    while ($datos=$sql->fetch_object()) {?>


   <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha ?>">
   </div>
        <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Total</label>
    <input type="number" class="form-control" name="total" value="<?= $datos->total ?>">
    </div>

    <?php }
    ?>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>


</body>
</html>