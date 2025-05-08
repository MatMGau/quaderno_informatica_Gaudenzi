<?php
//variabili (COSTANTI, variabili)
define('DB_HOST', 'localhost'); //ind server
define('DB_USER_ROOT', 'root');
define('DB_PASS_ROOT', ''); //password
define('DB_NAME', 'DB_cotrollo');
define('INSTALL_FLAG_FILE', 'install_completed.flag');

echo "<h1>Installazione...</h1>";

$conn = mysqli_connect(DB_HOST, DB_USER_ROOT, DB_PASS_ROOT); //tenta conn

if (!$conn) {
    die("Errore Connessione MySQL: " . mysqli_connect_error());
}
echo "<p>Connesso a MySQL.</p>";

//crea DB_controllo se non presente (perche serve in locale)
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`";
if (!mysqli_query($conn, $sql_create_db)) {
    die("Errore Creazione DB: " . mysqli_error($conn));
}
echo "<p>Database verificato/creato.</p>";

mysqli_close($conn);
$conn = mysqli_connect(DB_HOST, DB_USER_ROOT, DB_PASS_ROOT, DB_NAME); //tenta con a nuovo DB

if (!$conn) {
    die("Errore Connessione al DB '" . DB_NAME . "': " . mysqli_connect_error());
}
echo "<p>Connesso al DB.</p>";

//Creazione Tab utenti (se non ce)

$sql_create_table_utenti = "
CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `data_registrazione` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

//check
if (mysqli_query($conn, $sql_create_table_utenti)) {
    echo "<p style='color:green;'>Tabella 'utenti' creata</p>";
} else {
    mysqli_close($conn); // errore
    die("Errore Creazione Tabella 'utenti': " . mysqli_error($conn));
}



mysqli_close($conn);

echo "<hr>";
//pag login
echo '<p><a href="login.php">Procedi al Login</a></p>';


?>