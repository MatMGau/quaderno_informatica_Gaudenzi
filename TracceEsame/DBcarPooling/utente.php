<?php
$conn = new mysqli("localhost", "root", "", "carpooling");
if ($conn->connect_error) die("Connessione fallita: " . $conn->connect_error);

// Inserimento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ruolo = $_POST["ruolo"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    if ($ruolo == "autista") {
        $dati_patente = $_POST["dati_patente"];

        $stmt = $conn->prepare("INSERT INTO autista (nome, cognome, email, telefono, dati_patente) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $cognome, $email, $telefono, $dati_patente);

    } elseif ($ruolo == "viaggiatore") {
        $foto = $_POST["foto"];
        $dati_anagrafici = $_POST["dati_anagrafici"];
        $documento_identita = $_POST["documento_identita"];
        $dati_account = ""; 

        $stmt = $conn->prepare("INSERT INTO viaggiatori (nome, cognome, email, telefono, foto, dati_anagrafici, dati_account, documento_identita) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nome, $cognome, $email, $telefono, $foto, $dati_anagrafici, $dati_account, $documento_identita);
    }

    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi Utente</title>
    <script>
        function toggleCampi() {
            var ruolo = document.getElementById("ruolo").value;
            document.getElementById("campi_autista").style.display = (ruolo === "autista") ? "block" : "none";
            document.getElementById("campi_viaggiatore").style.display = (ruolo === "viaggiatore") ? "block" : "none";
        }
    </script>
</head>
<body>
    <h2>Inserisci Utente</h2>
    <form method="post">
        <label>Ruolo:</label>
        <select name="ruolo" id="ruolo" onchange="toggleCampi()" required>
            <option value="">-- Seleziona ruolo --</option>
            <option value="autista">Autista</option>
            <option value="viaggiatore">Viaggiatore</option>
        </select><br><br>

        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cognome" placeholder="Cognome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telefono" placeholder="Telefono" required><br><br>

        <div id="campi_autista" style="display:none;">
        <input type="text" name="foto" placeholder="Foto (URL)" required>
            <input type="text" name="dati_anagrafici" placeholder="Dati anagrafici" required>
            <input type="text" name="documento_identita" placeholder="Documento identità" required>
            <input type="text" name="dati_patente" placeholder="Dati patente" required>
        </div>

        <div id="campi_viaggiatore" style="display:none;">
            <input type="text" name="foto" placeholder="Foto (URL)" required>
            <input type="text" name="dati_anagrafici" placeholder="Dati anagrafici" required>
            <input type="text" name="documento_identita" placeholder="Documento identità" required>
        </div>

        <br>
        <button type="submit">Aggiungi</button>
        <h2>Utenti Registrati</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Ruolo</th>
    </tr>

    <?php
    // tab autisti
    $res_autisti = $conn->query("SELECT ID_autista AS ID, nome, cognome, email, telefono FROM autista");
    while($row = $res_autisti->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row["ID"] ?></td>
        <td><?= $row["nome"] ?></td>
        <td><?= $row["cognome"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["telefono"] ?></td>
        <td>Autista</td>
    </tr>
    <?php endwhile; ?>

    <?php
    // tab viaggiatori
    $res_viaggiatori = $conn->query("SELECT ID_viaggiatore AS ID, nome, cognome, email, telefono FROM viaggiatori");
    while($row = $res_viaggiatori->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row["ID"] ?></td>
        <td><?= $row["nome"] ?></td>
        <td><?= $row["cognome"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["telefono"] ?></td>
        <td>Viaggiatore</td>
    </tr>
    <?php endwhile; ?>
</table>
    </form>
</body>
</html>
