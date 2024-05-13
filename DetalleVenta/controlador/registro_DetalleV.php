<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["id_venta"]) and !empty($_POST["id_producto"]) and !empty($_POST["id_empleado"]) and !empty($_POST["id_cliente"]) and !empty($_POST["cantidad"])) {

    $id_venta=$_POST["id_venta"];
    $id_producto=$_POST["id_producto"];
    $id_empleado=$_POST["id_empleado"];
    $id_cliente=$_POST["id_cliente"];
    $cantidad=$_POST["cantidad"];

    $sql=$Conexion->query(" insert into Detalle_Venta(id_venta,id_producto,id_empleado,id_cliente,cantidad)values($id_venta,$id_producto,$id_empleado,$id_cliente,$cantidad) ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Detalle Registrado Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrar Detalles</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 