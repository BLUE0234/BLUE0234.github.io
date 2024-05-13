<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["id_proveedor"]) and !empty($_POST["id_producto"]) and !empty($_POST["cantidad"]) and !empty($_POST["fecha_compra"])) {

    $id_proveedor=$_POST["id_proveedor"];
    $id_producto=$_POST["id_producto"];
    $cantidad=$_POST["cantidad"];
    $fecha_compra=$_POST["fecha_compra"];

    $sql=$Conexion->query(" insert into Compra(id_proveedor,id_producto,cantidad,fecha_compra)values($id_proveedor,$id_producto,$cantidad,'$fecha_compra') ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Compra Registrada Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrada Persona</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 