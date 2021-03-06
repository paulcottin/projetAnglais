<?php
session_start();
$id_theme = $_GET['id_theme'];
$_SESSION['id_theme'] = $id_theme;

if (!isset($_SESSION['qts_posees'])) {
  $_SESSION['qts_posees'] = array();
} 

if (!isset($_SESSION['nb_qts_posees'])) {
    $_SESSION['nb_qts_posees'] = 0;
}

if ($_SESSION['nb_qts_posees'] > 20 || $_SESSION['nb_qts_posees'] >= $_SESSION['nb_qts_theme']-1) {
    header("Location: resultat.php");
}

$db;
try{
    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
    die('Erreur : ' . $e->getMessage());
}

//Si on est en mode random, nb total de qts, sinon nb de qts ds theme
if ($id_theme == 99) {
    $nb_qts = $_SESSION['nb_total_qts'];
}
else{
    $sql = "SELECT count(id) FROM questions WHERE id_theme='$id_theme'";

    $req = $db->query($sql);

    $nb_qts = $req->fetch()[0];
    $nb_qts = $nb_qts + 0;  //Conversion en int

    $req->closeCursor();
}

//On récupère tous les id de qts de cette catégorie (toutes les qts si random)
if ($id_theme == 99) {
    $sql = "SELECT id FROM questions;";
}
else {
    $sql = "SELECT id FROM questions WHERE id_theme='$id_theme'";
}

$req = $db->query($sql);


$qts_theme = array();
    while (($id_qt = $req->fetch()) != null) {
       // echo "_".$id_qt[0]."<br/>";
        array_push($qts_theme, $id_qt[0]);
    }
$req->closeCursor();

//Tant qu'on a pas trouvé une question qui n'a pas déjà été posée on change de question dans cette catégorie
$i=0;
do{
    $i++;
    $id_qt = rand(0, count($qts_theme)-1);
    $id_qt = $qts_theme[$id_qt];
    if ($i > 1000*$nb_qts) {
        echo "erreur, pas de questions non posées trouvées";
        session_unset();  
    }
}while(in_array($id_qt, $_SESSION['qts_posees']) != FALSE);

array_push($_SESSION['qts_posees'], $id_qt);
$_SESSION['nb_qts_posees']++;

$sql = "SELECT * FROM questions WHERE id='$id_qt'";

$req = $db->query($sql);

$data = $req->fetch();
$question = $data['question'];
$true = $data['rep1'];
$false1 = $data['rep2'];
$false2 = $data['rep3'];
$false3 = $data['rep4'];

$reponses = array(0=>$true, 1=>$false1, 2=>$false2, 3=>$false3);
$i = rand(0,3);
$rep1 = $reponses[$i];
$rep2 = $reponses[($i+1)%4];
$rep3 = $reponses[($i+2)%4];
$rep4 = $reponses[($i+3)%4];

?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
            <script type="text/javascript">

            var i=0;
            var temps = 50; //50
            var aRepondu = 0;
            var chaine = '<?php echo $reponses[0]; ?>';
            var resultat = 0;

            function progression(timer){
                if(i<=parseInt(document.getElementById('cadre').clientHeight)){
                    var compteur=0;
                    document.getElementById("barre").style.height= i+"px";
                    while(compteur<=100){
                        compteur++;
                        if (aRepondu != 0) {return;};
                    }
                    if(i>40)
                        document.getElementById("pourcentage").innerHTML=parseInt(i/(parseInt(document.getElementById('cadre').clientHeight)/100))+"%";
                    setTimeout("progression(temps);", timer);
                    i++;   
                }
                else{
                    aRepondu = 1;
                    if (document.getElementById('rep1').value == chaine) {document.getElementById('rep1').style.backgroundColor="#00FF33";}
                    if (document.getElementById('rep2').value == chaine) {document.getElementById('rep2').style.backgroundColor="#00FF33";}
                    if (document.getElementById('rep3').value == chaine) {document.getElementById('rep3').style.backgroundColor="#00FF33";}
                    if (document.getElementById('rep4').value == chaine) {document.getElementById('rep4').style.backgroundColor="#00FF33";}
                }
            }

            function verif(id){
                var object = document.getElementById(id);
                if (aRepondu == 0) {
                    if(object.value == chaine){
                        resultat = 1
                        object.style.backgroundColor="#00FF33";
                       /* document.location.href="questions.php?id_theme=<?php echo $id_theme; ?>"; */
                    }else{
                        object.style.backgroundColor="#FF1500";
                        if (document.getElementById('rep1').value == chaine) {document.getElementById('rep1').style.backgroundColor="#00FF33";}
                        if (document.getElementById('rep2').value == chaine) {document.getElementById('rep2').style.backgroundColor="#00FF33";}
                        if (document.getElementById('rep3').value == chaine) {document.getElementById('rep3').style.backgroundColor="#00FF33";}
                        if (document.getElementById('rep4').value == chaine) {document.getElementById('rep4').style.backgroundColor="#00FF33";}
                    }
                    aRepondu = 1;
                }
            }

            function setLink() {
                var tps = i/401*20; //401 : maximum de i, 20 : 20sec
                if (resultat == 1) 
                document.getElementById('submitButton').href = 'processingScore.php?id_theme=<?php echo($id_theme); ?>&ok=true&tps='+tps;
                else
                document.getElementById('submitButton').href = 'processingScore.php?id_theme=<?php echo($id_theme); ?>&ok=false&tps='+i; //ici on se moque du temps
            }

        </script>
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
    <body onload="progression(temps)">
        <noscript class="cadre">Vous devez activer le Javascript pour pouvoir visiter ce site !</noscript>
        <p>Score<br/><?php echo $_SESSION['score']; ?> / 40 000 </p>
        <p><?php echo $_SESSION['nb_qts_posees']; ?>/20 </p>
        <span style="position:absolute; left:25%; top:2%">
            <div>
                <div class="align">
                    <div class="question">
                        <p style= "margin:auto">
                            <?php echo $question; ?>
                        </p>
                    </div>
                </div>
                <div>
                    <div>
                        <input id="rep1" type="submit" class="questionButton" name="rep1" value="<?php echo $rep1; ?>" onClick="verif('rep1');"/>
                        <input id="rep2" type="submit" class="questionButton" name="rep2" value="<?php echo $rep2; ?>" onClick="verif('rep2');"/>
                    </div>
                    </br>
                    <div>
                        <input id="rep3" type="submit" class="questionButton" name="rep3" value="<?php echo $rep3; ?>" onClick="verif('rep3');"/>
                        <input id="rep4" type="submit" class="questionButton" name="rep4" value="<?php echo $rep4; ?>" onClick="verif('rep4');"/>
                    </div>
                </div>
            </div>
        </span>
        
        <span class="cadre" id="cadre" style="position:absolute; right:12%; top:15%">
            <div id="barre">
                <span class="texte" id="pourcentage"></span>
            </div>
        </span>
        <div>
            <a id="submitButton" href="" style="position:absolute; right:13%; bottom:5%;" class="button" onclick="setLink()">Next</a>
        </div>
    </body>
</html>