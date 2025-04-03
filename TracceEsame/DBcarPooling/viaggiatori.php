<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "carpooling";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $foto = $_POST["foto"];
    $documento_identita = $_POST["documento_identita"];

    $sql = "INSERT INTO viaggiatori (nome, cognome, email, telefono, foto, documento_identita) 
            VALUES ('$nome', '$cognome', '$email', '$telefono', '$foto' , '$documento_identita')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuovo viaggiatore aggiunto con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi Viaggiatore</title>
</head>
<body>
    <h2>Aggiungi un Viaggiatore</h2>
    <form method="post" action="">
        Nome: <input type="text" name="nome" required><br>
        Cognome: <input type="text" name="cognome" required><br>
        Email: <input type="email" name="email" required><br>
        Telefono: <input type="text" name="telefono"><br>
        Foto (URL): <input type="text" name="foto"><br>
        Documento Identità: <input type="text" name="documento_identita"><br>
        <input type="submit" value="Aggiungi Viaggiatore">
    </form>

 

    <button>Home Page</button>
</body>
</html>
