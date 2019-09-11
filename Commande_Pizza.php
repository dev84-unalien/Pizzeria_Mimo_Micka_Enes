<?php

$name = $_POST['name'];
$prenom = $_POST['prenom'];
$adress = $_POST['adresse'];
$postal = $_POST['postale'];
$number = $_POST['numero'];

if (!$name || $prenom  || $adress || $postal || $number) {
    echo "Le formulaire est incomplet";
    exit(); 
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Votre email est incorrect !";
    exit(); // On termine le programme
}

// Il faut établir une connexion avec la base de donnée
$reservation = new mysqli("localhost", "root", "", "mabdd");
// Il faut préparer la requete SQL
$request = $reservation->prepare("SELECT *,  FROM réservation");
// On renseigne les valeurs dynamiques de la requete
$request->bind_param("ssss", $email,$name,$prenom,$number);
// On execute la requete
$request->execute();
// On récupere l'email et mot de passe retourné par la base de donnée
$bdd_email = null; // Initialisé car plus pratique pour faire des if aprés
$bdd_name = null
$bdd_prenom = null
$bdd_$number = null
$request->bind_result($bdd_email, $bdd_name, $bdd_prenom, $bdd_$number);
// On execute la récup des valeurs
$request->fetch();
// On ferme la connexion avec la base de donnée et la requette
$request->close();
$connection->close();

// On vérifie que le mot de passe entré dans le formulaire et le mot de passe de la bdd est identique pour valider la connexion
if (password_verify($password, $bdd_password)) {
    echo "Bravo vous êtes connecté !";
} else {
    echo "Incorrect !";
}


?>