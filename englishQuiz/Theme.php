<!DOCTYPE html>
<?php 
session_start();
$_SESSION['score'] = 0;
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Choose your theme</title>
        <?php if(isset($_SESSION['prenom'])) { ?>
        <p style="text-align:right"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></p>
        <?php } ?>
    </head>
    <body>
    <p class="centerWhite70">Choose your theme</p>
    </head>
        <body>
        <form class="align" method="post" action="processingChooseTheme.php">
            <div>
                <input type="submit" class="questionButton" name="spel" value="Spelling" style="background:#FA58F4"/>
               
                <input type="submit" class="questionButton" name="geo" value="Geography" style="background:#BEA481"/>
                <input type="submit" class="questionButton" name="litt" value="Literature" style="background:#58ACFA"/></br>
            </div>
            <div>
                <input type="submit" class="questionButton" name="gram" value="Grammar" style="background:#848484"/>
                 <input type="submit" class="questionButton" name="hist" value="History" style="background:#04B404"/>
                <input type="submit" class="questionButton" name="rand" value="Random" style="background:-webkit-gradient(linear, left top, right bottom, color-stop(0.05,#FA58F4), color-stop(0.15, #04B404), color-stop(0.25,#FE642E), color-stop(0.40, #848484), color-stop(0.54,#58ACFA), color-stop(0.6, #FAAC58), color-stop(0.75,#DF013A), color-stop(0.82, #D7DF01), color-stop(0.95,#BEA481))"/>
                <input type="submit" class="questionButton" name="verb" value="Verbs" style="background:#FE642E"/></br>
            </div>
            <div>
                <input type="submit" class="questionButton" name="voc" value="Vocabulary" style="background:#FAAC58"/>
                <input type="submit" class="questionButton" name="pab" value="Politic and Business" style="background:#D7DF01"/>
                <input type="submit" class="questionButton" name="scr" value="Screen" style="background:#DF013A"/></br>
            </div>
        </form>
        </body>
    </body>

</html>