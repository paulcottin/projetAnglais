<?php
session_start();

$db;
try{
	$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
	die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT prenom, nom, maxscore, nbparties FROM users WHERE id=?";
$stmt = $db->prepare($sql);
$stmt->execute(array($_SESSION['id']));

$data = $stmt->fetch();
?>