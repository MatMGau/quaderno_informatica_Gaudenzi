<?php
$conn = new mysqli("localhost", "root", "", "carpooling");
if ($conn->connect_error) die("Connessione fallita: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partenza = $_POST["citta_partenza"];
    $destinazione = $_POST["citta_destinazione"];
    $data_ora = $_POST["data_ora_partenza"];
    $durata = $_POST["durata_approssimativa"];
    $posti = $_POST["posti_disponibili"];
    $contributo = $_POST["contributo_richiesto"];
    $id_autista = $_POST["ID_autista"];

    $stmt = $conn->prepare("INSERT INTO viaggio (citta_partenza, citta_destinazione, data_ora_partenza, durata_approssimativa, posti_disponibili, contributo_richiesto, ID_autista) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiid", $partenza, $destinazione, $data_ora, $durata, $posti, $contributo, $id_autista);
    $stmt->execute();
    $stmt->close();
}


$result = $conn->query("SELECT * FROM viaggio");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Viaggi</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
    </style>
</head>
<body>
    <h2>Lista Viaggi</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Pn</th>
            <th>Dst</th>
            <th>Data</th>
            <th>Durata</th>
            <th>Posti</th>
            <th>€</th>
            <th>Autista</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["ID_viaggio"] ?></td>
            <td><?= $row["citta_partenza"] ?></td>
            <td><?= $row["citta_destinazione"] ?></td>
            <td><?= $row["data_ora_partenza"] ?></td>
            <td><?= $row["durata_approssimativa"] ?> min</td>
            <td><?= $row["posti_disponibili"] ?></td>
            <td><?= $row["contributo_richiesto"] ?> €</td>
            <td><?= $row["ID_autista"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Aggiungi Viaggio</h2>
    <form method="post">
        <input type="text" name="citta_partenza" placeholder="Partenza" required>
        <input type="text" name="citta_destinazione" placeholder="Destinazione" required>
        <input type="datetime-local" name="data_ora_partenza" required>
        <input type="number" name="durata_approssimativa" placeholder="Durata (min)" required>
        <input type="number" name="posti_disponibili" placeholder="Posti" required>
        <input type="number" step="0.01" name="contributo_richiesto" placeholder="€" required>
        <input type="number" name="ID_autista" placeholder="ID Autista" required>
        <button type="submit">Aggiungi</button>
    </form>
</body>
</html>