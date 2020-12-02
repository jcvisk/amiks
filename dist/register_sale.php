<?php

require_once '../src/core/conexion.php';
require_once '../src/core/helpers.php';
require_once '../src/core/helpers/helpers_sales.php';


if (!isset($_SESSION['usuario_distribuidor'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Sistema de horchatas</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../src/core/close_sesion.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="register_sale.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Ventas, Consignas y Devoluciones
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Sistema de horchatas 3.1.0
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Ventas, Consignas y Devoluciones</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-5">
                            <form method="POST" action="../src/core/register_sale.php">
                                <div class="form-row">
                                    <input class="form-control sr-only"
                                        value="<?= $_SESSION['usuario_distribuidor']['id'] ?>" name="distribuidor"
                                        id="distribuidor" type="text" required />
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cliente">Cliente</label>
                                            <select class="custom-select" name="cliente" id="cliente" required>
                                                <option>Seleccionar</option>
                                                <?php
                                                $tabla = 'clientes';
                                                
                                                $id = 'iddistribuidor';
                                                $idForaneo = (INT)$_SESSION['usuario_distribuidor']['id'];

                                                $clientes = obtenerRegistro( $conexion, $tabla, $id, $idForaneo );
                                                if (!empty($clientes)) :
                                                while ( $cliente = mysqli_fetch_assoc( $clientes ) ) : ?>
                                                <option value="<?= $cliente['id']; ?>">
                                                    <?= $cliente['nombreempresa']; ?></option>
                                                <?php
                                                endwhile;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="presentacion">Presentación</label>
                                            <select class="custom-select" name="presentacion" id="presentacion"
                                                required>
                                                <option selected>Seleccionar</option>
                                                <?php
                                                $tabla = 'productos';
                                                $distribuidores = getAllRecords( $conexion, $tabla );
                                                if (!empty($distribuidores)) :
                                                while ( $distribuidor = mysqli_fetch_assoc( $distribuidores ) ) : ?>
                                                <option value="<?= $distribuidor['id']; ?>">
                                                    <?= $distribuidor['descripcion']; ?></option>
                                                <?php
                                                endwhile;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="pagadas">Pagadas</label>
                                            <input class="form-control" name="pagadas" id="pagadas" type="number"
                                                min="0" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="vendidas">Vendidas</label>
                                            <input class="form-control" name="vendidas" id="vendidas" type="number"
                                                min="0" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cambios">Cambios</label>
                                            <input class="form-control" name="cambios" id="cambios" type="number"
                                                min="0" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="consignas">Consignas</label>
                                            <input class="form-control" name="consignas" id="consignas" type="number"
                                                min="0" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row justify-content-between">
                                    <div class="col-md-4 justify-content-be">
                                        <div class="form-group">
                                            <label class="small mb-1" for="consigna_anterior">Consigna Anterior</label>
                                            <input class="form-control" name="consigna_anterior" id="consigna_anterior"
                                                type="number" min="0" required />
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-5 text-right">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-7">
                            <div class="card mb-4" style="height: 250px; overflow: auto;">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Totales
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <?php
                                                    $productos = getAllRecords( $conexion, 'productos' );
                                                    if (!empty($productos)) :
                                                    while ( $producto = mysqli_fetch_row( $productos ) ) : ?>
                                                    
                                                    <th><?= $producto[1]; ?></th>

                                                    <?php
                                                    endwhile;
                                                    endif;
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>  
                                                    <?php
                                                    $i=1;
                                                    $columnas = getAllRecords( $conexion, 'productos' );
                                                    if (!empty($columnas)) : ?>
                                                    <tr>
                                                    <?php while ( $columna = mysqli_fetch_row( $columnas ) ) :?>
                                                        <th><?php echo getTotales($conexion, $i); ?></th>
                                                    <?php $i++; endwhile; ?>
                                                    </tr>
                                                    <?php
                                                    endif;
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Ventas y Consiganas
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Presentación</th>
                                                    <th>Pagadas</th>
                                                    <th>Vendidas</th>
                                                    <th>Cambios</th>
                                                    <th>Consignas</th>
                                                    <th>Consigna Anterior</th>
                                                    <th>Total Consigna</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $clientesVentas = listarClientesVentas( $conexion );
                                                if (!empty($clientesVentas)) :
                                                while ( $cliente = mysqli_fetch_assoc( $clientesVentas ) ) : ?>
                                                <tr>
                                                    <td><?= $cliente['nombreempresa']; ?></td>
                                                    <td><?= $cliente['descripcion']; ?></td>
                                                    <td><?= $cliente['pagada']; ?></td>
                                                    <td><?= $cliente['vendida']; ?></td>
                                                    <td><?= $cliente['cambios']; ?></td>
                                                    <td><?= (INT)$cliente['consigna']; ?></td>
                                                    <td><?= (INT)$cliente['consignaanterior']; ?></td>
                                                    <td><?php $re = ((INT)$cliente['consigna'] + (INT)$cliente['consignaanterior']); echo ($re) ; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                endwhile;
                                                endif;
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <?php $mostrar = listarClientesVentas( $conexion ); $mostrar2 = mysqli_fetch_assoc($mostrar); var_dump($mostrar2) ?> -->
                
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Sistema de horchatas</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>