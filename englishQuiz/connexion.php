<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
    </head>
    <body>
    	<form method="post" action="processingConnexion.php" onsubmit="return check()">
                    <p class="align40">Connexion</p>
                    <input type="text" name="email" id="email" placeholder="Email"></input><br/>
                    <input type="password" name="mdp" id="mdp" placeholder="Password"></input><br/>
                    <input type="submit" class="button" style="text-align:right" name="submit" value="Connect"/>
            </form>
            <?php if (isset($_GET['error'])) { 
            			if ($_GET['error'] == 1) { ?>
            	<p class="text20">Le nom d'utilisateur ou le mot de passe est incorrect</p>
            	<a href="accueil.php" class="text20">Retour à l'accueil</a> <br/>
            	<a href="inscription.php" class="text20">S'inscrire</a>
            <?php }} ?>
    </body>
</html>