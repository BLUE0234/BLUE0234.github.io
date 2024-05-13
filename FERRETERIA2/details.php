<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la peticion';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $con->prepare("SELECT count(id_producto) FROM Productos WHERE id_producto=?");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $con->prepare("SELECT nombre, descripcion, precio FROM Productos WHERE id_producto=?");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $dir_images = 'img/productos/' . $id . '/';

            $rutaImg = $dir_images . 'ferre3.jpg';

            if (!file_exists($rutaImg)) {
                $rutaImg = 'img/no-photo.jpg';
            }

            $imagenes = array();
            if(file_exists($dir_images))
            {
            $dir = dir($dir_images);

            while (($archivo = $dir->read()) != false) {
                if ($archivo != 'ferre3.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        }
        }
    } else {
        echo 'Error al procesar la peticion';
        exit;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo.css">
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
    <link href="assets/css/Main.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/js/Main.js">

    <style>
        body {
            background-color: white;
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

            <a href="checkout.php" class="btn btn-getstarted">
                <i class="fa-solid fa-cart-shopping"></i> <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a>

        </div>
    </header><!-- End Header -->

    <main id="main">



        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">

                        <div id="carouselImages" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo $rutaImg; ?>" class="d-block w-100" alt="">
                                </div>

                                <?php foreach($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img src="<?php echo $img; ?>" class="d-block w-100">
                                </div>
                                <?php } ?>
                              
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                    </div>
                    <div class="col-md-6 order-md-2">
                        <h2><?php echo $nombre; ?></h2>


                        <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>

                        <p class="lead">
                            <?php echo $descripcion; ?> <br>
                            Es de alta calidad <br>
                            Viene con garantia <br>
                            Viene en varios colores <br>
                        </p>

                        <div class="d-grid gap-3 col-10 mx-auto">
                            <button class="btn btn-danger" type="button">Comprar ahora</button>
                            <button class="btn btn-outline-danger" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>

                        </div>

                    </div>
                </div>
            </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6f831aafbb.js" crossorigin="anonymous"></script>


        <script>
            function addProducto(id, token) {
                let url = './clases/carrito.php'
                let formData = new FormData()
                formData.append('id', id)
                formData.append('token', token)

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElementById("num_cart");
                    elemento.innerHTML = data.numero;
                }
            })

            }
        </script>

</body>

</html>