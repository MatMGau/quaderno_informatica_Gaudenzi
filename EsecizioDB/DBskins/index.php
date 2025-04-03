<?php
// Connessione al database
$conn = new mysqli("localhost", "root", "", "skins");

// Inserimento skin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $prezzo = $_POST["prezzo"];
    $arma = $_POST["arma"];
    $rarita = $_POST["rarita"];

    $conn->query("INSERT INTO skins ( nome, arma, prezzo, rarita) VALUES ('$titnomeolo', '$arma', '$prezzo', '$rarita')");
}

// Recupero dei skin da DB
$result = $conn->query("SELECT * FROM skins");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Catalogo skin</title>
    <style>

        .container {
            max-width: 800px;
            padding: 20px;
            background: #fff;

        }
        h1 {
            text-align: center;
            color:rgb(0, 0, 0);
        }
        form {
            margin-bottom: 20px;
            
        }
        form input {
            margin: 5px;
            padding: 8px;
            width: 100px;
        }
        form button {
            padding: 8px 16px;
            background-color:rgb(82, 85, 88);
            color: black;
            border: none;
  
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
  
    </style>
</head>
<body>
<div class="container">
        <h1>Catalogo skin</h1>

        <!-- Form per aggiungere una nuova skin -->
        <form method="POST">
            <input type="text" name="nome" placeholder="nome" required>
            <input type="text" name="arma" placeholder="Arma" required>
            <input type="number" name="prezzo" placeholder="Prezzo" required>
            <input type="text" name="rarita" placeholder="Rarità" required>
            <button type="submit">Aggiungi skin</button>
        </form>

        <!-- Tabella con l'elenco delle skin -->
        <table>
            <thead>
                <tr>
                    <th>nome</th>
                    <th>Arma</th>
                    <th>Prezzo</th>
                    <th>Rarità</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>         
                <tr>
                    <td><?= $row["nome"] ?></td> 
                    <td><?= $row["arma"] ?></td>
                    <td><?= $row["prezzo"] ?></td>
                    <td><?= $row["rarita"] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <button>Home Page</button>
</body>
</html>