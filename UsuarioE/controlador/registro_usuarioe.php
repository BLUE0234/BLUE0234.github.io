<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["id_empleado"]) and !empty($_POST["nombre_usuario"]) and !empty($_POST["contraseña"])) {

    $id_empleado=$_POST["id_empleado"];
    $nombre_usuario=$_POST["nombre_usuario"];
    $contraseña=$_POST["contraseña"];

    $sql=$Conexion->query(" insert into Usuario_Empleado(id_empleado,nombre_usuario,contraseña)values($id_empleado,'$nombre_usuario','$contraseña') ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Persona Registrada Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrada Persona</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 