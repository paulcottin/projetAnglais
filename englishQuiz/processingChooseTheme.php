<?php
if (isset($_POST['spel'])) {
	$spel = $_POST['spel'];
	if ($spel != null) {
		header("Location: questions.php?id_theme=3");
	}
}elseif (isset($_POST['geo'])) {
	$geo = $_POST['geo'];
	if ($geo != null) {
		header("Location: questions.php?id_theme=2");
	}
}elseif (isset($_POST['litt'])) {
	$litt = $_POST['litt'];
	if ($litt != null) {
		header("Location: questions.php?id_theme=7");
	}
}elseif (isset($_POST['gram'])) {
	$gram = $_POST['gram'];
	if ($gram != null) {
		header("Location: questions.php?id_theme=4");
	}
}elseif (isset($_POST['hist'])) {
	$hist = $_POST['hist'];
	if ($hist != null) {
		header("Location: questions.php?id_theme=1");
	}
}elseif (isset($_POST['rand'])) {
	$rand = $_POST['rand'];
	if ($rand != null) {
		header("Location: questions.php?id_theme=99");
	}
}elseif (isset($_POST['verb'])) {
	$verb = $_POST['verb'];
	if ($verb != null) {
		header("Location: questions.php?id_theme=10");
	}
}elseif (isset($_POST['voc'])) {
	$voc = $_POST['voc'];
	if ($voc != null) {
		header("Location: questions.php?id_theme=6");
	}
}elseif (isset($_POST['pab'])) {
	$pab = $_POST['pab'];
	if ($pab != null) {
		header("Location: questions.php?id_theme=8");
	}
}elseif (isset($_POST['scr'])) {
	$scr = $_POST['scr'];
	if ($scr != null) {
		header("Location: questions.php?id_theme=9");
	}
}
?>