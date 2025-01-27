<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">

    <title>Postback in PHP</title>
</head>
<body>
    <?php
    // Verifica form 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuper0 il numero
        $n = intval($_POST['numero']);

        // validita 
        if ($n >= 1 && $n <= 10) {
            echo "<h2>Tabella di quadrati e cubi fino a $n</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>";

            //  tabella e calcoli per ogni numero da 1 a n
            for ($i = 1; $i <= $n; $i++) {
                echo "<tr>";

                //scrivo numero base
                echo "<td>$i</td>";

                //calcolo quadrati e cubo
                echo "<td>" . ($i ** 2) . "</td>";
                echo "<td>" . ($i ** 3) . "</td>";
                echo "</tr>";
            }

        } 

    } else {
        //la prima volta non ci sara un valore quindi mostreara questo form 
        ?>
        <h1>Inserisci un numero</h1>
        <form method="post" action="">
            <label for="numero">Scegli un numero (1-10):</label>

            <select name="numero">
                <?php
                // Crea il menu a tendina
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>


            <br>
            
            <button type="submit">Crea tabella</button>
            <br>
            <br>
            <br>
            <br>
            <a href="php.html" class="button"> <--- go back</a>
        </form>
        <?php
    }
    ?>
</body>
</html>