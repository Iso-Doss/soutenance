<?php

//include_once 'app/commun/traitement-retour-formulaire.php';

$salles = liste_salles(-1);

$spectacles = liste_spectacles(-1);

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (isset($_POST) && !empty($_POST)) {

    if (!isset($_POST["nom-representation"]) || empty($_POST["nom-representation"])) {

        $erreurs["nom-representation"] = "Le champ nom de la représentation est obligatoire. Veuillez le renseigner.";
    }

    if (!isset($_POST["date-representation"]) || empty($_POST["date-representation"])) {

        $erreurs["date-representation"] = "Le champ date de la représentation est obligatoire. Veuillez le renseigner.";
    }

    if (!isset($_POST["heure-debut-representation"]) || empty($_POST["heure-debut-representation"])) {

        $erreurs["heure-debut-representation"] = "Le champ heure de début de la représentation est obligatoire. Veuillez le renseigner.";
    }

    if (!isset($_POST["heure-fin-representation"]) || empty($_POST["heure-fin-representation"])) {

        $erreurs["heure-fin-representation"] = "Le champ heure de fin de la représentation est obligatoire. Veuillez le renseigner.";
    }

    if (!isset($_POST["num-spectacle"]) || empty($_POST["num-spectacle"])) {

        $erreurs["num-spectacle"] = "Le champ spectacle de la représentation est obligatoire. Veuillez le renseigner.";
    } else if (!is_numeric($_POST["num-spectacle"])) {

        $erreurs["num-spectacle"] = "Le champ spectacle de la représentation a une valeur incorrect. Veuillez le renseigner.";
    }

    if (!isset($_POST["num-salle"]) || empty($_POST["num-salle"])) {

        $erreurs["num-salle"] = "Le champ salle de la représentation est obligatoire. Veuillez le renseigner.";
    } else if (!is_numeric($_POST["num-salle"])) {

        $erreurs["num-spectacle"] = "Le champ spectacle de la représentation a une valeur incorrect. Veuillez le renseigner.";
    }

    $spectacle = spectacle($_POST["num-spectacle"]);

    if (empty($spectacle)) {
        $erreurs["num-spectacle"] = "Le spectacle choisi n'existe pas ou est introubable pour le moment. Veuillez choisir un autre.";
    }

    $salle = salle($_POST["num-salle"]);

    if (empty($salle)) {
        $erreurs["num-salle"] = "La salle choisie n'existe pas ou est introubable pour le moment. Veuillez choisir une autre.";
    }

    if (empty($erreurs)) {

        $representation["nom_representation"] = $donnees["nom-representation"];
        $representation["date_representation"] = $donnees["date-representation"];
        $representation["heure_debut_representation"] = $donnees["heure-debut-representation"];
        $representation["heure_fin_representation"] = $donnees["heure-fin-representation"];
        $representation["num_spectacle"] = $donnees["num-spectacle"];
        $representation["num_salle"] = $donnees["num-salle"];

        $ajouter_representation = ajouter_representation($representation);

        if ($ajouter_representation) {
            $message = "La représentation a été ajoutée avec succèss.";
        } else {
            $erreur = "Oups!!! Une erreur s'est produite lors de l'ajout de la représentation. Veuillez réessayer.";
        }
    } else {

        $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
    }
}

?>

<!- Content Header (Page header) ->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5 offset-md-1">
                    <h1 class="m-0">Gestion des représentations</h1>
                </div><!- /.col ->
                    <div class="col-sm-5">
                        <div class="float-sm-right">
                            <a href="?profile=administrateur&ressource=representations" class="btn btn-primary">Retour sur la liste des représentation</a>
                        </div>
                    </div><!- /.col ->
            </div><!- /.row ->
        </div><!- /.container-fluid ->
    </div>
    <!- /.content-header ->

        <!- Main content ->
            <section class="content">
                <div class="container-fluid">
                    <!- Small boxes (Stat box) ->
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

                                <form action="?profile=administrateur&ressource=ajouter-representation" method="POST">

                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Ajouter une représentation</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="nom-representation">
                                                    Nom de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <input type="text" class="form-control nom-representation" id="nom-representation" name="nom-representation" placeholder="Veuillez entrer le nom de la représentation " value="<?= (isset($donnees["nom-representation"]) && !empty($donnees["nom-representation"])) ? $donnees["nom-representation"] : ""; ?>">
                                                <?php if (isset($erreurs["nom-representation"]) && !empty($erreurs["nom-representation"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["nom-representation"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-representation">
                                                    Date de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <input type="date" class="form-control date-representation" id="date-representation" name="date-representation" placeholder="Veuillez entrer la date de la représentation " value="<?= (isset($donnees["date-representation"]) && !empty($donnees["date-representation"])) ? $donnees["date-representation"] : ""; ?>">
                                                <?php if (isset($erreurs["date-representation"]) && !empty($erreurs["date-representation"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["date-representation"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="heure-debut-representation">
                                                    Heure de début de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <input type="time" class="form-control heure-debut-representation" id="heure-debut-representation" name="heure-debut-representation" placeholder="Veuillez entrer l'heure de début de la représentation " value="<?= (isset($donnees["heure-debut-representation"]) && !empty($donnees["heure-debut-representation"])) ? $donnees["heure-debut-representation"] : ""; ?>">
                                                <?php if (isset($erreurs["heure-debut-representation"]) && !empty($erreurs["heure-debut-representation"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["heure-debut-representation"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="heure-fin-representation">
                                                    Heure de fin de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <input type="time" class="form-control heure-fin-representation" id="heure-fin-representation" name="heure-fin-representation" placeholder="Veuillez entrer l'heure de fin de la représentation " value="<?= (isset($donnees["heure-fin-representation"]) && !empty($donnees["heure-fin-representation"])) ? $donnees["heure-fin-representation"] : ""; ?>">
                                                <?php if (isset($erreurs["heure-fin-representation"]) && !empty($erreurs["heure-fin-representation"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["heure-fin-representation"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="num-spectacle">
                                                    Spectacle de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <select name="num-spectacle" id="num-spectacle" class="form-control">

                                                    <option value="">Veuillez sélectionner un spectacle</option>

                                                    <?php foreach ($spectacles as $spectacle) { ?>

                                                        <option value="<?= $spectacle["num-spectacle"]; ?>">
                                                            <?= $spectacle["nom-spectacle"]; ?>
                                                        </option>

                                                    <?php } ?>

                                                </select>
                                                <?php if (isset($erreurs["num-spectacle"]) && !empty($erreurs["num-spectacle"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["num-spectacle"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="num-salle">
                                                    Salle de la représentation
                                                    <span class="text-danger">(*)</span>
                                                    :
                                                </label>
                                                <select name="num-salle" id="num-salle" class="form-control">

                                                    <option value="">Veuillez sélectionner une salle</option>

                                                    <?php foreach ($salles as $salle) { ?>

                                                        <option value="<?= $salle["num-salle"]; ?>">
                                                            <?= $salle["type-salle"]; ?>
                                                        </option>

                                                    <?php } ?>

                                                </select>
                                                <?php if (isset($erreurs["num-salle"]) && !empty($erreurs["num-salle"])) { ?>
                                                    <p class="text-danger">
                                                        <?= $erreurs["num-salle"]; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            <button type="reset" class="btn btn-danger">Annuler</button>
                                            <button type="submit" class="btn btn-success">Ajouter representation</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                        <!- /.row ->
                </div><!- /.container-fluid ->
            </section>
            <!- /.content ->