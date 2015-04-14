<?php 
session_start();

$nbRepOk = 0;
if ($_SESSION['nb_qts_posees'] >= $_SESSION['nb_qts_theme']-1) {
	$nbRepOk = 20*$_SESSION['nb_rep_ok']/($_SESSION['nb_qts_theme']-1);
}
else{
	$nbRepOk = $_SESSION['nb_rep_ok'];
}
?>

<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
    </head>
    <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></p>
    <?php } ?>
    <body>
    <p class="centerWhite70">English Quiz</p>
	<head>
    	<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
			    <p class="centerWhite50"><?php echo($nbRepOk); ?>/20</p>
			    <p class="align40">Score : <?php echo $_SESSION['score']; ?></p>
			    <?php 	if ($nbRepOk <= 4){
			    			?> 
			    			<p class="centerWhite50">Not very good...</p>
			    			<?php 
						}
						if ($nbRepOk > 4 && $nbRepOk <= 8){
							?> 
					    	<p class="centerWhite50">You still have to progress</p>
							<?php 
						}
						if ($nbRepOk > 8 && $nbRepOk <= 12){
							?> 
					    	<p class="centerWhite50">Not so bad</p>
					    	<?php 
						}
						if ($nbRepOk > 12 && $nbRepOk <= 16){
					    	?> 
					    	<p class="centerWhite50">Good !</p>
					    	<?php 
						}
						if ($nbRepOk > 16 && $nbRepOk <= 20){
					    	?> 
					    	<p class="centerWhite50">Excellent !!!</p>
					    	<?php 
						}

						if (isset($_SESSION['id'])) {
							//Vérification si c'est un nouveau score max
							if ($_SESSION['score'] > getMaxScore()) {
								?> 
								<p class="text20">Félicitation, nouveau meilleur score !!</p> 
								<?php  
							}

							//Incrémentation du nombre de parties jouées
							$db;
							try{
								$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
							}catch(Exeception $e){
								die('Erreur : ' . $e->getMessage());
							}
							$id = $_SESSION['id'];
							$score = $_SESSION['score'];
							$id_theme = $_SESSION['id_theme'];
							$sql = "INSERT INTO statistics VALUES (null, ?, ?, ?);";
							$stmt = $db->prepare($sql);
							$stmt->execute(array($id, $score, $id_theme));
							$stmt->closeCursor();
						}

						?>


    <div class= "align">
    <a href="accueil.php" class="button" name="choix" style="text-decoration:none; margin:5%">Home</a>
       	</div>
    </body>
</html>

<?php

function getMaxScore(){
	$db;
	try{
		$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
	}catch(Exeception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$sql = "SELECT score FROM statistics WHERE id_user=?;";
	$stmt = $db->prepare($sql);
	$stmt->execute(array($_SESSION['id']));

	$max = 0;
	$data;
	while(($data = $stmt->fetch()) != null){
		$current = $data[0];
		if ($current > $max) {
			$max = $current;
		}
	}

	return $max;
}
?>