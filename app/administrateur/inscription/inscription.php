<?php

$donnees = [];

$erreurs = [];

if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {

    $donnees = json_decode($_GET["donnees"], true);
}

if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {

    $erreurs = json_decode($_GET["erreurs"], true);
}

?>

<?php if (isset($_GET["message"]) && !empty($_GET["message"])) { ?>
    <div class="alert alert-success" role="alert">
        <p>
            <?= $_GET["erreur"]; ?>
        </p>
    </div>
<?php } ?>

<?php if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) { ?>
    <div class="alert alert-danger" role="alert">
        <p>
            <?= $_GET["erreur"]; ?>
        </p>
    </div>
<?php } ?>

<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Créer un compte</p>

        <form action="?profile=administrateur&ressource=inscription-traitement" method="post" novalidate>
            <div>
                <label for="prenoms">
                    Prénoms
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="text" name="prenoms" id="prenoms" class="form-control prenoms" placeholder="Veuillez entrer vos prénoms." required value="<?= (isset($donnees["prenoms"]) && !empty($donnees["prenoms"])) ? $donnees["prenoms"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["prenoms"]) && !empty($erreurs["prenoms"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["prenoms"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="nom">
                    Nom
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="text" name="nom" id="nom" class="form-control nom" placeholder="Veuillez entrer votre nom." required value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["nom"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="email">
                    Email
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control email" placeholder="Veuillez entrer votre adresse mail." required value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["email"]) && !empty($erreurs["email"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["email"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="mot-de-passe">
                    Mot de passe
                    <span class="text-danger">(*)</span>
                    :
                </label>

                <div class="input-group mb-3">
                    <input type="password" name="mot-de-passe" id="mot-de-passe" class="form-control mot-de-passe" placeholder="Veuillez entrer votre mot de passe." required value="<?= (isset($donnees["mot-de-passe"]) && !empty($donnees["mot-de-passe"])) ? $donnees["mot-de-passe"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["mot-de-passe"]) && !empty($erreurs["mot-de-passe"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["mot-de-passe"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="confirmation-mot-de-passe">
                    Confirmation mot de passe
                    <span class="text-danger">(*)</span>
                    :
                </label>

                <div class="input-group mb-3">
                    <input type="password" name="confirmation-mot-de-passe" id="confirmation-mot-de-passe" class="form-control confirmation-mot-de-passe" placeholder="Veuillez confirmer votre mot de passe." required value="<?= (isset($donnees["confirmation-mot-de-passe"]) && !empty($donnees["confirmation-mot-de-passe"])) ? $donnees["confirmation-mot-de-passe"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["confirmation-mot-de-passe"]) && !empty($erreurs["confirmation-mot-de-passe"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["confirmation-mot-de-passe"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="conditions" name="conditions" value="oui">
                        <label for="conditions">
                            J'accepte <a href="#">les conditions</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="?profile=administrateur&ressource=connexion" class="text-center">J'ai déjà un compte</a>
    </div>