<?php 
session_start();

$db;
try{
    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
    die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT prenom, nom, maxscore, nbparties FROM users ORDER BY maxscore DESC;";

$req = $db->query($sql);

$users = array();
while (($data = $req->fetch()) != null) {
    array_push($users, array($data[0], $data[1], $data[2], $data[3]));
}

$req->closeCursor();
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
<body>
    <p class="centerWhite50">Ranking</p>
    <div>
        <?php for ($i=0; $i < sizeof($users); $i++) { ?>
            <p style="position:relative; left:20%; width:30%">
                <?php echo $users[$i][0]; ?> <?php echo $users[$i][1];?> - <?php echo $users[$i][2]; ?> points - Nombre de parties : <?php echo $users[$i][3]; ?> <hr width="70%"/>
            </p>  
        <?php 
        }
        ?>
    </div>
    <a href="accueil.php" class="button" style="text-align:right;">Return</a>
</body>

