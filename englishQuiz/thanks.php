<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
        <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></p>
        <?php } ?>
    </head>
    <body>
    <p class="centerWhite70">English Quiz</p>
    <p class="centerWhite70">
        Thanks for your question !
    </p>
    <p>
    <a href="accueil.php" style="color:white;text-align:center">Go back home</a>
    <a href="ajoutQuestion.php" style="color:white;text-align:center">Add another one</a>
    </p>
    </body>
</html>