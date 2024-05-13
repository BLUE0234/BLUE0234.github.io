<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["fecha"]) and !empty($_POST["total"])) {
        $id=$_POST["id"];
        $fecha=$_POST["fecha"];
        $total=$_POST["total"];
        $sql=$Conexion->query(" update Ventas set fecha='$fecha', total='$total' where id_venta=$id ");
        if ($sql==1) {
            header("location:Menu.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Venta</div>";
        }
        
    }else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}

?>