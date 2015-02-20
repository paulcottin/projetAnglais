<!DOCTYPE html>
<?php session_start(); 
$id_theme = $_GET['id_theme'];

if (!isset($_SESSION['qts_posees'])) {
  $_SESSION['qts_posees'] = array();
} 

if (!isset($_SESSION['nb_qts_posees'])) {
    $_SESSION['nb_qts_posees'] = 0;
}

if ($_SESSION['nb_qts_posees'] > 20) {
    header("Location: resultat.php");
}

$db;
try{
    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
    die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT count(id) FROM questions";

$req = $db->query($sql);

$nb_qts = $req->fetch()[0];
$nb_qts = $nb_qts + 0;  //Conversion en int



$req->closeCursor();

//Tant qu'on a pas trouvé une question qui n'a pas déjà été posée on change de question
$i=0;
do{
    $i++;
    $id_qt = rand(1, $nb_qts);
    if ($i > 1000*$nb_qts) {
        echo "probleme";
        session_unset();    
    }
}while(array_search($id_qt, $_SESSION['qts_posees']) != FALSE);



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
            var temps = 10;
            var aRepondu = 0;

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
                //else
                    //alert("Chargement Termine! Vous pourriez ensuite envisager d'utiliser une iframe pour afficher votre site ...");
            }

            function verif(id){
                var object = document.getElementById(id);
                var chaine = '<?php echo $reponses[0]; ?>';
                if (aRepondu == 0) {
                    if(object.value == chaine){
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
        </script>
    </head>
    <body onload="progression(temps)">
        <noscript class="cadre">Vous devez activer le Javascript pour pouvoir visiter ce site !</noscript>
        <body>
        <div class="align">
            <div class="question">
                <p style= "margin:auto">
                    <?php echo $question; ?>
                </p>
            </div>
                <div>
                    <input id="rep1" type="submit" class="questionButton" name="rep1" value="<?php echo $rep1; ?>" onClick="verif('rep1');"/>
                    <input id="rep2" type="submit" class="questionButton" name="rep2" value="<?php echo $rep2; ?>" onClick="verif('rep2');"/></br>
                </div>
                <div>
                    <input id="rep3" type="submit" class="questionButton" name="rep3" value="<?php echo $rep3; ?>" onClick="verif('rep3');"/>
                    <input id="rep4" type="submit" class="questionButton" name="rep4" value="<?php echo $rep4; ?>" onClick="verif('rep4');"/>
                </div>
            </div>
        </body>
        <div class="cadre" id="cadre">
            <div id="barre">
                <span class="texte" id="pourcentage"></span>
            </div>
        </div>
    </body>

</html>