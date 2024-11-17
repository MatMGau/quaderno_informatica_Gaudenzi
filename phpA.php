<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tabella Pitagorica</h2>
    
    <table>
        <?php
        echo "<table border='1'>";
        for($i = 0; $i <= 10; $i++) {
            echo "<tr>";
            for($j = 0; $j <= 10; $j++) {
                if($i == 0 && $j == 0) {
                    echo "<td>×</td>";
                } elseif($i == 0) {
                    echo "<td><b>$j</b></td>";
                } elseif($j == 0) {
                    echo "<td><b>$i</b></td>";
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