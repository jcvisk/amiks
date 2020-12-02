<?php

require_once '../src/core/conexion.php';
require_once '../src/core/helpers/helpers_distribuitor.php';

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
                            <a class="nav-link" href="sales.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                                Ventas
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
                    <h1 class="mt-4">Crear Distribuidor</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="../src/core/register_distribuitor.php">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="nombre">Nombre</label>
                                            <input class="form-control" name="nombre" id="nombre" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="apellido">Apellido</label>
                                            <input class="form-control" name="apellido" id="apellido" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="edad">Edad</label>
                                            <input class="form-control" name="edad" id="edad" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="celular">Celular</label>
                                            <input class="form-control" name="celular" id="celular" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="correo">Correo</label>
                                            <input class="form-control" name="correo" id="correo" type="email" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Contraseña</label>
                                            <input class="form-control" name="password" id="password" type="password" pattern=".{6,}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="licencia">Licencia</label>
                                            <input class="form-control" name="licencia" id="licencia" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <button class="btn btn-primary" type="submit">Crear Distribuidor</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Datos de Distribuidores
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <theacd>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Edad</th>
                                                    <th>Celular</th>
                                                    <th>Correo</th>
                                                    <th>Licencia</th>
                                                    <th>Panel</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $tabla = 'distribuidores';
                                                $distribuidores = getAllRecords( $conexion, $tabla );
                                                if (!empty($distribuidores)) :
                                                while ( $distribuidor = mysqli_fetch_assoc( $distribuidores ) ) : ?>
                                                    <tr>
                                                        <td><?= $distribuidor['id']; ?></td>
                                                        <td><?= $distribuidor['nombre']; ?></td>
                                                        <td><?= $distribuidor['apellido']; ?></td>
                                                        <td><?= $distribuidor['edad']; ?></td>
                                                        <td><?= $distribuidor['celular']; ?></td>
                                                        <td><?= $distribuidor['correo']; ?></td>
                                                        <td><?= $distribuidor['licencia']; ?></td>
                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#modalDelete"
                                                                role="button">
                                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal - Delete -->
                                                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
                                                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalDeleteLabel">
                                                                        ¿Seguro que deseas eliminar este distribuidor?</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Mensaje de eliminacion
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancelar</button>

                                                                    <a href="../src/core/delete_distribuitor.php?id=<?= $distribuidor['id']; ?>"
                                                                        type="button" role="button"
                                                                        class="btn btn-danger">Eliminar</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                endwhile;
                                                endif;
                                                ?>
                                                </tbody>
                                            </theacd>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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