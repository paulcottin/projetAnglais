<?php
session_start();


$_SESSION['qts_posees'] = array();
$_SESSION['nb_qts_posees'] = 0;
$_SESSION['score'] = 0;

/* Détermination du nombre total de questions (pour le mode random) */
$_SESSION['nb_total_qts'] = 0;

$db;
try{
    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
    die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT count(id) FROM questions;";

$req = $db->query($sql);

$_SESSION['nb_total_qts'] = $req->fetch()[0];

$req->closeCursor();

$_SESSION['nb_qts_theme'] = 0;


if (isset($_POST['spel'])) {
	$spel = $_POST['spel'];
	if ($spel != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(3);
		header("Location: questions.php?id_theme=3");
	}
}elseif (isset($_POST['geo'])) {
	$geo = $_POST['geo'];
	if ($geo != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(2);
		header("Location: questions.php?id_theme=2");
	}
}elseif (isset($_POST['litt'])) {
	$litt = $_POST['litt'];
	if ($litt != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(7);
		header("Location: questions.php?id_theme=7");
	}
}elseif (isset($_POST['gram'])) {
	$gram = $_POST['gram'];
	if ($gram != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(4);
		header("Location: questions.php?id_theme=4");
	}
}elseif (isset($_POST['hist'])) {
	$hist = $_POST['hist'];
	if ($hist != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(1);
		header("Location: questions.php?id_theme=1");
	}
}elseif (isset($_POST['rand'])) {
	$rand = $_POST['rand'];
	if ($rand != null) {
		$_SESSION['nb_qts_theme'] = $_SESSION['nb_total_qts'];
		header("Location: questions.php?id_theme=99");
	}
}elseif (isset($_POST['verb'])) {
	$verb = $_POST['verb'];
	if ($verb != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(10);
		header("Location: questions.php?id_theme=10");
	}
}elseif (isset($_POST['voc'])) {
	$voc = $_POST['voc'];
	if ($voc != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(6);
		header("Location: questions.php?id_theme=6");
	}
}elseif (isset($_POST['pab'])) {
	$pab = $_POST['pab'];
	if ($pab != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(8);
		header("Location: questions.php?id_theme=8");
	}
}elseif (isset($_POST['scr'])) {
	$scr = $_POST['scr'];
	if ($scr != null) {
		$_SESSION['nb_qts_theme'] = qtsByTheme(9);
		header("Location: questions.php?id_theme=9");
	}
}

function qtsByTheme($id){
	$db;
	try{
	    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
	}catch(Exeception $e){
	    die('Erreur : ' . $e->getMessage());
	}

	$sql = "SELECT count(id) FROM questions WHERE id_theme = ?;";
	$stmt = $db->prepare($sql);
	$stmt->execute(array($id));

	$req = $stmt->fetch();
	return $req[0];
}
?>