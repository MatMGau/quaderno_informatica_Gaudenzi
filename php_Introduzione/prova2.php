<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Verifica form 

        $n = $_POST['numero'];
    

//validità
if ($n>=1 && $n <= 10)
{
    echo "<table border='1'>"; 
 
    for($i=1; $i<=$n;$i++){

echo "<tr>";
echo"<td>$i</td>";
echo "<td>" . ($i ** 2) . "</td>";
echo "<td>" . ($i ** 3) . "</td>";
echo"</tr>";

    }
}

else{
?>
    <h1>"inserisci il numero"</h1> 
    <form method="post"action="">
    <label for="numero">sclegli un numero</label>

    <select name="numero">
        <?php

for ($i=1; $i<= 10; $i++){
    echo "<option value='$i'>$i</option>";

}
                ?>
</select>

<button type="invio"> crea la tabella </button>
</form>
    <?php
}
    ?>
</body>
</html>