<?php
// Informations de connexion Ã  la base de donnÃ©es
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "crud";

// Connexion Ã  la base de donnÃ©es
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// VÃ©rification de la connexion
if ($connexion->connect_error) {
    die("Ãchec de la connexion : " . $connexion->connect_error);
}

?>