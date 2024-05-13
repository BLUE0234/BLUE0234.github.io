<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["id_proveedor"]) and !empty($_POST["id_producto"]) and !empty($_POST["cantidad"]) and !empty($_POST["fecha_compra"])) {
        $id=$_POST["id"];
        $id_proveedor=$_POST["id_proveedor"];
        $id_producto=$_POST["id_producto"];
        $cantidad=$_POST["cantidad"];
        $fecha_compra=$_POST["fecha_compra"];
        $sql=$Conexion->query(" update Compra set id_proveedor=$id_proveedor, id_producto=$id_producto, cantidad=$cantidad, fecha_compra='$fecha_compra' where id_compra=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Compra</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>