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
    $dati_patente = $_POST["dati_patente"];


    $sql = "INSERT INTO autista (nome, cognome, email, telefono,  dati_patente) 
            VALUES ('$nome', '$cognome', '$email', '$telefono' , '$dati_patente')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuovo austista aggiunto con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi Autista</title>
</head>
<body>
    <h2>Aggiungi un Autista</h2>
    <form method="post" action="">
        Nome: <input type="text" name="nome" required><br>
        Cognome: <input type="text" name="cognome" required><br>
        Email: <input type="email" name="email" required><br>
        dati patente: <input type="text" name="dati_patente" required><br>
        Telefono: <input type="text" name="telefono"><br>

        <input type="submit" value="Aggiungi Autista">
        
    </form>

 

    <button>Home Page</button>
</body>
</html>
