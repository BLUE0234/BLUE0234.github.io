<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["id_cliente"]) and !empty($_POST["nombre_usuario"]) and !empty($_POST["contraseña"])) {
        $id=$_POST["id"];
        $id_cliente=$_POST["id_cliente"];
        $nombre_usuario=$_POST["nombre_usuario"];
        $contraseña=$_POST["contraseña"];
        $sql=$Conexion->query(" update Usuario_Cliente set id_cliente=$id_cliente, nombre_usuario='$nombre_usuario', contraseña='$contraseña' where id_usuario=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Usuario</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>