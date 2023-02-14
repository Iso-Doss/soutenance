<?php

$donnnes = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (!isset($_POST["nom"]) || empty($_POST["nom"])) {

    $erreurs["nom"] = "Le champ nom est obligatoire. Veuillez le renseigner.";
}

if (!isset($_POST["prenoms"]) || empty($_POST["prenoms"])) {

    $erreurs["prenoms"] = "Le champ prenoms est obligatoire. Veuillez le renseigner.";
}

if (!isset($_POST["email"]) || empty($_POST["email"])) {

    $erreurs["email"] = "Le champ email est obligatoire. Veuillez le renseigner.";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    $erreurs["email"] = "Le champ email est incorrect. Veuillez le renseigner.";
}

if (!isset($_POST["mot-de-passe"]) || empty($_POST["mot-de-passe"])) {

    $erreurs["mot-de-passe"] = "Le champ email est obligatoire. Veuillez le renseigner.";
}

if (!isset($_POST["confirmation-mot-de-passe"]) || empty($_POST["confirmation-mot-de-passe"])) {

    $erreurs["confirmation-mot-de-passe"] = "Le champ email est obligatoire. Veuillez le renseigner.";
}

if (
    isset($_POST["mot-de-passe"]) &&
    !empty($_POST["mot-de-passe"]) &&
    isset($_POST["confirmation-mot-de-passe"]) &&
    !empty($_POST["confirmation-mot-de-passe"]) &&
    $_POST["mot-de-passe"] != $_POST["confirmation-mot-de-passe"]
) {

    $erreurs["mot-de-passe"] = $erreurs["confirmation-mot-de-passe"] = "Les mot de passe ne sont pas identiques. Veuillez réessayer.";
}

if (empty($erreurs)) {
    //Tous vas bien
} else {

    $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
}

header("location: index.php?profile=administrateur&ressource=inscription&message=$message&erreur=$erreur&erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnnes));
