<!DOCTYPE html>
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
    <script type="text/javascript">
    var ok = 1

    function check() {
        var qtBox = document.getElementById('questionBox');
        var list = document.getElementById('theme');
        var rep1 = document.getElementById('rep1');
        var rep2 = document.getElementById('rep2');
        var rep3 = document.getElementById('rep3');
        var rep4 = document.getElementById('rep4');

        if (qtBox.value == "") {
            ok = 0;
            alert('Thanks to fill the question')
        }
        if (list.value == "default") {ok = 0;
            alert('Thanks to fill the theme')
        }
        if (rep1.value == "") {ok = 0;
            alert('Thanks to fill the 1st response')
        }
        if (rep2.value == "") {ok = 0;
            alert('Thanks to fill the 2nd response')
        }
        if (rep3.value == "") {ok = 0;
            alert('Thanks to fill the 3rd response')
        }
        if (rep4.value == "") {ok = 0;
            alert('Thanks to fill the 4th response')
        }
        if (ok == 1)
            return true;
        else
            return false;
    }

    function cancel () {
        document.location.href = "accueil.php";
    }
    </script>
    <body>
        <p class="centerWhite70">English Quiz</p>
        <p class="align40">Add a question</p>
        <div>
            <form method="post" action="processingAddQt.php" onsubmit="return check()">
                <span style="float:left">
                    <p class="text20">Question :</p>
                    <textarea type="message" name="question" id="questionBox" rows="10" cols="50"></textarea><br/>
                    <button type="button" class="button" style="text-align:right" onClick="cancel();">Cancel</button>
                    <input type="submit" class="button" style="text-align:right" name="submit" value="Submit"/>
                </span>
                <span style="float:center">
                       <label for="theme" class="text20">Thema ?</label><br />
                       <select name="theme" id="theme">
                            <option value="default" selected>--</option>
                            <option value="Geography">Geography</option>
                            <option value="Grammar">Grammar</option>
                            <option value="History">History</option>
                            <option value="Literature">Literature</option>
                            <option value="Politics and business">Politics and business</option>
                            <option value="Series/Cinema/Music">Series/Cinema/Music</option>
                            <option value="Spelling">Spelling</option>  
                            <option value="Verbs">Verbs</option>
                            <option value="Vocabulary">Vocabulary</option>
                        </select>
                </span>
                <span style="float:right;vertical-alignement:top">
                        <p class="text20">Answers :</p>
                        <input type="text" class="questionButton" id="rep1" name="rep1" placeholder="true answer"/>
                        <input type="text" class="questionButton" id="rep2" name="rep2" placeholder="false answer"/>
                        <br/>
                        <div>
                            <input type="text" class="questionButton" id="rep3" name="rep3" placeholder="false answer"/>
                            <input type="text" class="questionButton" id="rep4" name="rep4" placeholder="false answer"/>
                        </div>
                </span>
            </form>
        </div>
    </body>
</html>