<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$Conexion->query(" delete from Detalle_Venta where id_detalle=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Detalles Eliminados Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al Eliminar</div>';
    }
}

?>