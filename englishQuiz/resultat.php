<!DOCTYPE html>
<?php 
if (isset($_SESSION['nb_qts_posees'])) {
	session_unset($_SESSION['nb_qts_posees']);
}
if (isset($_SESSION['qts_posees'])) {
	session_unset($_SESSION['qts_posees']);
}

echo $_SESSION['score'];
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
			    <p class="centerWhite50"><?php echo $_SESSION['score']; ?>/20</p>
			    <?php 	if ($_SESSION['score'] <= 4){
			    			?> 
			    			<p class="centerWhite50">Not very good...</p>
			    			<?php 
						}
						if ($_SESSION['score'] > 4 && $_SESSION['score'] <= 8){
							?> 
					    	<p class="centerWhite50">You still have to progress</p>
							<?php 
						}
						if ($_SESSION['score'] > 8 && $_SESSION['score'] <= 12){
							?> 
					    	<p class="centerWhite50">Not so bad</p>
					    	<?php 
						}
						if ($_SESSION['score'] > 12 && $_SESSION['score'] <= 16){
					    	?> 
					    	<p class="centerWhite50">Good !</p>
					    	<?php 
						}
						if ($_SESSION['score'] > 16 && $_SESSION['score'] < 20){
					    	?> 
					    	<p class="centerWhite50">Excellent !!!</p>
					    	<?php 
						}

						if (isset($_SESSION['id'])) {
								$db;
							try{
								$db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
							}catch(Exeception $e){
								die('Erreur : ' . $e->getMessage());
							}
							$sql = "SELECT maxscore FROM users WHERE id=?";
							$stmt = $db->prepare($sql);
							$stmt->execute(array($_SESSION['id']));

							$max_score = $stmt->fetch()[0];

							$stmt = null;

							if ($_SESSION['score'] > $max_score) {
								$sql = "UPDATE users SET maxscore = ? WHERE id = ?";
								$stmt = $db->prepare($sql);
								$stmt->execute(array($_SESSION['score'], $_SESSION['id']));
								?> <p class="text20">Félicitation, nouveau meilleur score !!</p> 
								<?php  
							}
						}

						?>


    <div class= "align">
    <a href="accueil.php" class="button" name="choix" style="text-decoration:none; margin:5%">Home</a>
       	</div>
    </body>
</html>