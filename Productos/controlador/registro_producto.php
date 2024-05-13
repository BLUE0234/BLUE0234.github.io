<?php 

if(!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["nombre"]) and !empty($_POST["descripcion"]) and !empty($_POST["precio"]) and !empty($_POST["stock"]) and !empty($_POST["id_categoria"])) {

    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $precio=$_POST["precio"];
    $stock=$_POST["stock"];
    $id_categoria=$_POST["id_categoria"];

    $sql=$Conexion->query(" insert into Productos(nombre,descripcion,precio,stock,id_categoria)values('$nombre','$descripcion',$precio,$stock,$id_categoria) ");
    if ($sql==1) {
        Echo '<div class="alert alert-success">Producto Registrado Correctamente</div>';
    }else {
        Echo '<div class="alert alert-danger">Error al Registrar Producto</div>';
    }

   }else {
    Echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
   }

}

?> 
