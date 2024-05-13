<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["fecha"]) and !empty($_POST["total"])) {

    $fecha=$_POST["fecha"];
    $total=$_POST["total"];

    $sql=$Conexion->query(" insert into Ventas(fecha,total)values('$fecha',$total) ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Venta Registrada Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrada Categoria</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 