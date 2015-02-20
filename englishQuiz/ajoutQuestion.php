<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>English Quiz</title>
    </head>
    <body>
        <p class="centerWhite70">English Quiz</p>
        <p class="align40">Add a question</p>
        <div>
            <form method="post" action="processingAddQt.php">
                <span style="float:left">
                    <p class="text20">Question :</p>
                    <textarea type="message" name="question" id="questionBox" rows="10" cols="50"></textarea><br/>
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
                        <p class="text20">answers :</p>
                        <input type="text" class="questionButton" name="rep1" placeholder="true answer"/>
                        <input type="text" class="questionButton" name="rep2" placeholder="false answer"/>
                        <br/>
                        <div>
                            <input type="text" class="questionButton" name="rep3" placeholder="false answer"/>
                            <input type="text" class="questionButton" name="rep4" placeholder="false answer"/>
                        </div>
                </span>
            </form>
        </div>
    </body>
</html>