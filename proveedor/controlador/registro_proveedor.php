<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["nombre"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"]) and !empty($_POST["correo_electronico"])) {

    $nombre=$_POST["nombre"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $correo_electronico=$_POST["correo_electronico"];

    $sql=$Conexion->query(" insert into Proveedores(nombre,direccion,telefono,correo_electronico)values('$nombre','$direccion','$telefono','$correo_electronico') ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Proveedor Registrado Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrar Proveedor</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 
