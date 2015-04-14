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
$rang = getClassement();

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
		<div >
			<p class="text20" style="text-align:center">
				Ranking : <?php echo($rang); ?> - 
				Max score : <?php echo($max); ?> - 
				Number of played party : <?php echo($nbparties); ?> - 
				Number of questions given : <?php echo($nbQtsProp); ?>
			</p>
		</div>    
    	<div align="center">
    		<table>
    			<tr>
    				<td class="tableTitle">Thema</td>
    				<td class="tableTitle">Number of parties</td>
    				<td class="tableTitle">Max score</td>
    				<td class="tableTitle">Moy score</td>
    			</tr>
    			<?php for ($i=1; $i < count($themes)+1; $i++) { 
    				?>
    				<tr>
    					<td><?php echo $themes[$i]; ?></td>
    					<td class="tableItem"><?php echo(getNbPartiesByTheme($i)); ?></td>
    					<td class="tableItem"><?php echo(getMaxByTheme($i)); ?></td>
    					<td class="tableItem"><?php echo getMoyBytheme($i); ?></td>
    				</tr>
    			<?php } ?>
    		</table>
    	</div>
    	<a href="accueil.php" class="button" align="center">Return</a>
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
	$sql = "SELECT count(id) FROM statistics WHERE id_user=?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id']));

	$data = $stmt->fetch();

	$stmt->closeCursor();

	return $data[0];
}

function getNbQtsProp(){
	$sql = "SELECT nbQts FROM users WHERE id=? ;";
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

	$sql = "SELECT count(id) FROM statistics WHERE theme = ? AND id_user = ?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($id, $_SESSION['id']));

	$data = $stmt->fetch();

	$stmt->closeCursor();

	return $data[0];
}

function getMaxByTheme($id){
	if ($id == 10) {
		$id = 99;
	}
	$sql = "SELECT score FROM statistics WHERE id_user=? AND theme = ?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id'], $id));

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

function getMoyBytheme($id){
	if ($id == 10) {
		$id = 99;
	}
	$sql = "SELECT score FROM statistics WHERE id_user=? AND theme = ?;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id'], $id));

	$somme = 0;
	$cpt = 0;
	$data;
	while(($data = $stmt->fetch()) != null){
		$somme += $data[0];
		$cpt++;
	}

	$stmt->closeCursor();

	if ($cpt == 0) {
		return 0;
	}else{
		return $somme/$cpt;
	}
}

function getClassement(){
	$sql = "SELECT DISTINCT id_user FROM statistics WHERE id_user = ? ORDER BY score DESC;";
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->execute(array($_SESSION['id']));

	$cpt = 0;
	$rank = 1;
	while(($data = $stmt->fetch()) != null){
		$cpt++;
		if ($data[0] == $_SESSION['id']) {
			$rank = $cpt;
		}
	}	

	$res = "";
	switch ($rank) {
		case 1:
			$res = "1 st";
			break;
		case 2:
			$res = "2 nd";
			break;
		case 3:
			$res = "3 rd";
			break;
		default:
			$res = $rank." th";
			break;
	}

	return $res;
}

?>