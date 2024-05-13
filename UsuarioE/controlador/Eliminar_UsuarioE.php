<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$Conexion->query(" delete from Usuario_Empleado where id_usuario=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Persona Eliminada Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al Eliminar</div>';
    }
}

?>