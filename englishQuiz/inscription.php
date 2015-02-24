<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
    </head>
    <script type="text/javascript">

    var ok = 1;

    function validateEmail(email) { 
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	} 

    function check() {
        var prenom = document.getElementById('prenom');
        var nom = document.getElementById('nom');
        var email = document.getElementById('email');

        if (prenom.value == "") {
            ok = 0;
            alert('Thanks to fill the first name field')
        }
        if (nom.value == "") {ok = 0;
            alert('Thanks to fill the last name field')
        }
        if (email.value == "" && !validateEmail(email.value)) {ok = 0;
            alert('Thanks to fill the email field')
        }
        if (ok == 1)
            return true;
        else
            return false;
    }


    </script>
    <body>
    	<?php if (!isset($_GET['error'])) { ?>
    	<form method="post" action="processingInscription.php" onsubmit="return check()">
                    <p class="align40">Inscription</p>
                    <input type="text" name="prenom" id="prenom" placeholder="First name"></input><br/>
                    <input type="text" name="nom" id="nom" placeholder="Last name" ></input><br/>
                    <input type="text" name="email" id="email" placeholder="Email"></input><br/>
                    <input type="password" name="mdp" id="mdp" placeholder="Password"></input><br/>
                    <input type="submit" class="button" style="text-align:right" name="submit" value="Submit"/>
            </form>
            <?php } elseif (isset($_GET['error'])) { 
            			if ($_GET['error'] == 1) { ?>
            	<p class="text20">Vous êtes déjà enregistré</p>
            	<a href="connexion.php" id="lienConnexion">Se connecter</a>
            <?php }} ?>
    </body>
</html>