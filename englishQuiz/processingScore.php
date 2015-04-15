<?php 
session_start();
$id_theme = $_GET['id_theme'];
$rep_ok = $_GET['ok'];
$temps = $_GET['tps'];
$score = $_SESSION['score'];

$temp = 0;
$score_rep_ok = 15;
$score_par_sec = 1;
$tps_imparti = 20;

if ($rep_ok == 'true') {
	$temp += $score_rep_ok;
	$temp += (($tps_imparti - $temps)*$score_par_sec)/5;
	$_SESSION['nb_rep_ok']++;
}

$temp *= 100;

$_SESSION['score'] += round($temp);

header("Location: questions.php?id_theme=".$id_theme);


?>