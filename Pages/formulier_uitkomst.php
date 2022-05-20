/*
* Name : Gijs van der Munnik
* Date :   17/04/2022
*
* resultaten pagina project 3
*/

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KW1C</title>
    <link rel="icon" href="../Images/favicon.ico">
    <link rel="stylesheet" href="../Styles\stylesheet.css">
    <link rel="stylesheet" href="../Styles\stylesheetform.css">
</head>
<body>
<?php
include "..//Includes/header.php";
?>
<div class="lijn">

</div>
<h1 id="acedemy">
    ICT-Academie
</h1>
    <main>

<?php
include "../includes/vragen.php";
date_default_timezone_set("europe/amsterdam");
$h = date('G');
echo date("d-m-Y H:i") . "<br>";
if($h>=6 && $h<=11)
{
    echo "Goedemorgen ";
}
else if($h>=12 && $h<=17)
{
    echo "Goedemiddag ";
}
else
{
    echo "Goedenavond ";
}
echo $_POST['question1'];

$score = 0;
$maximumscore = 0;
$minimumscore = 0;
$ten = 0;
$twenty = 0;
$thirty = 0;
$forty = 0;

foreach($_POST as $questionid => $answerid )
{
    if (str_starts_with($questionid,'vr')) {
        $vraagscore = $questions[$questionid]['antwoorden'][$answerid]['score'];

        $minimumscore += 10;
        $maximumscore += 40;
        $score = $score + $vraagscore;
        echo "<hr><p>Op de vraag <b>'" . $questions[$questionid]['text'] . "'</b> heeft u gekozen voor het antwoord <b>'" . $questions[$questionid]['antwoorden'][$answerid]['text'] . "'</b>.<br>";
        echo "U heeft nu in totaal " . $score . ' van de ' . $maximumscore . ' punten. Het minimum aantal punten wat U kunt hebben is ' . $minimumscore . '.</p><hr><br>';

        if ($vraagscore == 10) {
            $ten += 1;
        } elseif ($vraagscore == 20) {
            $twenty += 1;
        } elseif ($vraagscore == 30) {
            $thirty += 1;
        } else {
            $forty += 1;
        }
    }
}

$scoretimes = array ("horeca en toerisme" => $ten, "orde & veiligheid" => $twenty, "techniek" => $thirty, "zorg" => $forty);
$topscore = array_search(max($scoretimes),$scoretimes);
if($topscore == "horeca en toerisme")
{
    $link ="https://www.kw1c.nl/domein/6/horeca-toerisme";
    $picture = "horeca";
}
elseif($topscore == "orde & veiligheid")
{
    $link ="https://www.kw1c.nl/domein/7/orde-veiligheid";
    $picture = "o&v";
}
elseif($topscore == "techniek")
{
    $link ="https://www.kw1c.nl/domein/2/techniek";
    $picture = "techniek";
}
elseif($topscore == "zorg")
{
    $link ="https://www.kw1c.nl/domein/3/zorg-welzijn-en-sport";
    $picture = "zorg";
}

echo "<img src='../Images/" . $picture . ".jpg'><br>Je hebt in totaal " . $score . " punten behaald ons advies is dat je voor de afdeling " . $topscore . " gaat.<br> <a href='". $link ."' target='_blank'>Klik hier</a> voor meer informatie";

?>
    </main>

<?php
include "../includes/footer.php"
?>
