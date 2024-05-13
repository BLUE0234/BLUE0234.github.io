<?php
if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) || empty($_POST["direccion"]) || empty($_POST["telefono"]) || empty($_POST["correo_electronico"])) {
        echo '<div class="alerta">Campo vacío</div>';
    } else {
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $correo_electronico = $_POST["correo_electronico"];
        
        // Verificar si el correo electrónico o el teléfono ya existen en la base de datos
        $consulta = $Conexion->query("SELECT * FROM Cliente2 WHERE correo_electronico = '$correo_electronico' OR telefono = '$telefono'");
        if ($consulta->num_rows > 0) {
            echo '<div class="alerta">Error al insertar, ya existen estos datos</div>';
        } else {
            $sql = $Conexion->query("INSERT INTO Cliente2 (nombre, direccion, telefono, correo_electronico) VALUES ('$nombre', '$direccion', '$telefono', '$correo_electronico')");
            if ($sql == 1) {
                echo '<div class="success">Usuario registrado correctamente</div>';
            } else {
                echo '<div class="alerta">Error al registrar</div>';
            }
        }
    }
}
?>