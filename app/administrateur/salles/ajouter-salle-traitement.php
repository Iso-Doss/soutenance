<?php

$donnnes = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

if (!isset($_POST["capacite"]) || empty($_POST["capacite"])) {

    $erreurs["capacite"] = "Le champ capacité est obligatoire. Veuillez le renseigner.";
}

if (empty($erreurs)) {
} else {

    $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
}

var_dump("Ok");

header_remove(); 

header("location: index.php?profile=administrateur&ressource=ajouter-salle&message=$message&erreur=$erreur&erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnnes));
