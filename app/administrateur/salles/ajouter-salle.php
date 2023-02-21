<?php

//include_once 'app/commun/traitement-retour-formulaire.php';

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (isset($_POST) && !empty($_POST)) {

    if (!isset($_POST["capacite"]) || empty($_POST["capacite"])) {

        $erreurs["capacite"] = "Le champ capacité est obligatoire. Veuillez le renseigner.";
    }

    if (!isset($_POST["type_salle"]) || empty($_POST["type_salle"])) {

        $erreurs["type_salle"] = "Le champ type salle est obligatoire. Veuillez le renseigner.";
    }

    if (empty($erreurs)) {

        $ajouter_salle = ajouter_salle($donnees);

        if($ajouter_salle){
            $message = "La salle a été ajoutée avec succèss.";
        }else{
            $erreur = "Oups!!! Une erreur s'est produite lors de l'ajout de la salle. Veuillez réessayer.";
        }

    } else {

        $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
    }
}

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


                <?php if (isset($message) && !empty($message)) { ?>
                    <div class="alert alert-success" role="alert">
                        <p>
                            <?= $message; ?>
                        </p>
                    </div>
                <?php } ?>

                <?php if (isset($erreur) && !empty($erreur)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <p>
                            <?= $erreur; ?>
                        </p>
                    </div>
                <?php } ?>

                <form action="?profile=administrateur&ressource=ajouter-salle" method="POST">

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une salle</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="capacite">
                                    Capacité
                                    <span class="text-danger">(*)</span>
                                    :
                                </label>
                                <input type="number" class="form-control capacite" id="capacite" name="capacite" placeholder="Veuillez entrer la capacité de la salle" value="<?= (isset($donnees["capacite"]) && !empty($donnees["capacite"])) ? $donnees["capacite"] : ""; ?>">
                                <?php if (isset($erreurs["capacite"]) && !empty($erreurs["capacite"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["capacite"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="type-salle">
                                    Type de la salle

                                    <span class="text-danger">(*)</span>
                                    :
                                </label>
                                <input type="text" class="form-control type-salle" id="type-salle" name="type_salle" placeholder="Veuillez entrer le type de la salle" value="<?= (isset($donnees["type_salle"]) && !empty($donnees["type_salle"])) ? $donnees["type_salle"] : ""; ?>">
                                <?php if (isset($erreurs["type_salle"]) && !empty($erreurs["type_salle"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["type_salle"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="nom-proprietaire">
                                    Nom du propriétaire :
                                </label>
                                <input type="text" class="form-control nom-proprietaire" id="nom-proprietaire" name="nom_proprietaire" placeholder="Veuillez entrer le nom du propriétaire de la salle (Salle d'un particulier)" value="<?= (isset($donnees["nom_proprietaire"]) && !empty($donnees["nom_proprietaire"])) ? $donnees["nom_proprietaire"] : ""; ?>">
                                <?php if (isset($erreurs["nom_proprietaire"]) && !empty($erreurs["nom_proprietaire"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["nom_proprietaire"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="prenoms-proprietaire">
                                    Prénoms du propriétaire :
                                </label>
                                <input type="text" class="form-control prenoms-proprietaire" id="prenoms-proprietaire" name="prenoms_proprietaire" placeholder="Veuillez entrer le prénoms du propriétaire de la salle (Salle d'un particulier)" value="<?= (isset($donnees["prenoms_proprietaire"]) && !empty($donnees["prenoms_proprietaire"])) ? $donnees["prenoms_proprietaire"] : ""; ?>">
                                <?php if (isset($erreurs["prenoms_proprietaire"]) && !empty($erreurs["prenoms_proprietaire"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["prenoms_proprietaire"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success">Ajouter salle</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->