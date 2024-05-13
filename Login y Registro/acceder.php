<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost","root","naomi1927","ferreteria4");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contraseña = $_POST["contraseña"];

    // Consultar la tabla Usuario_Cliente
    $query_cliente = "SELECT * FROM Usuario_Cliente WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
    $result_cliente = mysqli_query($conexion, $query_cliente);
    $count_cliente = mysqli_num_rows($result_cliente);

    // Consultar la tabla Usuario_Empleado
    $query_empleado = "SELECT * FROM Usuario_Empleado WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
    $result_empleado = mysqli_query($conexion, $query_empleado);
    $count_empleado = mysqli_num_rows($result_empleado);

    // Verificar si el usuario es cliente
    if ($count_cliente == 1) {
        // Redireccionar a la página para clientes
        header("Location: ../FerreBlue/index.html");
    } elseif ($count_empleado == 1) {
        // Redireccionar a la página para empleados
        header("Location: ../FerreBlueEmpleado/index.html");
    } else {
        // Si el usuario no se encuentra en ninguna tabla, mostrar un mensaje de error
        echo "Usuario o contraseña incorrectos";
    }
}
?>