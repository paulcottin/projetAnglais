<?php
$spel = $_POST['spel'];
$geo = $_POST['geo'];
$litt = $_POST['litt'];
$gram = $_POST['gram'];
$hist = $_POST['hist'];
$rand = $_POST['rand'];
$verb = $_POST['verb'];
$voc = $_POST['voc'];
$pab = $_POST['pab'];
$scr = $_POST['scr'];

if ($spel != null) {
	header("Location: questions.php?id_theme=3");
}
if ($geo != null) {
	header("Location: questions.php?id_theme=2");
}
if ($litt != null) {
	header("Location: questions.php?id_theme=7");
}
if ($gram != null) {
	header("Location: questions.php?id_theme=4");
}
if ($hist != null) {
	header("Location: questions.php?id_theme=1");
}
if ($rand != null) {
	header("Location: questions.php?id_theme=99");
}
if ($verb != null) {
	header("Location: questions.php?id_theme=10");
}
if ($voc != null) {
	header("Location: questions.php?id_theme=6");
}
if ($pab != null) {
	header("Location: questions.php?id_theme=8");
}
if ($scr != null) {
	header("Location: questions.php?id_theme=9");
}


?>