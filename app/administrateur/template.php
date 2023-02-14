<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrateur | Gestion de salle de spectable</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="?profile=administrateur&ressource=connexion"><b>Ges</b> Salle de spectacle</a>
        </div>

        <p class="text-center">Administrateur</p>

        <?php

        if (isset($_GET["ressource"]) && !empty($_GET["ressource"])) {

            switch ($_GET["ressource"]) {

                case "connexion":
                    require "app/administrateur/connexion/connexion.php";
                    break;

                case "inscription":
                    require "app/administrateur/inscription/inscription.php";
                    break;

                case "inscription-traitement":
                    require "app/administrateur/inscription/inscription-traitement.php";
                    break;

                case "mot-de-passe-oublier":
                    require "app/administrateur/mot-de-passe-oublier/mot-de-passe-oublier.php";
                    break;

                default:
                    require "app/administrateur/connexion/connexion.php";
                    break;
            }
        } else {
            require "app/administrateur/connexion/connexion.php";
        }

        ?>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/js/adminlte.min.js"></script>
</body>

</html>