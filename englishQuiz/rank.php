<?php 
session_start();

$db;
try{
    $db = new PDO('mysql:host=localhost;dbname=anglais', 'root', '');
}catch(Exeception $e){
    die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT id, prenom, nom FROM users;";

$req = $db->query($sql);

$users = array();
while (($data = $req->fetch()) != null) {
    array_push($users, array($data[1], $data[2], getMax($data[0]), getNbParties($data[0])));
}

foreach ($users as $key => $row) {
    $points[$key]  = $row[3];
}

array_multisort($points, SORT_DESC, $users);

$req->closeCursor();
?>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>English Quiz</title>
</head>

<body>
<?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> <br/>
        <a href="processingConnexion.php?login=0" style="color:white">Déconnexion</a>
        </p>
        <?php } else {?>
        <p style="text-align:right;">
            <a style="color:white;" href="connexion.php">Connexion</a>
        </p>
        <?php } ?>
<p class="centerWhite70">English Quiz</p>
    <p class="centerWhite40">Ranking</p>
    <div>
        <?php for ($i=0; $i < sizeof($users); $i++) { ?>
            <p style="position:relative; left:20%; width:70%">
               <?php echo(($i+1).". "); ?> &nbsp;&nbsp;&nbsp; <?php echo $users[$i][0]; ?> <?php echo $users[$i][1];?> - <?php echo $users[$i][2]; ?> points - Nombre de parties : <?php echo $users[$i][3]; ?> <hr width="70%"/>
            </p>  
        <?php 
        }
        ?>
    </div>
    <p style="text-align:center">
        <a href="accueil.php" class="button">Return</a>
    </p>
</body>
</html>

<?php
function getMax($id){
    $sql = "SELECT score FROM statistics WHERE id_user=?;";
    $stmt = $GLOBALS['db']->prepare($sql);
    $stmt->execute(array($id));

    $max = 0;
    $data;
    while(($data = $stmt->fetch()) != null){
        $current = $data[0];
        if ($current > $max) {
            $max = $current;
        }
    }

    $stmt->closeCursor();

    return $max;
}

function getNbParties($id){
    $sql = "SELECT count(id) FROM statistics WHERE id_user=?;";
    $stmt = $GLOBALS['db']->prepare($sql);
    $stmt->execute(array($id));

    $data = $stmt->fetch();

    $stmt->closeCursor();

    return $data[0];
}
?>
