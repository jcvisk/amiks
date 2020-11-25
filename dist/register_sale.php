<?php

require_once '../src/core/conexion.php';
require_once '../src/core/helpers.php';

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
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
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
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                    data-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                    data-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
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
                    <h1 class="mt-4">Ventas, Consignas y Devoluciones</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="../src/core/register_sale.php">
                                <div class="form-row">
                                    <input class="form-control sr-only"
                                        value="<?= $_SESSION['usuario_distribuidor']['id'] ?>" name="distribuidor"
                                        id="distribuidor" type="text" required />
                                    <div class="col-md">
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
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="small mb-1" for="presentacion">Presentación</label>
                                            <select class="custom-select" name="presentacion" id="presentacion"
                                                required>
                                                <option selected>Seleccionar</option>
                                                <?php
                                                $tabla = 'productos';
                                                $distribuidores = obtenerRegistros( $conexion, $tabla );
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
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="small mb-1" for="pagadas">Pagadas</label>
                                            <input class="form-control" name="pagadas" id="pagadas" type="number"
                                                min="1" required />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="small mb-1" for="vendidas">Vendidas</label>
                                            <input class="form-control" name="vendidas" id="vendidas" type="number"
                                                min="1" required />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="small mb-1" for="cambios">Cambios</label>
                                            <input class="form-control" name="cambios" id="cambios" type="number"
                                                min="1" required />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="small mb-1" for="consignas">Consignas</label>
                                            <input class="form-control" name="consignas" id="consignas" type="number"
                                                min="1" required />
                                        </div>
                                    </div>
                                    <div class="col-md justify-content-be">
                                        <div class="form-group">
                                            <label class="small mb-1" for="consigna_anterior">Consigna Anterior</label>
                                            <input class="form-control" name="consigna_anterior" id="consigna_anterior"
                                                type="number" min="1" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row justify-content-end">
                                    <div class="form-group mt-4 mb-5 text-right">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-12">
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
                                                    <th>Cliente</th>
                                                    <th>Presentación</th>
                                                    <th>Pagadas</th>
                                                    <th>Vendidas</th>
                                                    <th>Cambios</th>
                                                    <th>Consignas</th>
                                                    <th>Consigna Anterior</th>
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
                                                            <td><?= $cliente['consigna']; ?></td>
                                                            <td><?= $cliente['consignaanterior']; ?></td>
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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>