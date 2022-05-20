/*
* Name :  Gijs van der Munnik
* Date :   10/04/2022
*
* Formulier pagina Project T3
*/

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Opleiding vragen</title>
        <link rel="icon" href="../Images/favicon.ico">
        <link rel="stylesheet" href="../Styles/stylesheet.css">
        <link rel="stylesheet" href="../Styles/stylesheetform.css">
    </head>
    <body>
        <?php
        include "../Includes/header.php";
        ?>
        <div class="lijn">

        </div>
        <h1 id="acedemy">
            ICT-Academie
        </h1>
        <aside>
            <form action="formulier_uitkomst.php" method="post">
                <p>
                    <label for="question1">Wat is uw naam?</label>
                    <input type="text" name="question1" id="question1" required>
                </p>
                <br>

                <?php
                include "../includes/vragen.php";

                foreach($questions as $questionid => $question) {

                    echo '<p>';
                    echo $question['text'];
                    echo '</p><p>';

                    foreach($question['antwoorden'] as $answerid => $answer) {
                        echo '<input type="radio" name="'.$questionid.'" id="'.$questionid.$answerid.'" value="'.$answerid.'" required>';
                        echo '<label for="'.$questionid.$answerid.'"> ';
                        echo $question['antwoorden'][$answerid]['text'];
                        echo '<br></label>';
                    }
                    echo '</p><br>';
                }

                ?>

                <p>
                    <label for="A49">Heeft u nog iets toe te voegen aan</label>
                    <br>
                    <textarea class="textarea" id="A49" style="resize: none" name="question14" rows="5" cols="50" placeholder="Type hier"></textarea>
                </p>
                <br>
                <p>
                    <label for="A50">Hoe oud bent u?</label>
                    <input class="textarea" type="number" name="question15" id="A50" placeholder="Type hier">
                </p>
                <br>
                <p>
                    <label for="A51">Wat voor beroep doet uw moeder/vader?</label>
                    <input class="textarea" type="text" name="question16" id="A51" placeholder="Type hier">
                </p>
                <br>
                <label for="A52">
                    <input type="checkbox" name="question17" id="A52" value="agreed">
                    Gaat u akkoord met onze voorwaarden en privacy policy?
                    <br>
                    <br>
                <input type="submit" name="verzend" value="Verzenden" id="submitbutton">
            </form>
        </aside>
        <br>
        <?php
        include "../includes/footer.php"
        ?>
    </body>
</html>
