<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de board</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="public/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ges Salle</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">User connected</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="?profile=administrateur&ressource=tableau-de-board" class="nav-link <?= (isset($_GET["ressource"]) && !empty($_GET["ressource"]) && "tableau-de-board" == $_GET["ressource"]) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?profile=administrateur&ressource=salles" class="nav-link <?= (isset($_GET["ressource"]) && !empty($_GET["ressource"]) && ("salles" == $_GET["ressource"] || "ajouter-salle" == $_GET["ressource"])) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-house"></i>
                                <p>
                                    Salles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?profile=administrateur&ressource=representations" class="nav-link <?= (isset($_GET["ressource"]) && !empty($_GET["ressource"]) && ("representations" == $_GET["ressource"] || "ajouter-representation" == $_GET["ressource"])) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-house"></i>
                                <p>
                                    Représentations
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php

            if (isset($_GET["ressource"]) && !empty($_GET["ressource"])) {

                switch ($_GET["ressource"]) {

                    case "tableau-de-board":
                        require "app/administrateur/tableau-de-board/tableau-de-board.php";
                        break;

                    case "salles":
                        require "app/administrateur/salles/salles.php";
                        break;

                    case "ajouter-salle":
                        require "app/administrateur/salles/ajouter-salle.php";
                        break;

                    case "ajouter-salle-traitement":
                        require "app/administrateur/salles/ajouter-salle-traitement.php";
                        break;

                    case "modifier-salle":
                        require "app/administrateur/salles/modifier-salle.php";
                        break;

                    case "supprimer-salle":
                        require "app/administrateur/salles/supprimer-salle.php";
                        break;

                    case "representations":
                        require "app/administrateur/representations/representations.php";
                        break;

                    case "ajouter-representation":
                        require "app/administrateur/representations/ajouter-representation.php";
                        break;

                    default:
                        require "app/administrateur/tableau-de-board/tableau-de-board.php";
                        break;
                }
            } else {
                require "app/administrateur/tableau-de-board/tableau-de-board.php";
            }

            ?>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        //$.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="public/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="public/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="public/plugins/moment/moment.min.js"></script>
    <script src="public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="public/js/pages/dashboard.js"></script>
</body>

</html>