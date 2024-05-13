<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6f831aafbb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Administracion</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="../Categoria/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-toolbox"></i>
                        <span>Categoria</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../Productos/Menu.php" class="sidebar-link">
                    <i class="fa-brands fa-product-hunt"></i>
                        <span>Productos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../proveedor/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-user-tie"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../Empleado/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-user-tie"></i>
                        <span>Empleados</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../UsuarioE/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-user-tie"></i>
                        <span>Usuarios Empleados</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../Cliente/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-user"></i>
                        <span>Cliente</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../UsuarioC/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-user"></i>
                        <span>Usuario Cliente</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../Venta/Menu.php" class="sidebar-link">
                        <i class="fa-solid fa-money-bill-trend-up"></i>
                        <span>Venta</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../DetalleVenta/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-circle-info"></i>
                        <span>Detalles de Ventas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../Compra/Menu.php" class="sidebar-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                        <span>Compra</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../FerreBlueEmpleado/index.html" class="sidebar-link">
                <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
                    <span>Atras</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <h1> 


                <script>
    function eliminar(){
      var respuesta=confirm("Estas seguro que deseas eliminar?");
      return respuesta
    }
  </script>
  <h1 class="text-center p-3 alert alert-secondary">Categorias</h1>
  <?php
  include "modelo/Conexion.php";
  include "controlador/Eliminar_Categoria.php"
  ?>
  <div class="container-fluid row">
   <form class="col-4 p-3" method="POST">
    <h3 class="text-center alert ">Registro de Categoria</h3>
    <?php 
    include "modelo/Conexion.php";
    include "controlador/registro_categoria.php";
    ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre Categoria</label>
    <input type="text" class="form-control" name="nombre">
  </div>

  <button type="submit" class="btn btn-danger" name="btnregistrar" value="ok">Registrar</button>

  <br>
  <br>
  <br>
  <br>
  <br>
  <button type="submit" class="btn btn-danger" id="btnExportar">Descargar CRUD</button>
    </form>

    </form>

    <div class="col-8 p-4">
    <table id="tabla" class="table table-striped">
  <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include "modelo/Conexion.php";
    $sql=$Conexion->query(" select * from Categoria");
    while($datos=$sql->fetch_object()){  ?>

    <tr>
      <th><?=$datos->id_categoria ?></th>
      <td><?=$datos->nombre ?></td>
      <td>
        <a href="Modificar_Categoria.php?id=<?= $datos->id_categoria ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
        <a onclick="return eliminar()" href="Menu.php?id=<?= $datos->id_categoria ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>

    <?php }
    ?>
   
  </tbody>
  </table>
    </div>

  </div>    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function () {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte de prueba", //Nombre del archivo de Excel
            sheetname: "Reporte de prueba", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>


                </h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>