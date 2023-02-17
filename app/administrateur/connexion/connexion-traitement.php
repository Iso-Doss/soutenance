<?php

$donnnes = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (!isset($_POST["email"]) || empty($_POST["email"])) {

    $erreurs["email"] = "Le champ email est obligatoire. Veuillez le renseigner.";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    $erreurs["email"] = "Le champ email est incorrect. Veuillez le renseigner.";
}

if (!isset($_POST["mot-de-passe"]) || empty($_POST["mot-de-passe"])) {

    $erreurs["mot-de-passe"] = "Le champ email est obligatoire. Veuillez le renseigner.";
}

if (empty($erreurs)) {
    //Tous vas bien
    $instance_bd = connexion_bd();

    $utilisteur_existe = utilisteur_existe($_POST["email"], sha1($_POST["mot-de-passe"]));

    if (isset($utilisteur_existe) && !empty($utilisteur_existe)) {

        if (isset($utilisteur_existe["est-supprimer"]) && 1 == $utilisteur_existe["est-supprimer"]) {

            $erreur = "Identifiant ou mot de passe incorrect.";
        } else if (isset($utilisteur_existe["est-actif"]) && 0 == $utilisteur_existe["est-actif"]) {

            $erreur = "Ce compte est inactif. Veuillez contacter un administrateur afin de vous activer votre compte.";
        } else {

            $message = "Bienvenue ";

            $message .= (isset($utilisteur_existe["prenoms"]) && !empty($utilisteur_existe["prenoms"])) ? $utilisteur_existe["prenoms"] . " " : "";

            $message .= (isset($utilisteur_existe["nom"]) && !empty($utilisteur_existe["nom"])) ? $utilisteur_existe["nom"] . " " : "";

            $message .= ". Content de vous revoir.";

            $_SESSION["administrateur_connecter"] = $utilisteur_existe;

        }
        
    } else {

        $erreur = "Identifiant ou mot de passe incorrect.";
    }
} else {

    $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
}

header("location: index.php?profile=administrateur&ressource=connexion&message=$message&erreur=$erreur&erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnnes));
