<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["id_venta"]) and !empty($_POST["id_producto"]) and !empty($_POST["id_empleado"]) and !empty($_POST["id_cliente"]) and !empty($_POST["cantidad"])) {
        $id=$_POST["id"];
        $id_venta=$_POST["id_venta"];
        $id_producto=$_POST["id_producto"];
        $id_empleado=$_POST["id_empleado"];
        $id_cliente=$_POST["id_cliente"];
        $cantidad=$_POST["cantidad"];    
        $sql=$Conexion->query(" update Detalle_Venta set id_venta=$id_venta, id_producto=$id_producto, id_empleado=$id_empleado, id_cliente=$id_cliente, cantidad=$cantidad where id_detalle=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Detalle</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>