<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER_ROOT', 'root');
define('DB_PASS_ROOT', '');
define('DB_NAME', 'DB_cotrollo'); 

$messaggio = '';

//
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //superglobale, "pagina richiesta con get" verifica HTTP
    if (!empty($_POST['username']) && !empty($_POST['password'])) { //controllo se dati NULL
      
        $username_inviato = $_POST['username'];//assegna variabili
        $password_inviata = $_POST['password'];

        $conn = mysqli_connect(DB_HOST, DB_USER_ROOT, DB_PASS_ROOT, DB_NAME); //connessione

        if (!$conn) { //gest errore
            $messaggio = "Errore connessione DB.";
        }
        else{
        $username_sql = mysqli_real_escape_string($conn, $username_inviato);}
  
            //dati dove username corrispende
            $sql = "SELECT id_utente, username, password_hash FROM utenti WHERE username = '$username_sql'";
            $result = mysqli_query($conn, $sql); //esegue query

            if ($result && mysqli_num_rows($result) == 1) { //username UNIQUE = solo 1 riga query
                $utente = mysqli_fetch_assoc($result); //prende dati riga

                // Verifica password
                if (password_verify($password_inviata, $utente['password_hash']))//confronto hash di pass, sicuro di PHP
                   {
                    // Login OK
                    $_SESSION['id_utente_loggato'] = $utente['id_utente']; // assega log in alla sessione
                    $_SESSION['username_loggato'] = $utente['username'];
                    header('Location: index.php'); // tutto giusto, treindirizza
                    exit;



                } else {
                    $messaggio = "Credenziali errate.";
                }
            } else {
                $messaggio = "Credenziali errate.";
            }
            mysqli_close($conn);
        }
    } else {
        $messaggio = "Inserisci username e password.";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login Utente</h1>

    <?php if (!empty($messaggio)): ?>
        <p style="color:red;"><?php echo $messaggio; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="
            <?php echo isset($_POST['username']); ?>
            "> <!-- isset contorllo non NULL -->
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </div>
        <br>
        <div>
            <input type="submit" value="Accedi">
        </div>
    </form>
    <br>
    <p>Non hai un account? <a href="registrazione.php">Registrati qui</a></p>

</body>
</html>