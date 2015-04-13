<?php
session_start();
$question = $_POST['question'];
$rep1 = $_POST['rep1'];
$rep2 = $_POST['rep2'];
$rep3 = $_POST['rep3'];
$rep4 = $_POST['rep4'];
$theme = $_POST['theme'];

$db;
try{
	$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
	die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT id FROM themes WHERE nom_theme='$theme'";

$req = $db->query($sql);

$id_theme = $req->fetch()[0];

$req->closeCursor();

$id_theme = $id_theme + 0; //Conversion en int

$sql = "INSERT INTO  questions VALUES (null, '$question', '$rep1', '$rep2', '$rep3', '$rep4', '$id_theme')";
$db->exec($sql);

$redirection = "Location: thanks.php";
header($redirection);

?>