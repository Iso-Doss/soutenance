<?php

//include_once 'app/commun/traitement-retour-formulaire.php';

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-5 offset-md-1">
                <h1 class="m-0">Gestion des salles</h1>
            </div><!-- /.col -->
            <div class="col-sm-5">
                <div class="float-sm-right">
                    <a href="?profile=administrateur&ressource=salles" class="btn btn-primary">Retour sur la liste des salle</a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <?php

                $salle = salle($_GET["id"]);

                if (!isset($_GET["id"]) || empty($_GET["id"]) || "-" == $_GET["id"] || empty($salle)) { ?>

                    <div class="alert alert-danger" role="alert">
                        <p>
                            La salle que vous essayez de supprimer n'existe pas ou n'est pas disponible pour le moment.
                        </p>
                    </div>

                    <?php } else {

                    echo "Nous allons proécéder a la suppression de la salle.";

                    $num_salle = $_GET["id"];

                    $supprimer_salle = supprimer_salle($num_salle);

                    if ($supprimer_salle) { ?>
                        <div class="alert alert-success" role="alert">
                            <p>
                                La salle a été supprimer avec succès.
                            </p>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <p>
                                Oupps!!! Une erreur s'est produite lors de la suppression de la salle. Veuillez réessayer.
                            </p>
                        </div>
                <?php
                    }
                }
                ?>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->