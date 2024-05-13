<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"])) {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $sql=$Conexion->query(" update Categoria set nombre='$nombre' where id_categoria=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Categoria</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>