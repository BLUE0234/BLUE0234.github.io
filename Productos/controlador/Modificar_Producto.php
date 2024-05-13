<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["descripcion"]) and !empty($_POST["precio"]) and !empty($_POST["stock"]) and !empty($_POST["id_categoria"])) {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $stock=$_POST["stock"];
        $id_categoria=$_POST["id_categoria"];
        $sql=$Conexion->query(" update Productos set nombre='$nombre', descripcion='$descripcion', precio=$precio, stock=$stock, id_categoria=$id_categoria where id_producto=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Producto</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>