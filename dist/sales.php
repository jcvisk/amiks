<?php

require_once '../src/core/conexion.php';
require_once '../src/core/helpers.php';
require_once '../src/core/helpers/helpers_sales.php';

if (!isset($_SESSION['usuario_admin'])) {
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
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet" />
    <script src="js/all.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
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
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../src/core/close_sesion.php">Logout</a>
                    <div class="dropdown-divider"></div>
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

                        <a class="nav-link" href="register_distribuitor.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Crear Distribuidor
                        </a>
                        <a class="nav-link" href="register_client.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Crear Cliente
                        </a>
                        <a class="nav-link" href="create_produts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-wine-bottle"></i></div>
                            Crear Productos
                        </a>
                        <div class="sb-sidenav-menu-heading">Reportes</div>

                        <a class="nav-link" href="sales.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                            Ventas
                        </a>
                        <a class="nav-link" href="inside_case.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-file" aria-hidden="true"></i></div>
                            Incidencias
                        </a>
                        <div class="sb-sidenav-menu-heading">Usuarios</div>

                        <a class="nav-link" href="register_admin.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
                            Crear Administrador
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Ventas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Ventas y Consiganas
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Distribuidor</th>
                                            <th>Cliente</th>
                                            <th>Presentación</th>
                                            <th>Pagadas</th>
                                            <th>Vendidas</th>
                                            <th>Cambio</th>
                                            <th>Consigna</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                $clientesVentas = listarVentasAllData( $conexion );
                                                //var_dump(mysqli_fetch_assoc( $clientesVentas ));
                                                if (!empty($clientesVentas)) :
                                                while ( $cliente = mysqli_fetch_assoc( $clientesVentas ) ) : ?>
                                                <tr>
                                                    <td><?= $cliente['nombre']; ?></td>
                                                    <td><?= $cliente['nombreempresa']; ?></td>
                                                    <td><?= $cliente['descripcion']; ?></td>
                                                    <td><?= $cliente['pagada']; ?></td>
                                                    <td><?= $cliente['vendida']; ?></td>
                                                    <td><?= $cliente['cambios']; ?></td>
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
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
    <script src="js/jquery.dataTables.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>