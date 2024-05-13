<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$Conexion->query(" delete from Compra where id_compra=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Compra Eliminada Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al Eliminar</div>';
    }
}

?>