<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("SELECT id_producto, nombre, precio, descripcion, ? as cantidad FROM Productos WHERE id_producto=? AND stock>15");
        $sql->execute([$cantidad, $clave]);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            $id_producto = $result[0]['id_producto'] ?? 'N/A';
            $nombre = $result[0]['nombre'] ?? 'N/A';
            $precio = $result[0]['precio'] ?? 0;
            $descripcion = $result[0]['descripcion'] ?? 'N/A';

            $lista_carrito[] = [
                'id_producto' => $id_producto,
                'nombre' => $nombre,
                'precio' => $precio,
                'descripcion' => $descripcion,
                'cantidad' => $cantidad
            ];
        }
    }
}

//session_destroy();

//print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/js/Main.js">

    <style>
        body {
            background-color: #e84545;
            background-blend-mode: multiply;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .custom-card img {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>FerreBlue</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="../FerreBlue/index.html#hero">Inicio</a></li>
                    <li><a href="../FerreBlue/index.html#about">Nosotros</a></li>
                    <li><a href="../FerreBlue/index.html#services">Servicios</a></li>
                    <li><a href="../FerreBlue/index.html#portfolio">Productos</a></li>
                    <li><a href="../FerreBlue/index.html#team">Team</a></li>
                    <li><a href="ferreteria2.php" class="active">Ferreteria</a></li>
                    <li><a href="../FerreBlue/index.html#contact">Contacto</a></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav><!-- End Nav Menu -->

            <a href="./clases/carrito.php" class="btn btn-getstarted">
                <i class="fa-solid fa-cart-shopping"></i> <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a>

        </div>
    </header><!-- End Header -->

    <main id="main">



        <main>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_carrito == null) {
                                echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                            } else {

                                $total = 0; 
                                foreach($lista_carrito as $producto) {
                                    $_id = $producto['id_producto'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio'];
                                    $cantidad = $producto['cantidad'];
                                    $descripcion = $producto['descripcion'];
                                    $subtotal = ($precio * $cantidad);
                                    $total += $subtotal;
                            ?>

                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo MONEDA . number_format($precio,2,'.',','); ?></td>
                                <td>
                                    <input type="number" min='1' max='30' step="1" value="<?php echo $cantidad; ?>" 
                                    size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizarCantidad(this.value, <?php echo $_id; ?>)">
                                </td>
                                <td>
                                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.',','); ?></div>
                                </td>
                                <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" 
                                data-bs-id="<?php echo $_id; ?>" data-bs-toogle="modal" data-bs-target="eliminaModal">
                                Eliminar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                        </td>
                    </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <button class="btn btn-warning btn-lg">Realizar Pago</button>
                    </div>
                </div>

            </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6f831aafbb.js" crossorigin="anonymous"></script>

        <script>
            function actualizarCantidad(cantidad, id) {
    let url = './clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action', 'agregar')
    formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let divsubtotal = document.getElementById('subtotal_' + id)
                divsubtotal.innerHTML = data.sub
            }
        })
}
        </script>

</body>

</html>