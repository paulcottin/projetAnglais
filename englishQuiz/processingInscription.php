<?php
session_start();
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

$db;
try{
	$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
	die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT count(id) FROM users WHERE email=?";
$stmt = $db->prepare($sql);
$stmt->execute(array($email));

$nb_email = $stmt->fetch()[0];

//Si la personne a déjà enregistré cet email alors erreur
if ($nb_email != 0) {
	header("Location: inscription.php?error=1");
}

$sql = "INSERT INTO users VALUES (null, '$prenom', '$nom', '$email', '$mdp', 0)";
$db->exec($sql);

header("Location: connexion.php");

?>