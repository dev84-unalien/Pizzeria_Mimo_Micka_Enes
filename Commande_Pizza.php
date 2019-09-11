<?php
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$postal = $_POST['postal'];
$tel = $_POST['tel'];

if (! $id || $nom || $prenom  || $adresse || $postal || $tel) {
    echo "Le formulaire est incomplet";
    exit(); 
}

// Il faut établir une connexion avec la base de donnée
$reservation = new mysqli("localhost", "root", "", "mabdd");
// Il faut préparer la requete SQL
$request = $reservation->prepare("SELECT *,  FROM réservation");
// On renseigne les valeurs dynamiques de la requete
$request->bind_param("ssssss", $id,$nom,$prenom,$adresse,$postal,$tel);
// On execute la requete
$request->execute();
// On récupere l'email et mot de passe retourné par la base de donnée
$id = null; // Initialisé car plus pratique pour faire des if aprés
$nom = null
$prenom = null
$tel = null
$request->bind_result($client_id, $client_nom, $client_prenom, $client_adresse, $client_code_postal,$tel);
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