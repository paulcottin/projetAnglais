<?php
session_start();
$email = $_POST['email'];
$mdp = $_POST['mdp'];

$db;
try{
	$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
	die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT mdp FROM users WHERE email=?";
$stmt = $db->prepare($sql);
$stmt->execute(array($email));

$mdp_bd = $stmt->fetch()[0];

if (password_verify($mdp, $mdp_bd)) {
	
	$sql = "SELECT id, prenom, nom FROM users WHERE email=?";
	$stmt = $db->prepare($sql);
	$stmt->execute(array($email));

	$data = $stmt->fetch();
	$_SESSION['id'] = $data[0];
	$_SESSION['prenom'] = $data[1];
	$_SESSION['nom'] = $data[2];

	session_register($_SESSION['id']);
	session_register($_SESSION['prenom']);
	session_register($_SESSION['nom']);

	header("Location: accueil.php");
}else{
	header("Location: connexion.php?error=1");
}
?>