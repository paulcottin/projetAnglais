<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
            <script type="text/javascript">
            var i=0;
            var temps = 10;
            function progression(timer){
                if(i<=parseInt(document.getElementById('cadre').clientHeight)){
                    var compteur=0;
                    document.getElementById("barre").style.height= i+"px";
                    while(compteur<=100)
                        compteur++;
                    if(i>40)
                        document.getElementById("pourcentage").innerHTML=parseInt(i/(parseInt(document.getElementById('cadre').clientHeight)/100))+"%";
                    setTimeout("progression(temps);", timer);
                    i++;   
                }
                else
                    alert("Chargement Termine! Vous pourriez ensuite envisager d'utiliser une iframe pour afficher votre site ...");
            }
        </script>
    </head>
    <body onload="progression(temps)">
        <noscript class="cadre">Vous devez activer le Javascript pour pouvoir visiter ce site !</noscript>
        <body>
    <p class="centerWhite70">English Quiz</p>
        <div class="align">
            <input type="button" class="button" name="choix" value="Jouer"/><br/>
            <input type="button" class="button" name="choix" value="Classement"/><br/>
            <input type="button" class="button" name="choix" value="Proposer une question"/><br/>
        </div>
    </body>
        <div class="cadre" id="cadre">
            <div id="barre">
                <span class="texte" id="pourcentage"></span>
            </div>
        </div>
    </body>

</html>