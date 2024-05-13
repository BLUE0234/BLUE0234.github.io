<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"]) and !empty($_POST["correo_electronico"])) {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $correo_electronico=$_POST["correo_electronico"];
        $sql=$Conexion->query(" update Cliente2 set nombre='$nombre', direccion='$direccion', telefono='$telefono', correo_electronico='$correo_electronico' where id_cliente=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Cliente</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>