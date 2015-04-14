<?php
session_start();

$db;
try{
	$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
	die('Erreur : ' . $e->getMessage());
}

$nbparties = getNbParties();
$max = getMax();
$maxTheme = array();
$nbQtsProp = getNbQtsProp();
$rang = 0;

$themes = array(
	1 => "History",
	2 => "Geography",
	3 => "Spelling",
	4 => "Grammar",
	5 => "Conjugaison",
	6 => "Vocabulary",
	7 => "Literature",
	8 => "Politic and Business",
	9 => "Series/Cinema/Music",
	10 => "Random"
	)

?>

<html>
 <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
        <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></p>
        <a href="processingConnexion.php?login=0" style="text-align:right">Déconnexion</a>
        <?php } else {?>
        <a style="text-align:right" href="connexion.php">Connexion</a>
        <?php } ?>
    </head>
    <body>
    	<p class="centerWhite70">My profile</p>
    	<p class="text20">
    		Max score : <?php echo($max); ?><br/>
    		Number of played party : <?php echo($nbparties); ?> <br/>
    		Number of played party in mode : <br/>
    		<?php for ($i=1; $i < count($themes)+1; $i++) { 
    		?> &nbsp;&nbsp;	<?php echo $themes[$i]; ?> : <?php echo(getNbPartiesByTheme($i)); ?><br/>
    		<?php
    		}
    		?>
    		Number of questions given : <?php echo($nbQtsProp); ?> <br/>
    	</p>
    </body>
</html>

<?php





function getMax(){
	$sql = "SELECT score FROM statistics WHERE id_user=?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id']));

	$max = 0;
	$data;
	while(($data = $stmt->fetch()) != null){
		$current = $data[0];
		if ($current > $max) {
			$max = $current;
		}
	}

	$stmt->closeCursor();

	return $max;
}

function getNbParties(){
	$sql = "SELECT count(id) FROM statistics;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute();

	$data = $stmt->fetch();

	$stmt->closeCursor();

	return $data[0];
}

function getNbQtsProp(){
	$sql = "SELECT nbQts FROM users WHERE id=?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id']));

	$data = $stmt->fetch();

	$stmt->closeCursor();

	return $data[0];
}

function getNbPartiesByTheme($id){
	if ($id == 10) {
		$id = 99;
	}

	$sql = "SELECT count(id) FROM statistics WHERE theme = ?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($id));

	$data = $stmt->fetch();

	$stmt->closeCursor();

	return $data[0];
}

?>