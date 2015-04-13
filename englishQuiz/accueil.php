<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
        <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></p>
        <?php } else {?>
        <a style="text-align:right" href="connexion.php">Connexion</a>
        <?php } ?>
    </head>
    <body>
    <p class="centerWhite70">English Quiz</p>
        <div class="align">
            <a href="Theme.php" class="button" name="choix" style="text-decoration:none; margin:5%">Play </a> <br/><br/>
            <a href="rank.php" class="button" name="choix" style="text-decoration:none">Rank </a> <br/><br/>
            <a href="ajoutQuestion.php" class="button" name="choix" style="text-decoration:none">Submit a question </a> <br/>
        </div>
    </body>
</html>