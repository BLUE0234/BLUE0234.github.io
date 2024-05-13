<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$Conexion->query(" delete from Proveedores where id_proveedor=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Proveedor Eliminada Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al Eliminar</div>';
    }
}

?>