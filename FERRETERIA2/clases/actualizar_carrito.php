<?php

require '../config/config.php';
require '../config/database.php';

if(isset($_POST['action'])) {

    $action = $_POST['action'];
    $id = isset($_POST['id_producto']) ? $_POST['id_producto'] : 0;

    function agregar($id, $cantidad) 
    {
        $res = array(
            'ok' => false,
            'sub' => 0
        );
        if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))) {
            if (isset($_SESSION['carrito']['productos'][$id])) {
                $_SESSION['carrito']['productos'][$id] = $cantidad;
                $db = new Database();
                $con = $db->conectar();
                $sql = $con->prepare("SELECT precio, nombre FROM Productos WHERE id_producto=?");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $precio = $row['precio'];
                $nombre = $row['nombre'];
                $subtotal = $cantidad * $precio;
                $res = array(
                    'ok' => true,
                    'sub' => MONEDA . number_format($subtotal, 2, '.', ',')
                );
            }
        }
        return $res;
    }
}

echo json_encode($datos);

function agregar($id, $cantidad) 
{
    $res = 0;
    if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))) {
        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT precio FROM Productos WHERE id_producto=?");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];
            $res = $cantidad * $precio;

            return $res;
        }
    } else {
        return $res;
    }
}

?>