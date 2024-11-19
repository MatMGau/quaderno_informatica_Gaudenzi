<!DOCTYPE html>
<html lang="en">
<head>
    <cx meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>orario</title>
</head>
<body>
    <?php
    $nome = "matorx";

    $ora = date('H');

       //scelta del saluto
    if ($ora >= 8 && $ora < 12) {
        $saluto = "Buongiorno";
    } 
    elseif ($ora >= 12 && $ora < 20) {
        $saluto = "Buonasera";
    }
    else {
        $saluto = "Buonanotte";
    }

    //stampa 
    echo "<h1>$saluto $nome,</h1>";
    echo "<p>benvenuto nella mia prima pagina PHP, ora solo le ore $ora</p>";

    // info sul browser
    $browser = $_SERVER['HTTP_USER_AGENT'];

    echo "<p>stai usando il browser $browser</p>";
    ?>
</body>
<br>
<a href="php.html" class="button"> <--- go back</a>
</html>