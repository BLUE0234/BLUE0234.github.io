<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$Conexion->query(" delete from Categoria where id_categoria=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">categoria Eliminada Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al Eliminar</div>';
    }
}

?>