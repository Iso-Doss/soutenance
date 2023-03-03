<?php

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (!isset($_POST["email"]) || empty($_POST["email"])) {

    $erreurs["email"] = "Le champ email est obligatoire. Veuillez le renseigner.";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    $erreurs["email"] = "Le champ email est incorrect. Veuillez le renseigner.";
}

if (empty($erreurs)) {
    //Tous vas bien
    $instance_bd = connexion_bd();

    $email_existe = email_existe($_POST["email"]);

    if (isset($email_existe) && !empty($email_existe)) {

        $token = uniqid($_POST["email"]);

        $contenue_mail = "<a href='http://localhost:9090?profile=administrateur&ressource=changer-mot-de-passe&token=" . $token . "'>CHANGER VOTRE MOT DE PASSE</a>";

        $mail = e_mail($_POST["email"], "DEMANDE DE MOT DE PASSE OUBLIER", $contenue_mail);

        $message = "Mail envoyé.";
    } else {
        $erreur = "Email incorrect";
    }
} else {

    $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
}

header("location: index.php?profile=administrateur&ressource=mot-de-passe-oublier&message=$message&erreur=$erreur&erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));
