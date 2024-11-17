<!DOCTYPE html>
<html lang="en">
<head>
    <cx meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esA</title>
</head>
<body>
    <h2>Tabella Pitagorica</h2>

   
    <table>
        <?php

         //td = cella e tr = riga
        echo "<table border='1'>";

        //genera righe, i = righe j = colonne
        for($i = 0; $i <= 10; $i++) {
            echo "<tr>";

                //genera celle
            for($j = 0; $j <= 10; $j++) {
               
                //cella 0 0 = x
                if($i == 0 && $j == 0) {
                    echo "<td>×</td>";

                    //stampa della prima righa e prima colonna
                } elseif($i == 0) {
                    echo "<td><b>$j</b></td>";

                } elseif($j == 0) {
                    echo "<td><b>$i</b></td>";

                    //stampa della cella
                } else {
                    echo "<td>" . ($i * $j) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </table>
</body>
</html>