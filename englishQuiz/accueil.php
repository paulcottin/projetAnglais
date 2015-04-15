<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
        <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> <br/>
        <a href="processingConnexion.php?login=0" style="color:white">Déconnexion</a>
        </p>
        <?php } else {?>
        <p style="text-align:right;">
            <a style="color:white;" href="connexion.php">Connexion</a>
        </p>
        <?php } ?>
    </head>
    <script type="text/javascript">
        var connected = "<?php echo isset($_SESSION['prenom']); ?>";


        function redirectSubmit(){
            if (connected == "1") {
                document.location.href = "ajoutQuestion.php";
            }
            else
                alert('You have to be connected !');
        }
    </script>
    <body>
    <p class="centerWhite70">English Quiz</p>
        <div class="align">
            <a href="Theme.php" class="button" name="choix" style="text-decoration:none; margin:5%">Play </a> <br/><br/>
            <a href="rank.php" class="button" name="choix" style="text-decoration:none">Rank </a> <br/><br/>
            <?php 
                if (isset($_SESSION['id'])) {
                    ?>
                        <a href="profil.php" class="button" name="choix" style="text-decoration:none">My profile </a> <br/><br/>
                    <?php
                }
            ?>
            <a class="button" name="choix" style="text-decoration:none" onclick="redirectSubmit();">Submit a question </a> <br/>
        </div>
    </body>
</html>