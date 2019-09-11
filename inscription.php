<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$postal = $_POST['postal'];
$tel = $_POST['tel'];
$mdp = $_POST['mdp'];
$confMdp = $_POST['confMdp'];

if (!$nom || !$prenom || !$adresse || !$postal || !$tel || !$mdp) {
    echo "Le formulaire est mal rempli";
    exit(); // On termine le programme
}

if ($confMdp != $mdp) {
    echo "Le mot de passe est incorrect !";
    exit(); // On termine le programme
}

$connection = new mysqli("localhost", "root", "", "pizzeria");

$request = $connection->prepare("INSERT INTO client (nom, prenom, adresse, code_postal, tel, password) VALUE (?, ?, ?, ?, ?, ?)");

$hash = password_hash($mdp, PASSWORD_DEFAULT);
// Remplace les points d'interrogations
$request->bind_param("ssssss", $nom, $prenom, $adresse, $postal, $tel, $hash);

$request->execute();

$request->close();
$connection->close();

// Redirection vers l'accueil
header('Location: http://localhost/Pizzeria_Mimo_Micka_Enes/accueil.html');
