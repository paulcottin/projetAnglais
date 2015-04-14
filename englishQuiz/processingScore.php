<?php 
session_start();
$id_theme = $_GET['id_theme'];
$rep_ok = $_GET['ok'];
$temps = $_GET['tps'];
$score = $_SESSION['score'];

$score_rep_ok = 15;
$score_par_sec = 1;
$tps_imparti = 20;

if ($rep_ok == 'true') {
	$score += $score_rep_ok;
	$score += (($tps_imparti - $temps)*$score_par_sec)/5;
	$_SESSION['nb_rep_ok']++;
}

$_SESSION['score'] = round($score);

header("Location: questions.php?id_theme=".$id_theme);


?>