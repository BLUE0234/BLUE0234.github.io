<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["nombre"])) {

    $nombre=$_POST["nombre"];

    $sql=$Conexion->query(" insert into Categoria(nombre)values('$nombre') ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Categoria Registrada Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrada Categoria</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 