<!DOCTYPE html>
<?php session_start();
if (isset($_SESSION['nb_qts_posees'])) {
	session_unset($_SESSION['nb_qts_posees']);
}
if (isset($_SESSION['qts_posees'])) {
	session_unset($_SESSION['qts_posees']);
}

$_SESSION['score'] = 0
?>

<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
    </head>
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
						?>


    <div class= "align">
    <a href="accueil.php" class="button" name="choix" style="text-decoration:none; margin:5%">Home</a>
       	</div>
    </body>
</html>