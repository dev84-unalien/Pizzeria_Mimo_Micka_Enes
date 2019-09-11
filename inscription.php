<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$postal = $_POST['postal'];
$tel = $_POST['tel'];
$mdp = $_POST['mdp'];

if (!$tel || !$mdp) {
    echo "Le formulaire est mal rempli";
    exit(); // On termine le programme
}


$connection = new mysqli("localhost", "root", "", "pizzeria");

$request = $connection->prepare("SELECT tel, mdp FROM utilisateur WHERE tel = ?");

$request->bind_param("s", $tel);

$request->execute();

$tel = null; 
$pizzeria_password = null;
$request->bind_result($pizzeria_tel, $pizzeria_password);

$request->fetch();

$request->close();
$connection->close();


if (password_verify($password, $pizzeria_password)) {
    echo "Bravo vous êtes connecté !";
} else {
    echo "Votre mot de passe est incorrect ! Mais putain que faite vous ? Call FBI";
}


?>