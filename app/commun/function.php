<?php

/**
 * Cette fonction permet de verifier si un utilisateur est connecter ou pas.
 * 
 * @return bool $est_connecter Est connecter ou pas.
 */
function est_connecter(): bool
{

    $est_connecter = false;

    switch ($_GET["profile"]) {

        case "administrateur":
            if (isset($_SESSION["administrateur_connecter"]) && !empty($_SESSION["administrateur_connecter"])) {
                $est_connecter = true;
            }
    }

    return $est_connecter;
}


/**
 * Cette fonction permet de se connecter a une base de données.
 * 
 * @return string | PDO la base de données ou un message d'erreur.
 */
function connexion_bd()
{
    $bd = "";

    try {
        $bd = new PDO('mysql:host=localhost;dbname=gestion-salle-spectacle;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        $bd = "Oups!!! Une erreur s'est produite lors de la connexion a la base de données. Veuillez contactez les administrateurs.";
    }

    return $bd;
}

/**
 * Cette fonction permet de vérifier si un mail existe ou pas dans la base de données.
 * 
 * @param string $email L'email a vérifier.
 * @return bool $email_existe L'email existe ou pas.
 */
function email_existe(string $email): bool
{

    $email_existe = false;

    $instance_bd = connexion_bd();

    $requette = "SELECT * FROM utilisateur WHERE email = :email";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        'email' => $email
    ]);

    if ($resultat) {

        if (is_array($preparation_requette->fetch(PDO::FETCH_ASSOC))) {

            $email_existe = true;
        }
    }


    return $email_existe;
}


/**
 * Cette fonction permet d'enregistrer / d'inscrire un utilisateur.
 * 
 * @param array $utilisateur Les informations de l'utilisateur.
 * @return bool $utilisateur_enregistrer L'utilisateur enregistrer.
 */
function enregistrer_utilisateur(array $utilisateur): bool
{

    $utilisateur_enregistrer = false;

    $instance_bd = connexion_bd();

    $requette = "INSERT INTO utilisateur(`nom`, `prenoms`, `email`, `motdepasse`, `profil`) VALUES(:nom, :prenoms, :email, :motdepasse, :profil)";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute($utilisateur);

    if ($resultat) {

        $utilisateur_enregistrer = true;
    }


    return $utilisateur_enregistrer;
}


/**
 * Cette fonction permet de verifier l'existance d'un utilisateur qui essaye de se connecter.
 * 
 * @param string $email L'email.
 * @param string $mot_de_pase Le mot de passe.
 * @return array utilisteur_existe L'utilisateur trouvé.
 */
function utilisteur_existe(string $email, string $mot_de_pase): array
{

    $utilisteur_existe = [];

    $instance_bd = connexion_bd();

    $requette = "SELECT `nom`, `prenoms`, `sexe`, `date-naissance`, `nom-utilisateur`, `email`, `telephone`, `profil` FROM utilisateur WHERE email = :email and motdepasse = :motdepasse";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        'email' => $email,
        'motdepasse' => $mot_de_pase
    ]);

    if ($resultat) {

        $utilisteur_existe = $preparation_requette->fetch(PDO::FETCH_ASSOC);

        if (!is_array($utilisteur_existe)) {

            $email_existe = [];
        }
    }

    return $utilisteur_existe;
}

/**
 * Cette fonction permet de récupérer la liste des salles depuis la base de données.
 * 
 * @return array $salles La liste des salles
 */
function liste_salles(): array
{

    $salles = [];

    $instance_bd = connexion_bd();

    $requette = "SELECT * FROM salle";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([]);

    if ($resultat) {

        $salles = $preparation_requette->fetchAll(PDO::FETCH_ASSOC);

        if (!is_array($salles)) {

            $salles = [];
        }
    }

    return $salles;
}

/**
 * Cette fonction permet d'ajouter / d'enregistrer une salle dans la base de données.
 * 
 * @param array $salle La salle.
 * @return bool $ajouter_salle La salle a été ajoutée ou pas.
 */
function ajouter_salle($salle): bool
{

    $ajouter_salle = false;

    $instance_bd = connexion_bd();

    $requette = "INSERT INTO salle(`capacite`, `type-salle`, `nom-proprietaire`, `prenoms-proprietaire`) VALUES(:capacite, :type_salle, :nom_proprietaire, :prenoms_proprietaire)";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute($salle);

    if ($resultat) {

        $ajouter_salle = true;
    }


    return $ajouter_salle;
}

/**
 * Cette fonction permet de récupérer une salle depuis la base de données en fonction de son numéro de salle (num-salle).
 * 
 * @param $num_salle Le numéro de salle.
 * @return array $salle La salle.
 */
function salle($num_salle): array
{

    $salle = [];

    $instance_bd = connexion_bd();

    $requette = "SELECT * FROM salle where `num-salle` = :num_salle";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        "num_salle" => $num_salle
    ]);

    if ($resultat) {

        $salle = $preparation_requette->fetch(PDO::FETCH_ASSOC);

        if (!is_array($salle)) {

            $salle = [];
        }
    }

    return $salle;
}



/**
 * Cette fonction permet de modifier / mettre a jour une salle dans la base de données a partir de son numéro de la salle (num-salle).
 * 
 * @param array $salle La salle.
 * @return bool $modifier_salle La salle a été ajoutée ou pas.
 */
function modifier_salle($salle): bool
{

    $modifier_salle = false;

    $instance_bd = connexion_bd();

    $requette = "UPDATE `salle` SET `capacite`= :capacite,`type-salle`= :type_salle,`nom-proprietaire`=:nom_proprietaire, `prenoms-proprietaire`= :prenoms_proprietaire WHERE `num-salle` = :num_salle";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute($salle);

    if ($resultat) {

        $modifier_salle = true;
    }


    return $modifier_salle;
}

/**
 * Cette fonction permet de supprimer une salle de la base de données a partir de son numéro de la salle (num-salle).
 * 
 * @param array $num_salle Le numéro de la salle.
 * 
 * @return bool $modifier_salle La salle a été ajoutée ou pas.
 */
function supprimer_salle($num_salle): bool
{

    $supprimer_salle = false;

    $instance_bd = connexion_bd();

    $requette = "DELETE FROM salle WHERE `num-salle` = :num_salle";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        "num_salle" => $num_salle
    ]);

    if ($resultat) {

        $supprimer_salle = true;
    }

    return $supprimer_salle;

}
