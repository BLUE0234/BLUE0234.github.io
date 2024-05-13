<?php 
include "modelo/Conexion.php";
$id=$_GET["id"];

$sql=$Conexion->query(" select * from Usuario_Empleado where id_usuario=$id ")

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
    <h3 class="text-center alert alert-secondary">Modificar Empleado</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php 
    include "controlador/Modificar_UsuarioE.php";
    while ($datos=$sql->fetch_object()) {?>

        <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">ID Empleado</label>
    <input type="number" class="form-control" name="id_empleado" value="<?= $datos->id_empleado ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Nombre Usuario</label>
    <input type="text" class="form-control" name="nombre_usuario" value="<?= $datos->nombre_usuario ?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
    <input type="text" class="form-control" name="contraseña" value="<?= $datos->contraseña ?>">
  </div>

    <?php }
    ?>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>


</body>
</html>